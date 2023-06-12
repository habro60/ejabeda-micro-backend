<?php

namespace App\Http\Controllers\Api\penalty;

use App\Http\Controllers\Controller;
use App\Models\Gl_acc_code;
use App\Models\Office_info;
use App\Models\Penalty_rate_setup;
use App\Models\Prod_service_setup;
use App\Models\Sl_penalty_cal_method;
use App\Models\Sl_penalty_pay_method;
use App\Models\Sl_penalty_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PenaltyController extends Controller
{
    public function index()
    {
        try {
 
            $penalty = DB::table('penalty_rate_setups')
       ->join('sl_penalty_types', 'penalty_rate_setups.sl_penalty_type_id', '=', 'sl_penalty_types.id')
       ->join('sl_penalty_pay_methods', 'penalty_rate_setups.sl_penalty_pay_method_id', '=', 'sl_penalty_pay_methods.id')
       ->join('sl_penalty_cal_methods', 'penalty_rate_setups.sl_penalty_cal_method_id', '=', 'sl_penalty_cal_methods.id')
       ->join('gl_acc_codes', 'penalty_rate_setups.gl_acc_code_id', '=', 'gl_acc_codes.id')
       ->join('prod_service_setups', 'penalty_rate_setups.product_id', '=', 'prod_service_setups.id')
       ->select('penalty_rate_setups.effect_date','penalty_rate_setups.id','penalty_rate_setups.penalty_rate','penalty_rate_setups.maxi_penalty_amt',
       'sl_penalty_types.title as sl_penalty_types_title',
       'sl_penalty_pay_methods.title as sl_penalty_pay_methods_title',
       'sl_penalty_cal_methods.title as sl_penalty_cal_methods_title',
       'gl_acc_codes.acc_head as gl_account','prod_service_setups.product_name')
       ->get();
  
       $Sl_penalty_type = Sl_penalty_type::get();
       $Sl_penalty_pay_method = Sl_penalty_pay_method::get();
       $Sl_penalty_cal_method = Sl_penalty_cal_method::get();
       $gl_acc_code = Gl_acc_code::get();
       $product = Prod_service_setup::get();
   
            return response()->json([
               'success' => true,
               'penalty' => $penalty,
               'Sl_penalty_type' => $Sl_penalty_type,
               'Sl_penalty_pay_method' => $Sl_penalty_pay_method,
               'Sl_penalty_cal_method' => $Sl_penalty_cal_method,
               'gl_acc_codes' => $gl_acc_code,
               'products' => $product
            ]);
         } catch (\Throwable $th) {
            return response()->json([
               'success' => false,
               'message' => 'Somthing went to wrong'
            ]);
         }
    }

    public function penalty_create(Request $request)
    {
         $input = $request->all();

      $office_id = Office_info::where('office_number',Auth::user()->office_number)->first();

      $input['office_id'] = $office_id->id;

    //   return $input;
      // try {
         Penalty_rate_setup::create($input);

         return response()->json([
            // childs
            'success' => true,
            'message' => 'Penalty Create Successfully'
         ]);
      // } catch (\Throwable $th) {
      //    return response()->json([

      //       'success' => false,
      //       'message' => 'Somthing Wrong'
      //    ]);
      // }
    }

    public function penalty_edit($id){
      
        $penalty= Penalty_rate_setup::whereId($id)->first();
    
         return response()->json([
            'success' => true,
            'penalty' => $penalty
         ]);
      }

      public function penalty_update(Request $request)
      {
        $this->validate($request, [
            'id' => 'required',
            'sl_penalty_type_id' => 'required',
            'sl_penalty_pay_method_id' => 'required',
            'sl_penalty_cal_method_id' => 'required',
            'updated_by' => 'required'
         ]);
      
    
       
         try {
    
           Penalty_rate_setup::whereId($request->id)->update([
              'product_id' => $request->product_id,
              'sl_penalty_type_id' => $request->sl_penalty_type_id,
              'sl_penalty_pay_method_id' => $request->sl_penalty_pay_method_id,
              'sl_penalty_cal_method_id' => $request->sl_penalty_cal_method_id,
              'penalty_rate' => $request->penalty_rate,
              'maxi_penalty_amt' => $request->maxi_penalty_amt,
              'gl_acc_code_id' => $request->gl_acc_code_id,
              'effect_date' => $request->effect_date,
              'updated_by' => $request->created_by
          ]);
    
            return response()->json([
               // childs
               'success' => true,
               'message' => 'Penalty Setup Update Successfully'
            ]);
    
         } catch (\Throwable $th) {
            return response()->json([
    
               'success' => false,
               'message' => 'Somthing Wrong'
            ]);
         }
      }
}
