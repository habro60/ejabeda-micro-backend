<?php

namespace App\Http\Controllers\Api\product;

use App\Http\Controllers\Controller;
use App\Models\Int_rate_setup;
use App\Models\Office_info;
use App\Models\Prod_service_setup;
use App\Models\Product_closing_rule;
use App\Models\Product_deposit_rule;
use App\Models\Product_doc_info;
use App\Models\Product_opening_rule;
use App\Models\Product_transaction_rule;
use App\Models\Sl_document_type;
use App\Models\Sl_product_category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductRuleController extends Controller
{

    public function opening_rule($id)
    {
        $openingRule = Product_opening_rule::where('product_id', $id)->first();
       
        $Product_closing_rule = Product_closing_rule::where('product_id', $id)->first();
        $Product_deposit_rule = Product_deposit_rule::where('product_id', $id)->first();
        $Product_doc_info = Product_doc_info::where('product_id', $id)->first();
        $Product_transaction_rule = Product_transaction_rule::where('product_id', $id)->first();
        $Sl_document_type = Sl_document_type::get();



        if (empty($openingRule)) {
            $office = Office_info::where('office_number', Auth::user()->office_number)->first();
            $office_id = $office->id;
            $openingRuleCreate = Product_opening_rule::create([
                'office_id' => $office_id,
                'product_id' => $id,
                'direct_open' => false,
                'must_have_other_acc' => false,
                'allow_opening_fee' => false,
                'need_group_leader' => false,
                'introducer_info' => false,
                'nominee_info' => false,
                'guarantor_info' => false,
                'created_by' => Auth::user()->id,

            ]);

            $openingRule = Product_opening_rule::where('product_id', $id)->first();
        }

        if (empty($Product_closing_rule)) {
            $office = Office_info::where('office_number', Auth::user()->office_number)->first();
            $office_id = $office->id;
            $Product_closing_rule_create = Product_closing_rule::create([
                'office_id' => $office_id,
                'product_id' => $id,
                'balence_must_be_zero' => false,
                'close_on_maturity' => false,
                'close_on_status' => false,
                'closing_fee' => false,
                'created_by' => Auth::user()->id,

            ]);

            $Product_closing_rule = Product_closing_rule::where('product_id', $id)->first();
        }


        if (empty($Product_deposit_rule)) {
            $office = Office_info::where('office_number', Auth::user()->office_number)->first();
            $office_id = $office->id;
            $Product_deposit_rule_create = Product_deposit_rule::create([
                'office_id' => $office_id,
                'product_id' => $id,
                'min_deposit_amt' => false,
                'max_deposit_amt' => false,
                'deposit_on_demand' => false,
                'deposit_frequent_intervel' => false,
                'min_withdrawal_amt' => 0.00,
                'max_withdrawal_amt' => 0.00,
                'withdrawal_on_demand' => false,
                'withdrawal_at_onece' => false,
                'withdrawal_frequent_interval' => false,
                'created_by' => Auth::user()->id,

            ]);

            $Product_deposit_rule = Product_deposit_rule::where('product_id', $id)->first();
        }

        if (empty($Product_transaction_rule)) {
            $office = Office_info::where('office_number', Auth::user()->office_number)->first();
            $office_id = $office->id;
            $Product_transaction_ruleCreate = Product_transaction_rule::create([
                'office_id' => $office_id,
                'product_id' => $id,
                'need_varification' => false,
                'allow_dr_tran' => false,
                'allow_cr_tran' => false,
                'allow_over_due_tran' => false,
                'allow_cash_tran' => false,
                'allow_clearing_tran' => false,
                'allow_transfer_tran' => false,
                'allow_negative_balance' => false,
                'created_by' => Auth::user()->id,

            ]);

            $Product_transaction_rule = Product_transaction_rule::where('product_id', $id)->first();
        }
        // return $id;
        $product=Prod_service_setup::where('id',$id)->first();

        $product_category=Sl_product_category::where('id',$product->product_category)->first();


        return response()->json([
            'success' => true,
            'openingRule' => $openingRule,
            'Product_closing_rule' => $Product_closing_rule,
            'Product_deposit_rule' => $Product_deposit_rule,
            'Product_transaction_rule' => $Product_transaction_rule,
            'Product_doc_info' => $Product_doc_info,
            'Sl_document_type' => $Sl_document_type,
            'product_category' => $product_category
        ]);
    }




    public function product_rule_update($field, $id)
    {
        $openingRule = Product_opening_rule::where('product_id', $id)->first();
        $openingRule->$field = !$openingRule->$field;
        $openingRule->update();
        // return response()->json()
    }
    public function product_closing_rule_update($field, $id)
    {
        $Product_closing_rule = Product_closing_rule::where('product_id', $id)->first();
        $Product_closing_rule->$field = !$Product_closing_rule->$field;
        $Product_closing_rule->update();
    }
    public function product_deposit_rule_update(Request $request,$field, $id)
    {
       

            $Product_deposit_rule = Product_deposit_rule::where('product_id', $id)->first();
            $Product_deposit_rule->$field = !$Product_deposit_rule->$field;
            $Product_deposit_rule->update();
       

    }
    public function product_transaction_rule_update($field, $id)
    {
        $Product_transaction_rule = Product_transaction_rule::where('product_id', $id)->first();
        $Product_transaction_rule->$field = !$Product_transaction_rule->$field;
        $Product_transaction_rule->update();
    }


    public function product_document_rule_update($sl_doc_type, $id)
    {
        $office = Office_info::where('office_number', Auth::user()->office_number)->first();
        $office_id = $office->id;

        $doc_exist=Product_doc_info::where('product_id', $id)->first();
       
        if ($doc_exist) {
           
            $doc_rule_update=Product_doc_info::where('product_id', $id)->update([
            
                    'office_id' => $office_id,
                    'product_id' =>$id,
                    'sl_document_type_id' =>$sl_doc_type,
                    'type_requre' => true               
                ]
    
            );
        }else{

            $doc_rule_update=Product_doc_info::where('product_id', $id)->create([
            
                'office_id' => $office_id,
                'product_id' =>$id,
                'sl_document_type_id' =>$sl_doc_type,
                'type_requre' => true               
            ]
        );
        }

       
    }


    public function product_doc_rules($id)
    { 
        $doc_exist=Product_doc_info::where('product_id', $id)->first();
        $sl_doc_type = Sl_document_type::get();
         $sl_document_type_id = explode(',',$doc_exist->sl_document_type_id);
            foreach ($sl_document_type_id as $key => $value) {
                $sl_doc_type = Sl_document_type::find($value);
                $doc_res[]= $sl_doc_type;
            }
                   
        return response()->json([
            'success' => true,
            'product_doc_rules' => $doc_res
           
        ]);
    }


}
