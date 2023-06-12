<?php

namespace App\Http\Controllers\Api\cheque_leaf;

use App\Http\Controllers\Controller;
use App\Models\chq_leaf_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Cheque_leafController extends Controller
{
   public function chq_leaf($id)
   {
    $chq_leaf= chq_leaf_info::where('bank_acc_no','=',$id)->get();
    
    return response()->json($chq_leaf);

   }

   public function chq_leaf_status($acc_code)
   {
      $chq_leaf = DB::table('bank_acc_infos')
      ->join('chq_leaf_infos', 'bank_acc_infos.bank_acc_no', '=', 'chq_leaf_infos.bank_acc_no')
      ->select('chq_leaf_infos.*')
      ->where('chq_leaf_infos.leaf_status','=','0')
      ->where('bank_acc_infos.acc_code','=',$acc_code)
      ->get();
   //  $chq_leaf= chq_leaf_info::where('leaf_status','=','0')->where('acc_code','=',$acc_code)->get();

    return response()->json($chq_leaf);
    
    //return response()->json($chq_leaf);

   }
}
