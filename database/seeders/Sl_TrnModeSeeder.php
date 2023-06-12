<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_trn_mode;
class Sl_TrnModeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>1,
            'title' => 'OB',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>2,
            'title' => 'CASR',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>3,
            'title' => 'CHQR',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>4,
            'title' => 'JR',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>5,
            'title' => 'CONT',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>6,
            'title' => 'ADVIC',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>7,
            'title' => 'CASP',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>8,
            'title' => 'CHQP',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>9,
            'title' => 'CASPUR',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>10,
            'title' => 'CHQPUR',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>11,
            'title' => 'CASSELL',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>12,
            'title' => 'CHQSELL',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>13,
            'title' => 'BILLP',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>14,
            'title' => 'BILLR',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>15,
            'title' => 'BILLISSU',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>16,
            'title' => 'FUNDP',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_trn_mode::updateOrCreate([
            'office_id'=>2,
            'trn_mode_code'=>17,
            'title' => 'FUNDR',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);


       
    }
}