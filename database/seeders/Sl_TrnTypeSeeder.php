<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_trn_type;
class Sl_TrnTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_trn_type::updateOrCreate([
            'office_id'=>1,
            'trn_type_code'=>1,
            'title' => 'Cash Receive',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>2,
            'title' => 'Cash Payment',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>3,
            'title' => 'Chq Receive',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>4,
            'title' => 'Cheque Payment',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>5,
            'title' => 'Purchase',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>6,
            'title' => 'Purchase Return',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>7,
            'title' => 'Sales',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>8,
            'title' => 'Sales Return',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>9,
            'title' => 'Bill Issue',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>10,
            'title' => 'Bill Receive',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>11,
            'title' => 'Fund Receive',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
       
        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>12,
            'title' => 'Fund Return',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_type::updateOrCreate([
            'office_id'=>2,
            'trn_type_code'=>13,
            'title' => 'Advice Issue',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}