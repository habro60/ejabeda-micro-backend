<?php

namespace App\Http\Controllers\bankAccount;

use App\Http\Controllers\Controller;
use App\Models\Bank_acc_info;
use App\Models\Bank_acc_infos;
use App\Models\Gl_acc_code;
use App\Models\Office_info;
use App\Models\Sl_acc_category;
use App\Models\Sl_acc_type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BankAccountInfoController extends Controller
{
    public function index()
    {
        $bankAccountInfos = DB::table('bank_acc_infos')
            ->join('bank_infos', 'bank_acc_infos.bank_no', '=', 'bank_infos.bank_no')
            ->join('branch_infos', 'bank_acc_infos.branch_no', '=', 'branch_infos.branch_no')
            ->select('bank_acc_infos.*', 'bank_infos.bank_name','branch_infos.branch_name')
            ->get();
    
        return response()->json($bankAccountInfos);
    }

    public function store(Request $request)
    {
         DB::beginTransaction();

         try {
            $office = Office_info::where('office_number', Auth::user()->office_number)->first();
    
            $office_id = $office->id;
    
            $status_date = date('Y-m-d');
            $gl_catgory_id=Sl_acc_category::where('category_code','=','1')->first();
            $gl_acc_type_id=Sl_acc_type::where('acc_type_code','=','2')->first();
            $parent_gl_code=Gl_acc_code::where('postable_acc','=','N')->where('acc_type_id','=',$gl_acc_type_id->id)->first();
            $gl_account = Gl_acc_code::create([
                'office_id' => $office_id,
                'category_id' => $gl_catgory_id->id,
                'acc_type_id' => $gl_acc_type_id->id,
                'parent_id' => $parent_gl_code->id,
                'acc_head' => $request->input('acc_title'),
                'postable_acc' => 'Y',
                'subsidiary_group_code' => '3',
                'rep_glcode' => '1111',
                'status_date' => $status_date,
                'create_by' => Auth::user()->id,
                
            ]);

            $bankAccountInfo = new Bank_acc_info();
            $bankAccountInfo->office_id = $office_id;  
            $bankAccountInfo->bank_acc_no = $request->input('bank_acc_no');
            $bankAccountInfo->acc_code = $gl_account->acc_code;
            $bankAccountInfo->acc_title = $request->input('acc_title');
            $bankAccountInfo->acc_open_date = $request->input('acc_open_date');
            $bankAccountInfo->bank_no = $request->input('bank_no');
            $bankAccountInfo->branch_no = $request->input('branch_no');
            $bankAccountInfo->created_by = Auth::user()->id;
            $bankAccountInfo->save();
              DB::commit();
    
             return response()->json($bankAccountInfo, 201);
        } catch (\Throwable $th) {
            DB::rollback();
            return response()->json($gl_account, 500);
        }
    }

    
    public function edit($id)
    {
        $bankAccountInfo = Bank_acc_info::find($id);

        if (!$bankAccountInfo) {
            return response()->json(['error' => 'Branch info not found'], 404);
        }

        return response()->json($bankAccountInfo);
    }

    public function update(Request $request)
    {
        $id=$request->id;
        $bankAccountInfo = Bank_acc_info::find($id);

        if (!$bankAccountInfo) {
            return response()->json(['error' => ' Bank Account Info not found'], 404);
        }

        $bankAccountInfo->bank_acc_no = $request->input('bank_acc_no');
        $bankAccountInfo->acc_title = $request->input('acc_title');
        $bankAccountInfo->bank_no = $request->input('bank_no');
        $bankAccountInfo->branch_no = $request->input('branch_no');
        $bankAccountInfo->acc_open_date = $request->input('acc_open_date');
        $bankAccountInfo->updated_by = Auth::user()->id;
        $bankAccountInfo->save();

        return response()->json($bankAccountInfo,201);
    }
}
