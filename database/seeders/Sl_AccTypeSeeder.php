<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_Acc_type;

class Sl_AccTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_acc_type::updateOrCreate([
            'acc_type_code' => 1,
            'office_id' => 2,
            'title' => 'Cash',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_type::updateOrCreate([
            'acc_type_code' => 2,
            'office_id' => 2,
            'title' => 'Bank',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_type::updateOrCreate([
            'acc_type_code' => 3,
            'office_id' => 2,
            'title' => 'Payable',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_type::updateOrCreate([
            'acc_type_code' => 4,
            'office_id' => 2,
            'title' => 'Receivable',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_acc_type::updateOrCreate([
            'acc_type_code' => 5,
            'office_id' => 2,
            'title' => 'Nominal',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_type::updateOrCreate([
        'acc_type_code' => 6,
            'office_id' => 2,
            'title' => 'Real',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_type::updateOrCreate([
               'acc_type_code' => 7,
                'office_id' => 2,
                'title' => 'Subsidary A/c',
                'application_type' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ]);
    }
}
