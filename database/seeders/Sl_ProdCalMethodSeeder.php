<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_prod_cal_method;
class Sl_ProdCalMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_prod_cal_method::updateOrCreate([
            'prod_cal_method_code' => 1,
            'office_id' => 2,
            'title' => 'Daily',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_prod_cal_method::updateOrCreate([
            'prod_cal_method_code' => 2,
            'office_id' => 2,
            'title' => 'Monthly Average Bal.',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_prod_cal_method::updateOrCreate([
            'prod_cal_method_code' => 3,
            'office_id' => 2,
            'title' => 'Montly Mini. Bal.',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_prod_cal_method::updateOrCreate([
            'prod_cal_method_code' => 4,
            'office_id' => 2,
            'title' => 'Montly Maxi. Bal.',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_prod_cal_method::updateOrCreate([
            'prod_cal_method_code' => 5,
            'office_id' => 2,
            'title' => 'Fixed Deposit Amt.',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        
    }
}
