<?php

namespace App\Http\Controllers\Api\interest;

use App\Http\Controllers\Controller;
use App\Models\Gl_acc_code;
use App\Models\Int_rate_setup;
use App\Models\Office_info;
use App\Models\Prod_service_setup;
use App\Models\Sl_int_apply_period;
use App\Models\sl_int_cal_method;
use App\Models\Sl_int_type;
use App\Models\Sl_prod_cal_method;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InterestController extends Controller
{
    public function index()
    {

      
       try {
          $charge = DB::table('int_rate_setups')
     ->join('sl_int_types', 'int_rate_setups.sl_int_type_id', '=', 'sl_int_types.id')
     ->join('sl_int_cal_methods', 'int_rate_setups.sl_int_cal_method_id', '=', 'sl_int_cal_methods.id')
     ->join('sl_prod_cal_methods', 'int_rate_setups.sl_prod_cal_method_id', '=', 'sl_prod_cal_methods.id')
     ->join('sl_int_apply_periods', 'int_rate_setups.sl_int_apply_period_id', '=', 'sl_int_apply_periods.id')
     ->join('gl_acc_codes', 'int_rate_setups.gl_acc_code_id', '=', 'gl_acc_codes.id')
     ->join('prod_service_setups', 'int_rate_setups.product_id', '=', 'prod_service_setups.id')
     ->select('int_rate_setups.effect_date','int_rate_setups.id','int_rate_setups.int_rate',
     'sl_int_types.titles as sl_int_types_title',
     'sl_int_cal_methods.title as sl_int_cal_methods_title',
     'sl_prod_cal_methods.title as sl_prod_cal_methods_title',
     'sl_int_apply_periods.title as sl_int_apply_periods_title',
     'gl_acc_codes.acc_head as gl_account','prod_service_setups.product_name')
     ->get();

     $sl_int_type = Sl_int_type::get();
     $sl_int_cal_method = sl_int_cal_method::get();
     $sl_prod_cal_method = Sl_prod_cal_method::get();
     $sl_int_apply_period = Sl_int_apply_period::get();
     $gl_acc_code = Gl_acc_code::get();
     $prod_service_setup = Prod_service_setup::get();
 
          return response()->json([
             'success' => true,
             'charge' => $charge,
             'sl_int_type' => $sl_int_type,
             'sl_int_cal_method' => $sl_int_cal_method,
             'sl_prod_cal_method' => $sl_prod_cal_method,
             'sl_int_apply_period' => $sl_int_apply_period,
             'gl_acc_code' => $gl_acc_code,
             'prod_service_setup' => $prod_service_setup
          ]);
       } catch (\Throwable $th) {
          return response()->json([
             'success' => false,
             'message' => 'Somthing went to wrong'
          ]);
       }
    }

    public function interest_create(Request $request)
   {
  

      $input = $request->all();

      $office_id = Office_info::where('office_number',Auth::user()->office_number)->first();

      $input['office_id'] = $office_id->id;

    //   return $input;
      try {
         Int_rate_setup::create($input);

         return response()->json([
            // childs
            'success' => true,
            'message' => 'Interest Rate Create Successfully'
         ]);
      } catch (\Throwable $th) {
         return response()->json([

            'success' => false,
            'message' => 'Somthing Wrong'
         ]);
      }
   }

   public function interest_edit($id){
      
    $interest= Int_rate_setup::whereId($id)->first();

     return response()->json([
        'success' => true,
        'interest' => $interest
     ]);
  }

  public function interest_update(Request $request)
  {
     $this->validate($request, [
        'id' => 'required',
        'sl_charge_type_id' => 'required',
        'sl_charge_pay_method_id' => 'required',
        'sl_charge_pay_period_id' => 'required',
        'gl_acc_code_id' => 'required',
        'charge_amt' => 'required',
        'updated_by' => 'required'
     ]);
  

   
     try {

        Int_rate_setup::whereId($request->id)->update([
          'product_id' => $request->product_id,
          'sl_charge_type_id' => $request->sl_charge_type_id,
          'sl_charge_pay_method_id' => $request->sl_charge_pay_method_id,
          'sl_charge_pay_period_id' => $request->sl_charge_pay_period_id,
          'charge_amt' => $request->charge_amt,
          'gl_acc_code_id' => $request->gl_acc_code_id,
          'effect_date' => $request->effect_date,
          'active_flag' => $request->active_flag,
          'updated_by' => $request->updated_by
      ]);

        return response()->json([
           // childs
           'success' => true,
           'message' => 'Charge Setup Update Successfully'
        ]);

     } catch (\Throwable $th) {
        return response()->json([

           'success' => false,
           'message' => 'Somthing Wrong'
        ]);
     }
  }

}
