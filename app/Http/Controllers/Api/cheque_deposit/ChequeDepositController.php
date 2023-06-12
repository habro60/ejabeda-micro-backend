<?php

namespace App\Http\Controllers\Api\cheque_deposit;

use App\Http\Controllers\Controller;
use App\Models\Bank_acc_info;
use App\Models\Chq_book_info;
use App\Models\chq_leaf_info;
use App\Models\Gl_acc_code;
use App\Models\Gl_transaction;
use App\Models\Office_info;
use App\Models\Sl_acc_type;
use App\Models\Trn_details;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChequeDepositController extends Controller
{
    public function chq_depositAccount()
    {
      
         $gl_acc_type_id=Sl_acc_type::where('acc_type_code','=','2')->first();
         $gl_bank_acc=Gl_acc_code::where('postable_acc','=','Y')->where('acc_type_id','=',$gl_acc_type_id->id)->get();

        $chqeque_depositAccount = DB::table('account_infos')
         ->join('prod_service_setups', 'account_infos.prod_service_setup_id', '=', 'prod_service_setups.id')
         ->join('sl_product_categories', 'prod_service_setups.product_category', '=', 'sl_product_categories.id')
         ->where('sl_product_categories.prod_category_code', '=', 1)
         ->select('account_infos.*')
         ->get();
            return response()->json([
                'success' => true,
                'chqeque_depositAccount' => $chqeque_depositAccount,
                'gl_bank_acc' => $gl_bank_acc
            ]);
    }

    public function chqdepositTransection(Request $request)
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
                    'bank_name' => $deposit['bank_name'],
                    'chq_no' => $deposit['chq_no'],
                    'chq_date' => $deposit['chq_date'],
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
                    'bank_name' => $depositmember['bank_name'],
                    'chq_no' => $depositmember['chq_no'],
                    'chq_date' => $depositmember['chq_date'],
                    'particulars' => $depositmember['particulars']
                ]);
            }

            return response()->json([
                'success' => true,
                'message' => 'Cheque Deposit successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Error, Something wrong!!'
            ]);
        }
    }
    public function chqWithdrawTransection(Request $request)
    {
        // try {
            $depositsgl_trn = $request->depo;
            $chq_no = $request->chq_no;
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
                    'chq_no' => $deposit['chq_no'],
                    'chq_date' => $deposit['chq_date'],
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
                    'chq_no' => $depositmember['chq_no'],
                    'chq_date' => $depositmember['chq_date'],
                    'particulars' => $depositmember['particulars']
                ]);
            }

            if (is_array($chq_no)) {
                foreach ($chq_no as $chq_leaf_no) {
                    $leaf = chq_leaf_info::where('leaf_sl_no',$chq_leaf_no)->first();
                    $leaf->update([
                        'leaf_status' => 1,
                        'status_date' => date('Y-m-d')
                    ]);
                }
            }
            

            return response()->json([
                'success' => true,
                'message' => 'Cheque Withdraw successfully'
            ]);
        // } catch (\Throwable $th) {
        //     return response()->json([
        //         'success' => false,
        //         'message' => 'Error, Something wrong!!'
        //     ]);
        // }
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

    public function totalchqWithAcBalance($acc_no)
    {
        
        $dr_total = Gl_transaction::where('acc_no', $acc_no)
            ->where('vch_type_code', 1)
            ->sum('dr_loc_amt');

        $cr_total = Gl_transaction::where('acc_no', $acc_no)
            ->where('vch_type_code', 2)
            ->sum('cr_loc_amt');

            $dr=intval($dr_total);
        $result = $dr_total-$cr_total;    

        return response()->json($result);
    }
}
