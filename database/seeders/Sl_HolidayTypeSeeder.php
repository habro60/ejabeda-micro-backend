<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_holiday_type;
class Sl_HolidayTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_holiday_type::updateOrCreate([
            'holiday_type_code'=>1,
            'office_id' => 2,
            'title' => 'Weekly Holiday',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_holiday_type::updateOrCreate([
            'holiday_type_code'=>2,
            'office_id' => 2,
            'title' => 'National Holiday',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_holiday_type::updateOrCreate([
            'holiday_type_code'=>3,
            'office_id' => 2,
            'title' => 'Fastival Holiday',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_holiday_type::updateOrCreate([
            'holiday_type_code'=>4,
            'office_id' => 2,
            'title' => 'Others Holiday',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
       
    }
}