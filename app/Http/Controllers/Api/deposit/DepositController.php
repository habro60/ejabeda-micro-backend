<?php

namespace App\Http\Controllers\Api\deposit;

use App\Http\Controllers\Controller;
use App\Models\Account_info;
use App\Models\Gl_transaction;
use App\Models\Office_info;
use App\Models\Trn_details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DepositController extends Controller
{


    public function depositAccount()
    {
        $depositAccount = DB::table('account_infos')
            ->join('prod_service_setups', 'account_infos.prod_service_setup_id', '=', 'prod_service_setups.id')
            ->join('sl_product_categories', 'prod_service_setups.product_category', '=', 'sl_product_categories.id')
            ->where('sl_product_categories.prod_category_code', '=', 1)
            ->select('account_infos.*')
            ->get();

        return response()->json([
            'success' => true,
            'depositAccount' => $depositAccount
        ]);
    }

    public function cashdepositTransection(Request $request)
    {
        try {
            $depositsgl_trn = $request->depo;
            $depositsmember_trn = $request->member_depo;
            $org_number = $request->org_number;

            static $batch_no = null;
            if (!$batch_no) {
                $batch_no = Gl_transaction::max('batch_no') + 1;
            }


            $office = Office_info::where('office_number', Auth::user()->office_number)->first();

            $office_id = $office->id;




            foreach ($depositsgl_trn as $deposit) {
                Gl_transaction::create([
                    'office_id' => $office_id,
                    'trn_date' => $deposit['trn_date'],
                    'acc_no' => $deposit['acc_no'],
                    'batch_no' => $batch_no,
                    'trn_mode_code' => $deposit['trn_mode_code'],
                    'trn_type_code' => $deposit['trn_type_code'],
                    'vch_type_code' => $deposit['vch_type_code'],
                    'dr_loc_amt' => $deposit['dr_loc_amt'],
                    'cr_loc_amt' => $deposit['cr_loc_amt'],
                    'dr_fc_amt' => $deposit['dr_fc_amt'],
                    'cr_fc_amt' => $deposit['cr_fc_amt'],
                    'exchange_rate' => $deposit['exchange_rate'],
                    'particulars' => $deposit['particulars']

                ]);
            }
            foreach ($depositsmember_trn as $depositmember) {
                Trn_details::create([
                    'office_id' => $office_id,
                    'trn_date' => $depositmember['trn_date'],
                    'acc_no' => $depositmember['acc_no'],
                    'batch_no' => $batch_no,
                    'trn_mode_code' => $depositmember['trn_mode_code'],
                    'trn_type_code' => $depositmember['trn_type_code'],
                    'vch_type_code' => $depositmember['vch_type_code'],
                    'dr_loc_amt' => $depositmember['dr_loc_amt'],
                    'cr_loc_amt' => $depositmember['cr_loc_amt'],
                    'dr_fc_amt' => $depositmember['dr_fc_amt'],
                    'cr_fc_amt' => $depositmember['cr_fc_amt'],
                    'exchange_rate' => $depositmember['exchange_rate'],
                    'particulars' => $depositmember['particulars']
                ]);

                
            }

            return response()->json([
                'success' => true,
                'message' => 'Cash Deposit successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error, Something wrong!!'
            ]);
        }
    }


    public function calculateSumAndMaxVoucherNumber()
    {
        $dr_total = Gl_transaction::where('vch_type_code', 1)
            ->where('acc_no', 7)
            ->sum('dr_loc_amt');

        $cr_total = Gl_transaction::where('acc_no', 7)
            ->where('vch_type_code', 2)
            ->sum('cr_loc_amt');

        $result = $dr_total - $cr_total;

        $max_voucher_number = Gl_transaction::max('batch_no') + 1;

        return response()->json([
            'success' => true,
            'sum_of_dr_loc_amt' => $result,
            'max_voucher_number' => $max_voucher_number
        ]);
    }


    public function totalAcBalance($acc_no)
    {
        $cr_total = Gl_transaction::where('acc_no', $acc_no)
        ->where('vch_type_code', 2)
        ->sum('cr_loc_amt');

        $dr_total = Gl_transaction::where('acc_no', $acc_no)
        ->where('vch_type_code', 1)
        ->sum('dr_loc_amt');

        $result=$cr_total - $dr_total;
        return response()->json($result);
    }


}
