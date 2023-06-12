<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_penalty_cal_method;
class Sl_PenaltyCalMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_penalty_cal_method::updateOrCreate([
            'office_id' => 2,
            'penalty_cal_method_code'=> 1,
            'title' => 'fixed Amount',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    
        Sl_penalty_cal_method::updateOrCreate([
            'office_id' => 2,
            'penalty_cal_method_code'=> 2,
            'title' => 'Veriable Amount',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    
        Sl_penalty_cal_method::updateOrCreate([
            'office_id' => 2,
            'penalty_cal_method_code'=> 3,
            'title' => '% on Base Amount',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}