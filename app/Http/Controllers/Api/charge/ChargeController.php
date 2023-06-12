<?php

namespace App\Http\Controllers\Api\charge;

use App\Http\Controllers\Controller;
use App\Models\charge_setup;
use App\Models\Gl_acc_code;
use App\Models\Office_info;
use App\Models\Prod_service_setup;
use App\Models\Sl_charge_pay_method;
use App\Models\Sl_charge_pay_period;
use App\Models\sl_charge_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChargeController extends Controller
{
    public function index()
    {

      
       try {
 
          $charge = DB::table('charge_setups')
     ->join('sl_charge_types', 'charge_setups.sl_charge_type_id', '=', 'sl_charge_types.id')
     ->join('sl_charge_pay_methods', 'charge_setups.sl_charge_pay_method_id', '=', 'sl_charge_pay_methods.id')
     ->join('sl_charge_pay_periods', 'charge_setups.sl_charge_pay_period_id', '=', 'sl_charge_pay_periods.id')
     ->join('gl_acc_codes', 'charge_setups.gl_acc_code_id', '=', 'gl_acc_codes.id')
     ->join('prod_service_setups', 'charge_setups.product_id', '=', 'prod_service_setups.id')
     ->select('charge_setups.effect_date','charge_setups.id','charge_setups.charge_amt',
     'sl_charge_types.titles as sl_charge_types_title',
     'sl_charge_pay_methods.title as sl_charge_pay_methods_title',
     'sl_charge_pay_periods.title as sl_charge_pay_periods_title',
     'gl_acc_codes.acc_head as gl_account','prod_service_setups.product_name')
     ->get();

     $sl_charge_type = sl_charge_type::get();
     $sl_charge_pay_method = Sl_charge_pay_method::get();
     $sl_charge_pay_period = Sl_charge_pay_period::get();
     $gl_acc_code = Gl_acc_code::get();
     $product = Prod_service_setup::get();
 
          return response()->json([
             'success' => true,
             'charges' => $charge,
             'sl_charge_type' => $sl_charge_type,
             'sl_charge_pay_method' => $sl_charge_pay_method,
             'sl_charge_pay_period' => $sl_charge_pay_period,
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


    public function charge_create(Request $request)
   {
    // return 'ok';
    //   $this->validate($request, [
    //      'sl_charge_type_id' => 'required',
    //      'sl_charge_pay_method_id' => 'required',
    //      'sl_charge_pay_period_id' => 'required',
    //      'created_by' => 'required'
    //   ]);
      $input = $request->all();

      $office_id = Office_info::where('office_number',Auth::user()->office_number)->first();

      $input['office_id'] = $office_id->id;

    //   return $input;
      try {
         charge_setup::create($input);

         return response()->json([
            // childs
            'success' => true,
            'message' => 'Charge Create Successfully'
         ]);
      } catch (\Throwable $th) {
         return response()->json([

            'success' => false,
            'message' => 'Somthing Wrong'
         ]);
      }
   }


   public function charge_edit($id){
      
    $charge= charge_setup::whereId($id)->first();

     return response()->json([
        'success' => true,
        'charge' => $charge
     ]);
  }


  
  public function charge_update(Request $request)
  {
     $this->validate($request, [
        'id' => 'required',
        'sl_charge_type_id' => 'required',
        'sl_charge_pay_method_id' => 'required',
        'sl_charge_pay_period_id' => 'required',
        'updated_by' => 'required'
     ]);
  

   
     try {

       charge_setup::whereId($request->id)->update([
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
