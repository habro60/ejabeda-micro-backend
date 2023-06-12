<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_int_apply_period;
class Sl_IntApplyPeriodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_int_apply_period::updateOrCreate([
            'int_apply_period_code' => 1,
            'office_id' => 2,
            'title' => 'Weekly',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_int_apply_period::updateOrCreate([
            'int_apply_period_code' => 2,
            'office_id' => 2,
            'title' => 'Monthly',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_int_apply_period::updateOrCreate([
            'int_apply_period_code' => 3,
            'office_id' => 2,
            'title' => 'Quaterly',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_int_apply_period::updateOrCreate([
            'int_apply_period_code' => 4,
            'office_id' => 2,
            'title' => 'Half Yearly',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_int_apply_period::updateOrCreate([
            'int_apply_period_code' => 5,
            'office_id' => 2,
            'title' => 'Yearly',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_int_apply_period::updateOrCreate([
            'int_apply_period_code' => 5,
            'office_id' => 2,
            'title' => 'Depend On Tenure',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

    }
}
