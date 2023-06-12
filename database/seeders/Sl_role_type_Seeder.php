<?php

namespace Database\Seeders;

use App\Models\permission;
use App\Models\Sl_role_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sl_role_type_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   //super admin 
        // 1.super Admin Dashboard
        // 2.Setup
        // 3.House Keeping
        // 4.Interest And Charge Management
        // 5.Organization
        // 6.User Management
        $super_admin_permissions = permission::all();
        Sl_role_type::updateOrCreate([
            'title' => 'SuperAdmin',
            'slug' => 'superadmin',
            'created_by' => 1,
            'updated_by' => 1
        ])->permissions()
            ->sync($super_admin_permissions->pluck('id'));
        //Control Officer
        // 1.super Admin Dashboard
        // 2.Setup
        // 3.House Keeping
        // 4.Interest And Charge Management
        // 5.Organization
        // 6.User Management
        $control_officer_permissions = permission::where('module_id', 2)->orwhere('module_id', 6)->get();
        Sl_role_type::updateOrCreate([
            'title' => 'HO. Control Officer',
            'slug' => 'hocontrolofficer',
            'created_by' => 1,
            'updated_by' => 1
        ])->permissions()
            ->sync($control_officer_permissions->pluck('id'));
        //company Admintator
        // 1.super Admin Dashboard
        // 2.Setup
        // 3.House Keeping
        // 4.Interest And Charge Management
        // 5.Organization
        // 6.User Management
        $company_admin_permissions = permission::where('module_id', 2)->orwhere('module_id', 4)->orwhere('module_id', 6)->get();
        Sl_role_type::updateOrCreate([
            'title' => 'Company Admin',
            'slug' => 'companyadmin',
            'created_by' => 1,
            'updated_by' => 1
        ])->permissions()
            ->sync($company_admin_permissions->pluck('id'));

             //Branch Admin
        // 1.super Admin Dashboard
        // 2.Setup
        // 3.House Keeping
        // 4.Interest And Charge Management
        // 5.Organization
        // 6.User Management

        $company_admin_permissions = permission::where('module_id', 2)->orwhere('module_id', 4)->orwhere('module_id', 6)->orwhere('module_id', 8)->orwhere('module_id', 9)->get();
        Sl_role_type::updateOrCreate([
            'title' => 'Branch Admin',
            'slug' => 'branchadmin',
            'created_by' => 1,
            'updated_by' => 1
        ])->permissions()
            ->sync($company_admin_permissions->pluck('id'));

        
          //Branch Control Officer
        // 1.super Admin Dashboard
        // 2.Setup
        // 3.House Keeping
        // 4.Interest And Charge Management
        // 5.Organization
        // 6.User Management
        $company_admin_permissions = permission::where('module_id', 2)->orwhere('module_id', 4)->orwhere('module_id', 6)->get();
        Sl_role_type::updateOrCreate([
            'title' => 'Br. Control Officer',
            'slug' => 'brcontrolofficer',
            'created_by' => 1,
            'updated_by' => 1
        ])->permissions()
            ->sync($company_admin_permissions->pluck('id'));


            $member_permissions = permission::where('module_id', 2)->orwhere('module_id', 4)->orwhere('module_id', 6)->get();
            Sl_role_type::updateOrCreate([
                'title' => 'Self Operator',
                'slug' => 'member',
                'created_by' => 1,
                'updated_by' => 1
            ])->permissions()
                ->sync($member_permissions->pluck('id'));
    }
}
