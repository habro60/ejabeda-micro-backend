<?php

namespace App\Http\Controllers\branch;

use App\Http\Controllers\Controller;
use App\Models\Branch_info;
use App\Models\Office_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BranchInfoController extends Controller
{
    public function index()
    {
        $branches = DB::table('branch_infos')
            ->join('bank_infos', 'branch_infos.bank_no', '=', 'bank_infos.bank_no')
            ->select('branch_infos.*', 'bank_infos.bank_name')
            ->get();
    
        return response()->json($branches);
    }


    
    public function getBranchNumbers()
{
    $branches = Branch_info::pluck('branch_name', 'branch_no')->toArray();
    return response()->json($branches);
}

    
    public function store(Request $request)
    {
   
        $office = Office_info::where('office_number', Auth::user()->office_number)->first();

        $office_id = $office->id;



        $branchInfo = new Branch_info();
        $branchInfo->office_id = $office_id;  
        $branchInfo->branch_name = $request->input('branch_name');
        $branchInfo->branch_routing_no = $request->input('branch_routing_no');
        $branchInfo->bank_no = $request->input('bank_no');
        $branchInfo->branch_no = $request->input('branch_no');
        $branchInfo->branch_add = $request->input('branch_add');
        $branchInfo->branch_email = $request->input('branch_email');
        $branchInfo->branch_mobil_no = $request->input('branch_mobil_no');
        $branchInfo->created_by = Auth::user()->id;
        $branchInfo->save();

        return response()->json($branchInfo, 201);
    }


    public function edit($id)
    {
        $branchInfo = Branch_info::find($id);

        if (!$branchInfo) {
            return response()->json(['error' => 'Branch info not found'], 404);
        }

        return response()->json($branchInfo);
    }
    
    public function update(Request $request)
    {
        $id=$request->id;
        $branchInfo = Branch_info::find($id);

        if (!$branchInfo) {
            return response()->json(['error' => ' Branch Info not found'], 404);
        }

        $branchInfo->branch_name = $request->input('branch_name');
        $branchInfo->branch_routing_no = $request->input('branch_routing_no');
        $branchInfo->bank_no = $request->input('bank_no');
        $branchInfo->branch_no = $request->input('branch_no');
        $branchInfo->branch_add = $request->input('branch_add');
        $branchInfo->branch_email = $request->input('branch_email');
        $branchInfo->branch_mobil_no = $request->input('branch_mobil_no');
        $branchInfo->updated_by = Auth::user()->id;
        $branchInfo->save();

        return response()->json($branchInfo,201);
    }
}
