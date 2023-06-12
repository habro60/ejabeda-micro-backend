<?php

namespace App\Http\Controllers\Api\loan;

use App\Http\Controllers\Controller;
use App\Models\Account_info;
use App\Models\disbursement_schedule;
use App\Models\Gl_acc_code;
use App\Models\Gl_transaction;
use App\Models\Int_rate_setup;
use App\Models\Loan_sanction_info;
use App\Models\Office_info;
use App\Models\Prod_service_setup;
use App\Models\Repayment_schedule;
use App\Models\Sl_acc_type;
use App\Models\Trn_details;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class LoanController extends Controller

{
    public function loan_sanction()
    {

        $loan_sanction = Loan_sanction_info::join('account_infos', 'loan_sanction_infos.acc_no', '=', 'account_infos.acc_no')
        ->where('loan_sanction_infos.status', 1)
        ->select('loan_sanction_infos.*', 'account_infos.acc_name as acc_title')
        ->get();


        return response()->json($loan_sanction);
    }


    public function getLoanAccount()
    {

        $loanAccount = DB::table('account_infos as ai')
            ->join('prod_service_setups as pss', 'ai.prod_service_setup_id', '=', 'pss.id')
            ->join('sl_product_categories as pc', 'pss.product_category', '=', 'pc.id')
            ->select('ai.*')
            ->where('pc.prod_category_code', 3)
            ->get();



        return response()->json($loanAccount);
    }



    public function loan_sanction_store(Request $request)
    {

       // return $request->all();

        $rules = [
            'acc_no' => 'required|string|max:255',
            'sanction_amt' => 'required|string|max:255',
            'sanction_date' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $office = Office_info::where('office_number', Auth::user()->office_number)->first();

        $office_id = $office->id;
        

        $loanInfo = new Loan_sanction_info();
        $loanInfo->office_id = $office_id;
        $loanInfo->acc_no = $request->input('acc_no');
        $loanInfo->sanction_date = $request->input('sanction_date');
        $loanInfo->sanction_amt = $request->input('sanction_amt');
        $loanInfo->int_rate = $request->input('int_rate');
        $loanInfo->tenure = $request->input('tenure');
        $loanInfo->instalment_amt = $request->input('instalment_amt');
        $loanInfo->number_of_installment = $request->input('number_of_installment');
        $loanInfo->effect_date = $request->input('effect_date');
        $loanInfo->created_by = Auth::user()->id;
        $loanInfo->save();

     


        return response()->json($loanInfo, 201);
    }


    public function loan_sanction_update(Request $request)
    {
        $rules = [
            'id' => 'required',
            'acc_no' => 'required|string|max:255',
            'sanction_amt' => 'required|string|max:255',
            'sanction_date' => 'required',
        ];

        $validatedData = $request->validate($rules);

        $office = Office_info::where('office_number', Auth::user()->office_number)->first();

        $office_id = $office->id;
        $id = $request->input('id');
        $loanInfo =  Loan_sanction_info::find($id);
        $loanInfo->office_id = $office_id;
        $loanInfo->acc_no = $request->input('acc_no');
        $loanInfo->sanction_date = $request->input('sanction_date');
        $loanInfo->sanction_amt = $request->input('sanction_amt');
        $loanInfo->tenure = $request->input('tenure');
        $loanInfo->instalment_amt = $request->input('instalment_amt');
        $loanInfo->number_of_installment = $request->input('number_of_installment');
        $loanInfo->effect_date = $request->input('effect_date');
        $loanInfo->updated_by = Auth::user()->id;
        $loanInfo->save();

        return response()->json($loanInfo, 201);
    }

    public function edit($id)
    {
        $loan_sanction = Loan_sanction_info::find($id);

        if (!$loan_sanction) {
            return response()->json(['error' => 'loan_sanction not found'], 404);
        }

        return response()->json($loan_sanction);
    }



    public function account_interest_cal($acc_no)
    {
        $account = Account_info::where('acc_no', $acc_no)->first();
        // $product = Prod_service_setup::where('id',$account->prod_service_setup_id)->first();

        $interest = DB::table('int_rate_setups')
            ->join('sl_int_types', 'int_rate_setups.sl_int_type_id', '=', 'sl_int_types.id')
            ->join('sl_int_cal_methods', 'int_rate_setups.sl_int_cal_method_id', '=', 'sl_int_cal_methods.id')
            ->join('sl_int_apply_periods', 'int_rate_setups.sl_int_apply_period_id', '=', 'sl_int_apply_periods.id')
            ->join('prod_service_setups', 'int_rate_setups.product_id', '=', 'prod_service_setups.id')
            ->select(
                'int_rate_setups.effect_date',
                'int_rate_setups.id',
                'int_rate_setups.int_rate',
                'sl_int_types.sl_int_type_code as sl_int_type_code','sl_int_types.titles as sl_int_type_name',
                'sl_int_cal_methods.int_cal_method_code as int_cal_method_code','sl_int_cal_methods.title as int_cal_method_name',
                'sl_int_apply_periods.int_apply_period_code as int_apply_period_code','sl_int_apply_periods.title as int_apply_period_name',
            )
            ->where('int_rate_setups.product_id', $account->prod_service_setup_id)
            ->first();


        // $interest= Int_rate_setup::where('product_id',$account->prod_service_setup_id)->first();

        return response()->json($interest);
    }

    // disbursed schedule

    public function all_disbursement_schedule()
    {
        $all_disbursement_schedule = disbursement_schedule::where('active_status',1)->get();

        return response()->json($all_disbursement_schedule);

        // return response()->json(['data' => $all_disbursement_schedule]);
    }

    public function disburse_store(Request $request)
    {
        $input = $request->all();

        $office = Office_info::where('office_number', Auth::user()->office_number)->first();

        $disburs_phase = Loan_sanction_info::where('acc_no', $input['acc_no'])->count();
        $input['disburs_phase'] = $disburs_phase;
        $input['office_id'] = $office->id;

        // return response()->json($input);  


        $disbursement_schedule = disbursement_schedule::create($input);
        if($input['status']=='complete'){
            $sanction = Loan_sanction_info::where('acc_no',$input['acc_no'])->where('status',1)->first();
            $sanction->status = 0; // Set active_status to 0 (inactive)
            $sanction->save();

        }


        return response()->json($disbursement_schedule, 201);
    }

    public function disburse_edit($id)
    {
        $disbursement_schedule = disbursement_schedule::find($id);

        if (!$disbursement_schedule) {
            return response()->json(['error' => 'disbursement_schedule not found'], 404);
        }

        return response()->json($disbursement_schedule);
    }

    public function disburse_update(Request $request)
    {
        $id = $request->id;
        $disburseInfo =  disbursement_schedule::find($id);
        $disburseInfo->acc_no = $request->input('acc_no');
        $disburseInfo->total_disburse_amt = $request->input('total_disburse_amt');
        $disburseInfo->disburs_phase = $request->input('disburs_phase');
        $disburseInfo->disburse_amt = $request->input('disburse_amt');
        $disburseInfo->disburs_date = $request->input('disburs_date');
        $disburseInfo->number_of_disbuse = $request->input('number_of_disbuse');
        $disburseInfo->effect_date = $request->input('effect_date');
        $disburseInfo->updated_by = Auth::user()->id;
        $disburseInfo->save();

        return response()->json($disburseInfo, 201);
    }

    public function loanAccount()
    {

        $gl_acc_type_id = Sl_acc_type::where('acc_type_code', '=', '2')->first();
        $gl_bank_acc = Gl_acc_code::where('postable_acc', '=', 'Y')->where('acc_type_id', '=', $gl_acc_type_id->id)->get();

        $loanAccount = DB::table('account_infos')
            ->join('prod_service_setups', 'account_infos.prod_service_setup_id', '=', 'prod_service_setups.id')
            ->join('sl_product_categories', 'prod_service_setups.product_category', '=', 'sl_product_categories.id')
            ->where('sl_product_categories.prod_category_code', '=', 3)
            ->select('account_infos.*')
            ->get();
        return response()->json([
            'success' => true,
            'loan_account' => $loanAccount,
            'gl_bank_acc' => $gl_bank_acc
        ]);
    }


    public function loanSanctionDetails(Request $request)
    {
        $accNo = $request->query('acc_no');

        $accountLoanDetail=[];

        $status='not compleate';
        $no_of_disbursed=1;


        $sanctionDetails=Loan_sanction_info::where('acc_no',$accNo)->where('status',1)->first();

        $sanction_amount=$sanctionDetails->sanction_amt;
        $remainSanctionAmount=$sanctionDetails->sanction_amt;

        $disbursedDetails=disbursement_schedule::where('acc_no',$accNo)->where('active_status',1)->get();

        if (!empty($disbursedDetails)) {

            foreach ($disbursedDetails as $key => $value) {
               
                $remainSanctionAmount=$remainSanctionAmount-$value->disburse_amt;

                if($remainSanctionAmount<=0){
                    $status='compleate';
                }else{
                    $status=$key+1;
                   
                }

                $no_of_disbursed=$key+1;
            }


            $no_of_disbursed= $disbursedDetails->count();

        }

        $no_of_disbursed++;
       // Create the JSON response
        $response = [
            'status' => $status,
            'remainSanctionAmount' => $remainSanctionAmount,
            'no_of_disbursed' => $no_of_disbursed,
            'sanction_amount' => $sanction_amount,
        ];

        // Return the response as JSON
        return response()->json($response);

        
    }

    public function getDisbursementSchedules(Request $request)
    {
        $accNo = $request->input('acc_no');
        $currentDate = Carbon::now()->toDateString();

        // Fetch the disbursement schedules for the selected account number
        $schedules = disbursement_schedule::where('acc_no', $accNo)
            ->where('active_status', 1)
            ->whereDate('disburs_date', '<=', $currentDate)
            ->whereDate('effect_date', '<=', $currentDate)
            ->get();

        // Return the schedules as a JSON response
        return response()->json($schedules);
       
    }



    public function disburse_tranjection_store(Request $request)
    {
        $disburse = $request->all();
        $account_info = Account_info::where('acc_no', $disburse['acc_no'])->first();
        $product_info = Prod_service_setup::where('id', $account_info->prod_service_setup_id)->first();
        $product_gl_info = Gl_acc_code::where('id', $product_info->gl_acc_id)->first();
        $office = Office_info::where('office_number', Auth::user()->office_number)->first();
    
        $office_id = $office->id;
    
        $member_trncr = [
            'office_id' => $office_id,
            'trn_date' => $disburse['tr_date'],
            'acc_no' => $disburse['acc_no'],
            'batch_no' => $disburse['voucher_no'],
            'trn_mode_code' => 7,
            'trn_type_code' => 2,
            'vch_type_code' => 1,
            'dr_loc_amt' => $disburse['amount'],
            'cr_loc_amt' => 0.00,
            'dr_fc_amt' => 0.00,
            'cr_fc_amt' => 0.00,
            'exchange_rate' => 0,
            'particulars' => $disburse['particular'],
        ];
    
        $newDepocr = [
            'office_id' => $office_id,
            'trn_date' => $disburse['tr_date'],
            'acc_no' => $product_gl_info->acc_code,
            'batch_no' => $disburse['voucher_no'],
            'trn_mode_code' => 7,
            'trn_type_code' => 2,
            'vch_type_code' => 1,
            'dr_loc_amt' => $disburse['amount'],
            'cr_loc_amt' => 0.00,
            'dr_fc_amt' => 0.00,
            'cr_fc_amt' => 0.00,
            'exchange_rate' => 0,
            'particulars' => $disburse['particular'],
        ];
    
        $newDepodr2 = [
            'office_id' => $office_id,
            'trn_date' => $disburse['tr_date'],
            'acc_no' => 7,
            'batch_no' => $disburse['voucher_no'],
            'trn_mode_code' => 7,
            'trn_type_code' => 2,
            'vch_type_code' => 2,
            'dr_loc_amt' => 0.00,
            'cr_loc_amt' => $disburse['amount'],
            'dr_fc_amt' => 0.00,
            'cr_fc_amt' => 0.00,
            'exchange_rate' => 0,
            'particulars' => $disburse['particular'],
        ];
    
        DB::beginTransaction();

         try {
            // Perform your database operations within the transaction
    
            // ...
    
            Gl_transaction::create($newDepocr);
            Gl_transaction::create($newDepodr2);
            Trn_details::create($member_trncr);
    
            $schedule = disbursement_schedule::find($disburse['scheduleId']);
            $schedule->active_status = 0; // Set active_status to 0 (inactive)
            $schedule->save();
    
            // ...
    
            DB::commit();
    
            // Return a success JSON response
            return response()->json(['success' => true, 'message' => 'Disbursement successful']);
    
        } catch (\Exception $e) {
            DB::rollback();
    
            // Handle the exception or return an error JSON response
            return response()->json(['success' => false, 'message' => 'Disbursement failed', 'error' => $e->getMessage()]);
        }
 
    }
    
    // loan receive


    
    public function loanReceiveDetails(Request $request)
    {
        $accNo = $request->input('acc_no');
        $currentDate = Carbon::now()->toDateString();

        // Fetch the disbursement schedules for the selected account number
        $schedules = disbursement_schedule::where('acc_no', $accNo)
            ->where('active_status', 1)
            ->whereDate('disburs_date', '<=', $currentDate)
            ->whereDate('effect_date', '<=', $currentDate)
            ->get();

        // Return the schedules as a JSON response
        return response()->json($schedules);
       
    }
}
