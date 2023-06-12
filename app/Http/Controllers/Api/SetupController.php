<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sl_acc_category;
use App\Models\Sl_acc_status;
use App\models\Sl_acc_type;
use App\Models\Sl_application_type;
Use App\Models\Sl_charge_pay_method;
use App\Models\Sl_charge_pay_period;
use App\Models\sl_charge_type;
use App\Models\Sl_deposit_period;
use App\Models\Sl_document_type;
use App\Models\Sl_holiday_type;
use App\Models\Sl_int_apply_period;
use App\Models\sl_int_cal_method;
use App\Models\Sl_int_type;
use App\Models\Sl_leaf_quantity;
use App\Models\Sl_office_type;
use App\Models\Sl_penalty_cal_method;
use App\Models\Sl_penalty_pay_method;
use App\Models\Sl_penalty_type;
use App\Models\Sl_prod_cal_method;
use App\Models\Sl_product_category;
use App\Models\Sl_role_type;
use App\Models\Sl_security_type;
use App\Models\Sl_trn_mode;
use App\Models\Sl_trn_type;
use App\Models\Sl_user_group;
use App\Models\Sl_vch_type;
use Illuminate\Http\Request;

class SetupController extends Controller
{
    public function sl_acc_category()
    {
        $all_sl_acc_category = Sl_acc_category::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_acc_category' => $all_sl_acc_category,
        ], 200);
    }

    public function sl_security_type()
    {
        $all_sl_security_type = Sl_security_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_security_type' => $all_sl_security_type,
        ], 200);
    }

    public function sl_acc_status()
    {
        $all_sl_acc_status = Sl_acc_status::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_acc_status' => $all_sl_acc_status,
        ], 200);
    }

    public function sl_acc_type()
    {
        $all_sl_acc_type = Sl_acc_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_acc_type' => $all_sl_acc_type,
        ], 200);
    }    
    public function sl_application_type()
    {
        $all_sl_application_type = Sl_application_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_application_type' => $all_sl_application_type,
        ], 200);
    }

    public function sl_charge_pay_method()
    {
        $all_sl_charge_pay_method = Sl_charge_pay_method::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_charge_pay_method' => $all_sl_charge_pay_method,
        ], 200);
    }

    public function sl_charge_type()
    {
        $all_sl_charge_type = Sl_charge_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_charge_type' => $all_sl_charge_type,
        ], 200);
    }
    
    public function sl_deposit_period()
    {
        $all_sl_deposit_period = Sl_deposit_period::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_deposit_period' => $all_sl_deposit_period,
        ], 200);
    }

    public function sl_document_type()
    {
        $all_sl_document_type = Sl_document_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_document_type' => $all_sl_document_type,
        ], 200);
    }

    public function sl_holiday_type()
    {
        $all_sl_holiday_type = Sl_holiday_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_holiday_type' => $all_sl_holiday_type,
        ], 200);
    }

    public function sl_int_apply_period()
    {
        $all_sl_int_apply_period = Sl_int_apply_period::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_int_apply_period' => $all_sl_int_apply_period,
        ], 200);
    }

    public function sl_int_cal_method()
    {
        $all_sl_int_cal_method = Sl_int_cal_method::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_int_cal_method' => $all_sl_int_cal_method,
        ], 200);
    }


    public function sl_int_type()
    {
        $all_sl_int_type = Sl_int_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_int_type' => $all_sl_int_type,
        ], 200);
    }

    public function sl_leaf_quantity()
    {
        $all_sl_leaf_quantity = Sl_leaf_quantity::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_leaf_quantity' => $all_sl_leaf_quantity,
        ], 200);
    }

    public function sl_office_type()
    {
        $all_sl_office_type = Sl_office_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_office_type' => $all_sl_office_type,
        ], 200);
    }

    public function sl_penalty_cal_method()
    {
        $all_sl_penalty_cal_method = Sl_penalty_cal_method::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_penalty_cal_method' => $all_sl_penalty_cal_method,
        ], 200);
    }

    public function sl_penalty_pay_method()
    {
        $all_sl_penalty_pay_method = Sl_penalty_pay_method::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_penalty_pay_method' => $all_sl_penalty_pay_method,
        ], 200);
    }

    public function sl_penalty_type()
    {
        $all_sl_penalty_type = Sl_penalty_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_penalty_type' => $all_sl_penalty_type,
        ], 200);
    }

    public function sl_prod_cal_method()
    {
        $all_sl_prod_cal_method = Sl_prod_cal_method::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_prod_cal_method' => $all_sl_prod_cal_method,
        ], 200);
    }

    public function sl_product_category()
    {
        $all_sl_product_category = Sl_product_category::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_product_category' => $all_sl_product_category,
        ], 200);
    }
    
    public function sl_role_type()
    {
        $all_sl_role_type = Sl_role_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_role_type' => $all_sl_role_type,
        ], 200);
    }

    public function sl_trn_mode()
    {
        $all_sl_trn_mode = Sl_trn_mode::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_trn_mode' => $all_sl_trn_mode,
        ], 200);
    }

    public function sl_trn_type()
    {
        $all_sl_trn_type = Sl_trn_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_trn_type' => $all_sl_trn_type,
        ], 200);
    }

    public function sl_user_group()
    {
        $all_sl_user_group = Sl_user_group::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_user_group' => $all_sl_user_group,
        ], 200);
    }

    public function sl_vch_type()
    {
        $all_sl_vch_type = Sl_vch_type::get();

        return response()->json([
            'success' => true,
            'message' => 'Data Successfuly Found',
            'all_sl_vch_type' => $all_sl_vch_type,
        ], 200);
    }

}

