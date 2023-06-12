<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_acc_status;
class Sl_AccStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_acc_status::updateOrCreate([
            'acc_status_code'=>1,
            'office_id' => 2,
            'title' => 'Active',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_status::updateOrCreate([
            'acc_status_code'=>2,
            'office_id' => 2,
            'title' => 'Inactive',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_status::updateOrCreate([
            'acc_status_code'=>3,
            'office_id' => 2,
            'title' => 'New',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_status::updateOrCreate([
            'acc_status_code'=>4,
            'office_id' => 2,
            'title' => 'Close',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_acc_status::updateOrCreate([
            'acc_status_code'=>5,
            'office_id' => 2,
            'title' => 'Inoperative',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_acc_status::updateOrCreate([
            'acc_status_code'=>6,
            'office_id' => 2,
            'title' => 'Matured',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
       
    }
}
