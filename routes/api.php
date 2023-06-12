<?php

use App\Http\Controllers\Api\acc_open\AccountOpenController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;
use App\Http\Controllers\Api\bank\BankController;
use App\Http\Controllers\Api\charge\ChargeController;
use App\Http\Controllers\Api\cheque\ChequbookController;
use App\Http\Controllers\Api\cheque_book\ChequeBookController;
use App\Http\Controllers\Api\cheque_deposit\ChequeDepositController;
use App\Http\Controllers\Api\cheque_leaf\Cheque_leafController;
use App\Http\Controllers\Api\deposit\DepositController;
use App\Http\Controllers\Api\gl_acc_code\Gl_accountController;
use App\Http\Controllers\Api\GlaccountController;
use App\Http\Controllers\Api\holiday\HolidayController;
use App\Http\Controllers\Api\interest\InterestController;
use App\Http\Controllers\Api\loan\LoanController;
use App\Http\Controllers\Api\OfficeController;
use App\Http\Controllers\Api\OrganizationController;
use App\Http\Controllers\Api\penalty\PenaltyController;
use App\Http\Controllers\Api\permission\PermissionController;
use App\Http\Controllers\Api\product\ProductController;
use App\Http\Controllers\Api\product\ProductRuleController;
use App\Http\Controllers\Api\product\ProductServiceController;
use App\Http\Controllers\Api\RoleController;
use App\Http\Controllers\Api\SetupController;
use App\Http\Controllers\Api\test\TestController;
use App\Http\Controllers\Api\user\UserController;
use App\Http\Controllers\bankAccount\BankAccountInfoController;
use App\Http\Controllers\branch\BranchInfoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// api login start
Route::post('orgRegister', [OrganizationController::class, 'organizationRegister']);
Route::post('login', [ApiController::class, 'authenticate']);
Route::post('register', [ApiController::class, 'register']);



Route::group(['middleware' => ['customar','jwt.verify']], function() {

Route::get('logout', [ApiController::class, 'logout']);
Route::get('get_user', [ApiController::class, 'get_user']);
Route::get('role',[RoleController::class,'index']);  
Route::get('menu/{name}',[RoleController::class,'menu']);  


// user



Route::middleware('throttle:60,1')->get('all_user',[UserController::class,'index']);  
Route::post('user_create', [UserController::class,'create']);
Route::get('user_edit/{id}',[UserController::class,'edit']);  
Route::get('group_type_user/{id}',[UserController::class,'group_type_user']);  
Route::get('user_active',[UserController::class,'user_active']);  
Route::get('user_inactive',[UserController::class,'user_inactive']); 
Route::get('user_transfer',[UserController::class,'user_transfer']); 
Route::post('update_user_status/{id}', [UserController::class, 'update_user_status']);
Route::post('user_transfer_update',[UserController::class,'user_transfer_update']);
Route::post('user_update',[UserController::class,'user_update']);
Route::get('user_all_transfer_history/{id}', [UserController::class, 'user_all_transfer_history']);
Route::get('user_team_laed', [UserController::class, 'user_team_laed']);
Route::get('user_detail_get/{id}', [UserController::class, 'user_detail_get']);
Route::post('user_detail_update', [UserController::class, 'user_detail_update']);

// Route::middleware('throttle:60,1')->get('/api/users', 'UserController@index');

//office
Route::get('alloffice',[OfficeController::class,'alloffice']);  
Route::get('office',[OfficeController::class,'manageOffice']);  
Route::get('child_office/{id}',[OfficeController::class,'child']);  
Route::get('get_edit_office_data/{id}',[OfficeController::class,'get_edit_office_data']);  
Route::post('update_office_data',[OfficeController::class,'update_office_data']);  
Route::get('sl_office_type',[OfficeController::class,'sl_office_type']);  
Route::post('addOffice',[OfficeController::class,'addOffice']); 

// product Service

Route::get('all_product_service',[ProductServiceController::class,'manageProductService']);
Route::post('product_service_create',[ProductServiceController::class,'product_service_create']);
Route::get('product_service_edit/{id}',[ProductServiceController::class,'product_service_edit']);
Route::post('product_service_update',[ProductServiceController::class,'product_service_update']);
Route::get('sl_product_service_type',[ProductServiceController::class,'sl_product_service_type']);

//gl account
Route::get('allglaccount',[Gl_accountController::class,'get_gl_acc']);  
Route::get('all_glaccount',[Gl_accountController::class,'allglaccount']);  
Route::get('expenseGlaccount',[Gl_accountController::class,'expenseGlaccount']);  
// Route::get('child_glaccount/{id}',[GlaccountController::class,'child']);  
Route::get('get_edit_glaccount_data/{id}',[Gl_accountController::class,'gl_account_edit']);  
Route::post('update_glaccount_data',[Gl_accountController::class,'update_gl_account_data']);  
Route::get('sl_glaccount_type',[Gl_accountController::class,'sl_glaccount_type']);  
Route::get('sl_glaccount_category',[Gl_accountController::class,'sl_glaccount_category']);  
Route::post('addglaccount',[Gl_accountController::class,'gl_account_store']);  

//product

Route::get('productAll',[ProductController::class,'productAll']);  
Route::get('all_gl_acc',[ProductController::class,'all_gl_acc']);  
Route::get('productIndex',[ProductController::class,'productIndex']);  
// Route::get('child_glaccount/{id}',[GlaccountController::class,'child']);  
Route::get('get_edit_prod_service_setup_data/{id}',[ProductController::class,'get_edit_prod_service_setup_data']);  
Route::post('update_prod_service_setup_data',[ProductController::class,'update_prod_service_setup_data']);  
// Route::get('sl_glaccount_type',[ProductController::class,'sl_glaccount_type']);  
Route::get('sl_product_category',[SetupController::class,'sl_product_category']);  
Route::post('add_prod_service_setup',[ProductController::class,'add_prod_service_setup']);  
//opening Rule
Route::get('opening_rule/{id}',[ProductRuleController::class,'opening_rule']);  
Route::get('product_rule_update/{field}/{id}',[ProductRuleController::class,'product_rule_update']);  
Route::get('product_closing_rule_update/{field}/{id}',[ProductRuleController::class,'product_closing_rule_update']);  
Route::get('product_deposit_rule_update/{field}/{id}',[ProductRuleController::class,'product_deposit_rule_update']);  
Route::get('product_transaction_rule_update/{field}/{id}',[ProductRuleController::class,'product_transaction_rule_update']);  
Route::get('Product_document_rule_update/{doc_id}/{id}',[ProductRuleController::class,'Product_document_rule_update']);  
Route::get('product_doc_rules/{product_id}',[ProductRuleController::class,'product_doc_rules']);  


Route::get('get_valid_org',[OfficeController::class,'get_valid_org']);
Route::get('sl_int_type',[SetupController::class,'sl_int_type']);

// holiday

Route::get('all_holidays',[HolidayController::class,'index']);
Route::post('holiday_create',[HolidayController::class,'holiday_create']);
Route::get('holiday_edit/{id}',[HolidayController::class,'holiday_edit']);
Route::post('holiday_update',[HolidayController::class,'holiday_update']);
Route::get('sl_holiday_type',[HolidayController::class,'sl_holiday_type']);

// user

// charge

Route::get('all_charges',[ChargeController::class,'index']);
Route::post('charge_create',[ChargeController::class,'charge_create']);
Route::get('charge_edit/{id}',[ChargeController::class,'charge_edit']);
Route::post('charge_update',[ChargeController::class,'charge_update']);

//interest
Route::get('all_interest',[InterestController::class,'index']);
Route::post('interest_create',[InterestController::class,'interest_create']);
Route::get('interest_edit/{id}',[InterestController::class,'interest_edit']);
Route::post('interest_update',[InterestController::class,'interest_update']);
Route::get('sl_interest_type',[InterestController::class,'sl_interest_type']);

//penalty

Route::get('all_penalty',[PenaltyController::class,'index']);
Route::post('penalty_create',[PenaltyController::class,'penalty_create']);
Route::get('penalty_edit/{id}',[PenaltyController::class,'penalty_edit']);
Route::post('penalty_update',[PenaltyController::class,'penalty_update']);
Route::get('sl_penalty_type',[PenaltyController::class,'sl_penalty_type']);

// account open accountCreate

Route::get('allAccount',[AccountOpenController::class,'allAccount']);
Route::get('saving_gl_account',[AccountOpenController::class,'saving_gl_account']);

Route::post('accountCreate',[AccountOpenController::class,'accountCreate']);
Route::get('depositAccount',[DepositController::class,'depositAccount']);
Route::get('calculate-sum-and-max-voucher-number',[DepositController::class,'calculateSumAndMaxVoucherNumber']);



Route::get('sl_acc_status',[SetupController::class,'sl_acc_status']);
Route::get('sl_security_type',[SetupController::class,'sl_security_type']);
Route::get('sl_deposit_period',[SetupController::class,'sl_deposit_period']);
Route::post('cashdepositTransection',[DepositController::class,'cashdepositTransection']);

// cheque Deposit Transaction

Route::get('chq_depositAccount',[ChequeDepositController::class,'chq_depositAccount']);
Route::get('totalAcBalance/{acc_no}',[DepositController::class,'totalAcBalance']);
Route::post('chqdepositTransection',[ChequeDepositController::class,'chqdepositTransection']);
Route::post('chqWithdrawTransection',[ChequeDepositController::class,'chqWithdrawTransection']);
Route::get('totalchqWithAcBalance/{acc_no}',[ChequeDepositController::class,'totalchqWithAcBalance']);


// bank
Route::get('bank-infos', [BankController::class,'index']);
Route::get('bank-infos/{id}/edit', [BankController::class,'edit']);

Route::post('bank-infos-store', [BankController::class,'store']);
Route::post('bank-infos-update', [BankController::class,'update']);

// branch


Route::get('getBankNumbers',[BankController::class,'getBankNumbers']);
Route::get('getBranchNumbers',[BranchInfoController::class,'getBranchNumbers']);

Route::get('branch-infos', [BranchInfoController::class,'index']);
Route::post('branch-infos-store', [BranchInfoController::class,'store']);
Route::get('branch-infos/{id}/edit', [BranchInfoController::class,'edit']);
Route::post('branch-infos-update', [BranchInfoController::class,'update']);

// bank Account


Route::get('bank-account-infos', [BankAccountInfoController::class,'index']);
Route::post('bank-account-infos-store', [BankAccountInfoController::class,'store']);
Route::get('bank-account-infos/{id}/edit', [BankAccountInfoController::class,'edit']);
Route::post('bank-account-infos-update', [BankAccountInfoController::class,'update']);

Route::get('test',[TestController::class,'index']);


// cheque book

Route::get('cheque_book',[ChequeBookController::class,'index']);
Route::post('cheque_book_create',[ChequeBookController::class,'cheque_book_create']);
Route::get('cheque_book_edit/{id}',[ChequeBookController::class,'cheque_book_edit']);
Route::post('cheque_book_update',[ChequeBookController::class,'cheque_book_update']);
Route::get('chq_sl_unique/{chq_prefix}/{begining_sl_no}/{ending_sl_no}', [ChequeBookController::class, 'chq_sl_unique'])->name('habro.chq_sl_unique.set');

//chq leaf

Route::get('cheque_leaf/{id}',[Cheque_leafController::class,'chq_leaf']);
Route::get('chq_leaf_status/{acc_code}',[Cheque_leafController::class,'chq_leaf_status']);

//loan sanction

Route::get('loan-sanction', [LoanController::class,'loan_sanction']);
Route::get('getLoanAccount', [LoanController::class,'getLoanAccount']);
Route::post('loan_sanction_store', [LoanController::class,'loan_sanction_store']);
Route::post('loan_sanction_update', [LoanController::class,'loan_sanction_update']);
Route::get('loan-sanction/{id}/edit', [LoanController::class,'edit']);
Route::get('account_interest_cal/{acc_no}/int', [LoanController::class,'account_interest_cal']);
Route::get('loanAccount', [LoanController::class,'loanAccount']);

// disbursed schedule 

Route::post('disburse_store', [LoanController::class,'disburse_store']);
Route::post('disburse_update', [LoanController::class,'disburse_update']);
Route::get('all_disbursement_schedule', [LoanController::class,'all_disbursement_schedule']);
Route::get('disburse/{id}/edit', [LoanController::class,'disburse_edit']);
Route::get('/loanSanctionDetails', [LoanController::class, 'loanSanctionDetails']);
Route::get('/disbursementSchedules', [LoanController::class, 'getDisbursementSchedules']);
Route::get('/loanReceiveDetails', [LoanController::class, 'loanReceiveDetails']);

// disbursed
Route::post('disburse_tranjection_store', [LoanController::class,'disburse_tranjection_store']);




// permission all_module

Route::get('all_module', [PermissionController::class,'all_module']);
Route::get('permissions', [PermissionController::class,'permissions']);
Route::post('permission_store', [PermissionController::class,'permission_store']);
// Module

Route::post('module_store', [PermissionController::class,'module_store']);


});



Route::group(['middleware' => ['jwt.verify','customar']], function() {
// Route::get('role', [RoleController::class, 'index']);
   
});




// api login end



// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
