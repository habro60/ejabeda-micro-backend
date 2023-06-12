<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_penalty_type;
class Sl_PenaltyTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_penalty_type::updateOrCreate([
            'office_id' => 2,
            'penalty_type_code'=> 1,
            'title' => 'Due Interest',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    
        Sl_penalty_type::updateOrCreate([
            'office_id' => 2,
            'penalty_type_code'=> 2,
            'title' => 'Due Deposit',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    
        Sl_penalty_type::updateOrCreate([
            'office_id' => 2,
            'penalty_type_code'=> 3,
            'title' => 'Due Charges/Bill',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    
        Sl_penalty_type::updateOrCreate([
            'office_id' => 2,
            'penalty_type_code'=> 4,
            'title' => 'Dealy Payment',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
    }
    
