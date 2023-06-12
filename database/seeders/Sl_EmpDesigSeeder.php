<?php

namespace Database\Seeders;

use App\Models\Sl_emp_desig;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sl_EmpDesigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>1,
            'title' => 'MD',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>2,
            'title' => 'General Manager',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>3,
            'title' => 'Executive Officer',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>4,
            'title' => 'Branch Manager',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>5,
            'title' => 'Branch Control Officer',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>6,
            'title' => 'Cashier',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>7,
            'title' => 'Operator',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>8,
            'title' => 'Field Superviser',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_emp_desig::updateOrCreate([
            'office_id' => 2,
            'desig_type_code'=>9,
            'title' => 'Field Officer',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
