<?php

namespace App\Http\Controllers\Api\bank;

use App\Http\Controllers\Controller;
use App\Models\Bank_infos;
use App\Models\Office_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BankController extends Controller
{
    public function index(Request $request)
    {
        $bankInfos = Bank_infos::all();

        return response()->json($bankInfos);
    }

    public function getBankNumbers()
{
    $banks = Bank_infos::pluck('bank_name', 'bank_no')->toArray();
    return response()->json($banks);
}

    public function store(Request $request)
    {
        $rules = [
            'bank_name' => 'required|string|max:255',
            'bank_no' => 'required|string|max:255|unique:bank_infos,bank_no',
            'bank_add' => 'required|string|max:255',
            'bank_email' => 'required|string|email|max:255|unique:bank_infos,bank_email',
        ];

        $validatedData = $request->validate($rules);

        $office = Office_info::where('office_number', Auth::user()->office_number)->first();

        $office_id = $office->id;

        $bankInfo = new Bank_infos();
        $bankInfo->office_id = $office_id;  
        $bankInfo->bank_name = $request->input('bank_name');
        $bankInfo->bank_no = $request->input('bank_no');
        $bankInfo->bank_add = $request->input('bank_add');
        $bankInfo->bank_email = $request->input('bank_email');
        $bankInfo->created_by = Auth::user()->id;
        $bankInfo->save();

        return response()->json($bankInfo, 201);
    }


    public function edit($id)
    {
        $bankInfo = Bank_infos::find($id);

        if (!$bankInfo) {
            return response()->json(['error' => 'BankInfo not found'], 404);
        }

        return response()->json($bankInfo);
    }

    public function update(Request $request)
    {
        $id=$request->id;
        $bankInfo = Bank_infos::find($id);

        if (!$bankInfo) {
            return response()->json(['error' => 'BankInfo not found'], 404);
        }

        $bankInfo->bank_name = $request->input('bank_name');
        $bankInfo->bank_no = $request->input('bank_no');
        $bankInfo->bank_add = $request->input('bank_add');
        $bankInfo->bank_email = $request->input('bank_email');
        $bankInfo->updated_by = Auth::user()->id;
        $bankInfo->save();

        return response()->json($bankInfo,201);
    }
}
