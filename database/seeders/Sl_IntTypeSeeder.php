<?php

namespace Database\Seeders;

use App\Models\Sl_int_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sl_IntTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_int_type::updateOrCreate([
            'office_id' => 2,
            'sl_int_type_code' => 1,
            'titles' => 'Deposit Interest',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_int_type::updateOrCreate([
            'office_id' => 2,
            'sl_int_type_code' => 2,
            'titles' => 'Loan Interest',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_int_type::updateOrCreate([
            'office_id' => 2,
            'sl_int_type_code' => 3,
            'titles' => 'Overdue Interest',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
