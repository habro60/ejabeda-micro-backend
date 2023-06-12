<?php

namespace App\Http\Controllers\Api\cheque_book;

use App\Http\Controllers\Controller;
use App\Models\Bank_acc_info;
use App\Models\Bank_acc_infos;
use App\Models\Chq_book_info;
use App\Models\chq_leaf_info;
use App\Models\Office_info;
use App\Models\Sl_leaf_quantity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChequeBookController extends Controller
{
    public function index()
    {
        $chq_book_infos = DB::table('chq_book_infos')
        ->join('bank_acc_infos', 'chq_book_infos.bank_acc_no', '=', 'bank_acc_infos.bank_acc_no')
        ->join('sl_leaf_quantities', 'chq_book_infos.leaf_type_code', '=', 'sl_leaf_quantities.leaf_type_code')
        ->select('chq_book_infos.*', 'bank_acc_infos.acc_title as acc_title', 'sl_leaf_quantities.title as leaf_title')
        ->get();

    
        $sl_leaf_quantity = Sl_leaf_quantity::get();
        $bank_acc_info = Bank_acc_info::get();

    return response()->json([
        'success' => true,
        'chq_book_infos' => $chq_book_infos,
        'sl_leaf_quantity' => $sl_leaf_quantity,
        'bank_acc_info' => $bank_acc_info,
    ])->setStatusCode(200);
    }

    public function cheque_book_create(Request $request)
{
   $input = $request->all();

   $office_id = Office_info::where('office_number',Auth::user()->office_number)->first();

   $input['office_id'] = $office_id->id;

   $cheack_book = Chq_book_info::create($input);
   $leaf_type_code = $cheack_book->leaf_type_code;
   $chq_prefix = $cheack_book->chq_prefix; // get chq_prefix value from Chq_book_info

   // insert multiple chq_leaf_info records based on the leaf range
   if ($leaf_type_code) {
       for ($leaf_sl_no = $cheack_book->begining_sl_no; $leaf_sl_no < $cheack_book->ending_sl_no; $leaf_sl_no++) {
           $chq_leaf_info = new chq_leaf_info();
           $chq_leaf_info->office_id = $office_id->id;
           $chq_leaf_info->bank_acc_no = $cheack_book->bank_acc_no;
           $chq_leaf_info->chq_book_no = $cheack_book->chq_book_no;
           $chq_leaf_info->chq_prefix = $chq_prefix; // set chq_prefix value
           $chq_leaf_info->leaf_sl_no = $leaf_sl_no;
           $chq_leaf_info->leaf_status = 0; // assuming 1 means active
           $chq_leaf_info->status_date = date('Y-m-d');
           $chq_leaf_info->application_type = 1; // assuming 1 means manual application
           $chq_leaf_info->created_by = Auth::user()->id;
           $chq_leaf_info->save();
       }
   }

   return response()->json([
       'success' => true,
       'message' => 'Cheque Book and Leaf Info Create Successfully'
   ]);
}


    public function cheque_book_edit($id){
      
        $cheque_book_edit= Chq_book_info::whereId($id)->first();
    
         return response()->json([
            'success' => true,
            'cheque_book_edit' => $cheque_book_edit
         ]);
      }

      public function cheque_book_update(Request $request)
      {
          $office_id = Office_info::where('office_number', Auth::user()->office_number)->firstOrFail();
      
          $leaf_type = Chq_book_info::whereId($request->id)->firstOrFail();
      
          $leaf_type->update([
              'bank_acc_no' => $request->bank_acc_no,
              'chq_prefix' => $request->chq_prefix,
              'begining_sl_no' => $request->begining_sl_no,
              'ending_sl_no' => $request->ending_sl_no,
              'leaf_type_code' => $request->leaf_type_code,
              'updated_by' => $request->updated_by,
          ]);

          $bank_acc_no = $leaf_type->bank_acc_no;
          $chq_prefix = $leaf_type->chq_prefix;

          $chq_leaf_info_all_get = chq_leaf_info::where('bank_acc_no', $bank_acc_no)->where('chq_prefix', $chq_prefix)->get();
          $chq_leaf_info_all_get->each->delete();

      
         //  $chq_leaf_info_all_get = chq_leaf_info::where('bank_acc_no', $leaf_type->bank_acc_no)->get();
         //  $chq_leaf_info_all_get->each->delete();
      
          // retrieve the updated chq_prefix value
         
          //$chq_prefix = $leaf_type->chq_prefix;

      
          // insert multiple chq_leaf_info records based on the leaf range
          if ($leaf_type->leaf_type_code) {
              for ($i = $leaf_type->begining_sl_no; $i < $leaf_type->ending_sl_no; $i++) {
                  $chq_leaf_info = new chq_leaf_info();
                  $chq_leaf_info->office_id = $office_id->id;
                  $chq_leaf_info->bank_acc_no = $leaf_type->bank_acc_no;
                  $chq_leaf_info->chq_book_no = $leaf_type->chq_book_no;
                  $chq_leaf_info->chq_prefix = $chq_prefix; // use the updated chq_prefix value
                  $chq_leaf_info->leaf_sl_no = $i;
                  $chq_leaf_info->leaf_status = 0; // assuming 1 means active
                  $chq_leaf_info->status_date = date('Y-m-d');
                  $chq_leaf_info->application_type = 1; // assuming 1 means manual application
                  $chq_leaf_info->created_by = Auth::user()->id;
                  $chq_leaf_info->save();
              }
          }
      
          return response()->json([
              'success' => true,
              'message' => 'Cheque Book updated successfully'
          ]);
      }




public function chq_sl_unique($chq_prefix,$begining_sl_no,$ending_sl_no)
{
   $chq_leaf_infos = DB::table('chq_leaf_infos')
    ->whereBetween('leaf_sl_no', [$begining_sl_no, $ending_sl_no])
    ->where('chq_prefix', $chq_prefix)
    ->get();

    if (count($chq_leaf_infos) > 0) {
      return response()->json(true);
    }else{
      return response()->json(false);
    }

}


}
