<?php

namespace Database\Seeders;

use App\Models\Module;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        $moduleAppDashboard = Module::updateOrCreate(['name' => 'Super Admin Dashboard']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDashboard->id,
            'name' => 'Access Dashboard',
            'slug' => 'habro.dashboard',
        ]);
        // Setup
        $moduleAppSetup = Module::updateOrCreate(['name' => 'Setup']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Access Setup',
            'slug' => 'habro.setup',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Office View',
            'slug' => 'habro.office.view',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Office Create',
            'slug' => 'habro.office.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Office Edit',
            'slug' => 'habro.office.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Office Delete',
            'slug' => 'habro.office.delete',
        ]);

        // Product
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Product & Services View',
            'slug' => 'habro.Product&Services.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Product & Services Create',
            'slug' => 'habro.product&services.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Product & Services Edit',
            'slug' => 'habro.product&services.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'Product & Services Delete',
            'slug' => 'habro.product&Services.delete',
        ]);

        //GL Account setup
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'GL Account View',
            'slug' => 'habro.glaccount.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'GL Account Create',
            'slug' => 'habro.glaccount.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'GL Account Edit',
            'slug' => 'habro.glaccount.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'GL Account Delete',
            'slug' => 'habro.glaccount.delete',
        ]);

        //Genarel Account setup

        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'GL Account View',
            'slug' => 'habro.glaccount.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'GL Account Create',
            'slug' => 'habro.glaccount.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'GL Account Edit',
            'slug' => 'habro.glaccount.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppSetup->id,
            'name' => 'GL Account Delete',
            'slug' => 'habro.glaccount.delete',
        ]);
        //House keeping
        $moduleAppHousekepping = Module::updateOrCreate(['name' => 'House Keeping']);

        Permission::updateOrCreate([
            'module_id' => $moduleAppHousekepping->id,
            'name' => 'Data Backup',
            'slug' => 'habro.databackup',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppHousekepping->id,
            'name' => 'Data Cleaning',
            'slug' => 'habro.dataclean.delete',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppHousekepping->id,
            'name' => 'Back Process Run',
            'slug' => 'habro.backprocessrun',
        ]);
        //int and charge setup
        $moduleAppInt_charg_manage = Module::updateOrCreate(['name' => 'Interest And Charge Management']);

        //interest  setup

        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Interest Setup View',
            'slug' => 'habro.interest.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Interest Setup Create',
            'slug' => 'habro.interest.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Interest Setup Edit',
            'slug' => 'habro.interest.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Interest Setup Delete',
            'slug' => 'habro.interest.delete',
        ]);


        //Charge  setup

        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Charge View',
            'slug' => 'habro.charge.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Charge Create',
            'slug' => 'habro.charge.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Charge Edit',
            'slug' => 'habro.charge.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Charge Delete',
            'slug' => 'habro.charge.delete',
        ]);

        //Penalty  setup

        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Penalty View',
            'slug' => 'habro.penalty.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Penalty Create',
            'slug' => 'habro.penalty.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Penalty Edit',
            'slug' => 'habro.penalty.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppInt_charg_manage->id,
            'name' => 'Penalty Delete',
            'slug' => 'habro.penalty.delete',
        ]);

        //Organization Setup

        $moduleAppOrganization = Module::updateOrCreate(['name' => 'Organization']);


        //organization Active
        Permission::updateOrCreate([
            'module_id' => $moduleAppOrganization->id,
            'name' => 'Organization Active View',
            'slug' => 'habro.orgactive.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppOrganization->id,
            'name' => 'Organization Active edit',
            'slug' => 'habro.orgactive.edit',
        ]);

        //organization Close
        Permission::updateOrCreate([
            'module_id' => $moduleAppOrganization->id,
            'name' => 'Organization Close view',
            'slug' => 'habro.orgclose.view',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppOrganization->id,
            'name' => 'Organization Close edit',
            'slug' => 'habro.orgclose.edit',
        ]);

        //Bill Receive

        Permission::updateOrCreate([
            'module_id' => $moduleAppOrganization->id,
            'name' => 'Bill Receive View',
            'slug' => 'habro.billrecive.view',
        ]);
        //Bill Due View

        Permission::updateOrCreate([
            'module_id' => $moduleAppOrganization->id,
            'name' => 'Bill Due View',
            'slug' => 'habro.billdue.view',
        ]);

        //User Setup

        $moduleAppUser = Module::updateOrCreate(['name' => 'User Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'User view',
            'slug' => 'habro.user.view',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'User Create',
            'slug' => 'habro.user.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'User Edit',
            'slug' => 'habro.user.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'User Active',
            'slug' => 'habro.user.active',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'User Inactive',
            'slug' => 'habro.user.inactive',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'User Transfer',
            'slug' => 'habro.user.transfer',
        ]);

         //Organization Setup

         $moduleAppHoliday = Module::updateOrCreate(['name' => 'Holiday']);

        //holiday  setup

        Permission::updateOrCreate([
            'module_id' => $moduleAppHoliday->id,
            'name' => 'holiday Setup View',
            'slug' => 'habro.holiday.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppHoliday->id,
            'name' => 'holiday Create',
            'slug' => 'habro.holiday.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHoliday->id,
            'name' => 'holiday Edit',
            'slug' => 'habro.holiday.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHoliday->id,
            'name' => 'holiday Delete',
            'slug' => 'habro.holiday.delete',
        ]);



        $moduleAppHoliday = Module::updateOrCreate(['name' => 'Account Maintenance']);

        //holiday  setup

        Permission::updateOrCreate([
            'module_id' => $moduleAppHoliday->id,
            'name' => 'Account Open',
            'slug' => 'habro.accountopen.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleAppHoliday->id,
            'name' => 'Account Close',
            'slug' => 'habro.accountclose.view',
        ]);

        $moduleApptran = Module::updateOrCreate(['name' => 'Transaction']);

        //holiday  setup

        Permission::updateOrCreate([
            'module_id' => $moduleApptran->id,
            'name' => 'Deposit',
            'slug' => 'habro.deposit.view',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleApptran->id,
            'name' => 'Withdrawal',
            'slug' => 'habro.withdrawal.view',
        ]);

         //Bank Manage  setup
        $moduleApptran = Module::updateOrCreate(['name' => 'Bank Manage']);

        Permission::updateOrCreate([
            'module_id' => $moduleApptran->id,
            'name' => 'Bank Manage',
            'slug' => 'bank-info.index',
        ]);

        //Loan Management  setup

        $moduleLoanmanagement = Module::updateOrCreate(['name' => 'Loan Management']);
        Permission::updateOrCreate([
            'module_id' => $moduleLoanmanagement->id,
            'name' => 'Loan Sanction',
            'slug' => 'loan-sanction.index',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleLoanmanagement->id,
            'name' => 'Loan Disbursement Schedule',
            'slug' => 'loan-disbursement-schedule.index',
        ]);

        Permission::updateOrCreate([
            'module_id' => $moduleLoanmanagement->id,
            'name' => 'Loan Repayment Schedule',
            'slug' => 'loan-Repayment-schedule.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleLoanmanagement->id,
            'name' => 'Loan Disbursed',
            'slug' => 'loan-disbursed.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleLoanmanagement->id,
            'name' => 'Loan Receive',
            'slug' => 'loan-receive.index',
        ]);
       
    }
}
