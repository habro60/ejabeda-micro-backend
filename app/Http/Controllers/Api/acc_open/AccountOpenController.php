<?php

namespace App\Http\Controllers\Api\acc_open;

use App\Http\Controllers\Controller;
use App\Models\Account_info;
use App\Models\Guarantor_info;
use App\Models\nominee_info;
use App\Models\Office_info;
use App\Models\Prod_service_setup;
use App\Models\Security_info;
use App\Models\User;
use App\Models\User_detail_info;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AccountOpenController extends Controller
{



    public function allAccount()
    {


        $account_open = DB::table('account_infos')
            ->join('users', 'account_infos.user_id', '=', 'users.id')
            ->join('prod_service_setups', 'account_infos.prod_service_setup_id', '=', 'prod_service_setups.id')
            ->join('sl_product_categories', 'prod_service_setups.product_category', '=', 'sl_product_categories.id')
            ->select('account_infos.acc_no', 'account_infos.acc_name', 'users.name', 'sl_product_categories.title', 'prod_service_setups.product_name')
            ->orderByDesc('account_infos.id')
            ->get();


        return response()->json([

            'success' => true,
            'account_open' => $account_open
        ]);
    }


    public function saving_gl_account()
    {
        $depositAccount = DB::table('account_infos')
            ->join('prod_service_setups', 'account_infos.prod_service_setup_id', '=', 'prod_service_setups.id')
            ->join('sl_product_categories', 'prod_service_setups.product_category', '=', 'sl_product_categories.id')
            ->where('sl_product_categories.prod_category_code', '=', 1)
            ->select('account_infos.*')
            ->get();

        return response()->json($depositAccount);
    }

    public function accountCreate(Request $request)
    {

        $office = Office_info::where('office_number', Auth::user()->office_number)->first();

        $office_id = $office->id;

        $role = Auth::user()->role;
        $acc_name = User::where('id', $request->user_id)->first()->name;
        $user_number = User_detail_info::where('user_id', $request->user_id)->first()->user_number;
        $prod_code = Prod_service_setup::where('id', $request->prod_service_setup_id)->first()->prod_code;
        $office_number = $office->office_number;

        $account_number = $office_number . '-' . $prod_code . '-' . $user_number;

        // DB::beginTransaction();
        // try {

        $account_open = new Account_info();
        $account_open->office_id = $office_id;
        $account_open->user_id = $request->user_id;
        $account_open->prod_service_setup_id = $request->prod_service_setup_id;
        $account_open->acc_no = $request->acc_no ?? $account_number;
        $account_open->acc_name = $acc_name;
        $account_open->introducer_name = $request->introducer_name ?? '';
        $account_open->acc_open_date = date('Y-m-d');
        $account_open->acc_status_date = date('Y-m-d');
        $account_open->sl_acc_status_id = 3;
        $account_open->acc_status_ref = $role->title;
        $account_open->sl_deposit_period_id = $request->sl_deposit_period_id;
        $account_open->deposit_amt = $request->deposit_amt;
        $account_open->loan_limit = $request->loan_limit;
        $account_open->loan_section_amt = $request->loan_section_amt;
        $account_open->loan_instalment_amt = $request->loan_instalment_amt;
        $account_open->number_of_instalment = $request->number_of_instalment;
        $account_open->nid_doc = $request->nid_doc;
        $account_open->passport_doc = $request->passport_doc;
        $account_open->birth_certificate_doc = $request->birth_certificate_doc;
        $account_open->tin_doc = $request->tin_doc;

        $account_open->other_account_number = $request->other_account_number;
        $account_open->opening_fee = $request->opening_fee;

        $account_open->no_of_deposit = $request->no_of_deposit;
        $account_open->per_deposit = $request->per_deposit;

        $account_open->created_by = Auth::user()->id;
        // $account_open->save();


        if (isset($request->security_info)) {
            if (count($request->security_info) > 0) {

                // $security=new Security_info();
                // $security->office_id = $office_id;
                // $security->acc_no = $account_open->acc_no??$account_number;
                // $security->sl_security_type_code = $request->sl_security_type_code;
                // $security->value = $request->value;
                // $security->location = $request->location;
                // $security->area = $request->area;
                // $security->save();

                $security_info = $request->security_info;
                foreach ($security_info['sl_security_type_code'] as $key => $value) {
                    $security_infos = new Security_info();
                    $security_infos->office_id = $office_id;
                    $security_infos->acc_no = $account_open->acc_no ?? $account_number;
                    $security_infos->sl_security_type_code = $security_info['sl_security_type_code'][$key];
                    $security_infos->value = $security_info['value'][$key];
                    $security_infos->location = $security_info['location'][$key];
                    $security_infos->area = $security_info['area'][$key];
                    $security_infos->save();
                }
            }
        }


       
        if (isset($request->guarantors)) {
            # code...
            // return $nominee = $request->nominee;
            if (count($request->guarantors) > 0) {
                // gurantor info
                //  $guarantor =new  Guarantor_info();
                //  $guarantor->office_id = $office_id;
                //  $guarantor->acc_no =  $account_open->acc_no;
                //  $guarantor->guarantor_name = $request->guarantor_name;
                //  $guarantor->guarantor_NID = $request->guarantor_NID;
                //  $guarantor->mobile_no = $request->mobile_no;
                //  $guarantor->address = $request->address;
                //  $guarantor->profession = $request->profession;
                //  $guarantor->guarantor_amt = $request->guarantor_amt;
                //  $guarantor->guarantor_status_date = date('Y-m-d');
                //  $guarantor->guarantor_status_ref = $role->title;
                //  $guarantor->save();


                $guarantors = $request->guarantors;
                foreach ($guarantors['guarantor_name'] as $key => $value) {
                    $guarantor = new Guarantor_info([
                        'office_id' => $office_id,
                        'acc_no' => $account_open->acc_no ?? $account_number,
                        'guarantor_name' => $guarantors['guarantor_name'][$key],
                        'guarantor_NID' => $guarantors['guarantor_NID'][$key],
                        'mobile_no' => $guarantors['mobile_no'][$key],
                        'guarantor_amt' => $guarantors['guarantor_amt'][$key],
                        'profession' => $guarantors['profession'][$key],
                        'address' => $guarantors['address'][$key],
                        'guarantor_status_date' => date('Y-m-d'),
                        'guarantor_status_ref' => $role->title
                    ]);

                    $guarantor->save();
                }
            }
        }


        if (isset($request->nominee)) {
            if (count($request->nominee) > 0) {
                
                $nominees = $request->nominee;
            
                
                foreach ($nominees['nominee_name'] as $key => $value) {
                     $value = $nominees['nominee_name'][0];
                     return $value;
                    $nominee = new nominee_info([
                        'office_id' => $office_id,
                        'acc_no' => $account_open->acc_no ?? $account_number,
                        'nominee_name' => $nominees['nominee_name'][$key],
                        'nominee_NID' => $nominees['nominee_NID'][$key],
                        'nominee_mobile_no' => $nominees['nominee_mobile_no'][$key],
                        'nominee_share' => $nominees['nominee_share'][$key],
                        'nominee_status_date' => date('Y-m-d'),
                        'nominee_status_ref' => $role->title,
                        'created_by' => Auth::user()->id,
                    ]);
                
                    $nominee->save();
                }
                
                
                
               

                // $nominee = new nominee_info();

                // $nominee->nominee_name = $request->nominee_name;
                // $nominee->nominee_NID = $request->nominee_NID;
                // $nominee->nominee_mobile_no = $request->nominee_mobile_no;
                // $nominee->nominee_relation = $request->nominee_relation;
                // $nominee->nominee_status_date = date('Y-m-d');
                // $nominee->nominee_status_ref = $role->title;

            }
        }
       

        // DB::commit();

        return response()->json([
            // childs
            'success' => true,
            'message' => 'Account Create Successfully'
        ]);


        // } catch (\Exception $ex) {
        //     DB::rollback();
        //     return response()->json(['error' => $ex->getMessage()], 500);
        // }

    }
}
