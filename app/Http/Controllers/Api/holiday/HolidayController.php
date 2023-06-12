<?php

namespace App\Http\Controllers\Api\holiday;

use App\Http\Controllers\Controller;
use App\Models\Holiday;
use App\Models\Office_info;
use App\Models\Sl_holiday_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Str;


class HolidayController extends Controller
{
   public function index()
   {
      try {

         $holiday = DB::table('holidays')
            ->join('sl_holiday_types', 'holidays.holiday_type', '=', 'sl_holiday_types.id')
            ->select('holidays.*',  'sl_holiday_types.title as sl_holiday_type_title')
            ->orderBy('holidays.holiday_date')
            ->get();

         return response()->json([
            'success' => true,
            'holiday' => $holiday
         ]);
      } catch (\Throwable $th) {
         return response()->json([
            'success' => false,
            'message' => 'Somthinf went to wrong'
         ]);
      }
   }

   public function sl_holiday_type()
   {
      try {
         $holiday_type = Sl_holiday_type::get();
         return response()->json([
            'success' => true,
            'holiday_type' => $holiday_type
         ]);
      } catch (\Throwable $th) {
         return response()->json([
            'success' => false,
            'message' => 'Something went to wrong'
         ]);
      }
   }


   public function holiday_create(Request $request)
   {
      $this->validate($request, [
         'holiday_type' => 'required',
         'holiday_name' => 'required',
         'created_by' => 'required'
      ]);
      $holiday_type = Sl_holiday_type::find($request->holiday_type);
      $input = $request->all();

      $office_id = Office_info::where('office_number', Auth::user()->office_number)->first();

      $input['office_id'] = $office_id->id;

      $office_id = $input['office_id'];

      //  return $holiday_type->holiday_type_code;
      if ($holiday_type->holiday_type_code == 1) {
         // return $request->holday_day;
         $holidayDayOfWeek = $request->holday_day; // Replace with the day of the week you want to find the holiday for (1 for Monday, 2 for Tuesday, etc.)
         $startDate = new DateTime('first day of January this year');
         $endDate = new DateTime('last day of December this year');

         $holidayDates = [];

         // Loop through each week of the year
         for ($date = clone $startDate; $date <= $endDate; $date->modify('+1 day')) {

            // Check if the current day is the specified day of the week (i.e. weekly holiday)
            if ($date->format('N') == $holidayDayOfWeek) {

               $newdate = $date->format('Y-m-d');

               // Add the holiday date to the array
               $holidayDates[] = [
                  'id' =>  Str::uuid()->toString(),
                  'office_id' => $office_id,
                  'holiday_type' => $request->holiday_type,
                  'holiday_name' => $request->holiday_name,
                  'holiday_date' =>  $newdate,
                  'created_by' => $request->created_by,

               ];
            }

            // If the current day is Sunday, advance to the next week
            if ($date->format('N') == 7) {
               $date->modify('+1 day');
            }
         }

         // Return the array of holiday dates as a JSON response
         //   return response()->json($holidayDates);

         // return $holidayDates;
         Holiday::insert($holidayDates);
         // DB::table('holidays')->insert($holidayDates);


         return response()->json([
            // childs
            'success' => true,
            'message' => 'Holiday Create Successfully'
         ]);
      } else {
         try {
            Holiday::create($input);

            return response()->json([
            
               'success' => true,
               'message' => 'Holiday Create Successfully'
            ]);
         } catch (\Throwable $th) {
            return response()->json([

               'success' => false,
               'message' => 'Somthing Went To Wrong'
            ]);
         }
      }
   }



   public function holiday_edit($id)
   {

      $holiday = Holiday::whereId($id)->first();

      return response()->json([
         'success' => true,
         'holiday' => $holiday
      ]);
   }


   public function holiday_update(Request $request)
   {
      $this->validate($request, [
         'id' => 'required',
         'holiday_type' => 'required',
         'holiday_name' => 'required',
         'holiday_date' => 'required',
         'updated_by' => 'required'
      ]);
      $office = Office_info::where('office_number', Auth::user()->office_number)->first();

      $office_id = $office->id;




      try {

         Holiday::whereId($request->id)->update([
            'holiday_type' => $request->holiday_type,
            'holiday_name' => $request->holiday_name,
            'holiday_date' => $request->holiday_date,
            'updated_by' => $request->updated_by,
            'office_id' => $office_id
         ]);

         return response()->json([
            // childs
            'success' => true,
            'message' => 'Holiday Update Successfully'
         ]);
      } catch (\Throwable $th) {
         return response()->json([

            'success' => false,
            'message' => 'Somthing Went To Wrong'
         ]);
      }
   }



   // public function holiday_edit($id)
   // {

   //    $holiday = Holiday::whereId($id)->first();

   //    return response()->json([
   //       'success' => true,
   //       'holiday' => $holiday
   //    ]);
   // }


   // public function holiday_update(Request $request)
   // {
   //    $this->validate($request, [
   //       'id' => 'required',
   //       'holiday_type' => 'required',
   //       'holiday_name' => 'required',
   //       'holiday_date' => 'required',
   //       'updated_by' => 'required'
   //    ]);
   //    $office = Office_info::where('office_number', Auth::user()->office_number)->first();

   //    $office_id = $office->id;




   //    try {

   //       Holiday::whereId($request->id)->update([
   //          'holiday_type' => $request->holiday_type,
   //          'holiday_name' => $request->holiday_name,
   //          'holiday_date' => $request->holiday_date,
   //          'updated_by' => $request->updated_by,
   //          'office_id' => $office_id
   //       ]);

   //       return response()->json([
   //          // childs
   //          'success' => true,
   //          'message' => 'Holiday Update Successfully'
   //       ]);
   //    } catch (\Throwable $th) {
   //       return response()->json([

   //          'success' => false,
   //          'message' => 'Somthing Went To Wrong'
   //       ]);
   //    }
   // }
}
