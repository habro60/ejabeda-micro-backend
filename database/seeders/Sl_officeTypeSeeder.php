<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_office_type;


class Sl_officeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_office_type::updateOrCreate([
            'office_type_code' => 1,
            'title' => 'Head Office',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_office_type::updateOrCreate([
            'office_type_code' => 2,
            'title' => 'Divisional Office',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_office_type::updateOrCreate([
            'office_type_code' => 3,
            'title' => 'Branch Office',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_office_type::updateOrCreate([
            'office_type_code' => 4,
            'title' => 'Field Office',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
       
    }
}