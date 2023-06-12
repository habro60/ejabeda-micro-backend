<?php

namespace Database\Seeders;

use App\Models\Sl_penalty_pay_method;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sl_PenaltyPayMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_penalty_pay_method::updateOrCreate([
            'penalty_pay_method_code'=>1,
            'office_id' => 2,
            'title' => 'Fixed Amount',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_penalty_pay_method::updateOrCreate([
            'penalty_pay_method_code'=>2,
            'office_id' => 2,
            'title' => 'Variable Amount',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_penalty_pay_method::updateOrCreate([
            'penalty_pay_method_code'=>3,
            'office_id' => 2,
            'title' => '% on Base Amount',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
