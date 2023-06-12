<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use  App\Models\sl_int_cal_method;

class Sl_IntCalMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sl_int_cal_method::updateOrCreate([
            'int_cal_method_code' => 1,
            'office_id' => 2,
            'title' => 'Simple',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        sl_int_cal_method::updateOrCreate([
            'int_cal_method_code' => 2,
            'office_id' => 2,
            'title' => 'Compound',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        sl_int_cal_method::updateOrCreate([
            'int_cal_method_code' => 3,
            'office_id' => 2,
            'title' => 'EMI',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        
    }
}