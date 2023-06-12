<?php

namespace Database\Seeders;

use App\Models\sl_charge_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sl_ChargeTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        sl_charge_type::updateOrCreate([
            'office_id' => 2,
            'titles' => 'Service Charge',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        sl_charge_type::updateOrCreate([
            'office_id' => 2,
            'titles' => 'Incidantel Charge',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        sl_charge_type::updateOrCreate([
            'office_id' => 2,
            'titles' => 'Excise Duty Charge',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        sl_charge_type::updateOrCreate([
            'office_id' => 2,
            'titles' => 'Maintains Charge',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        sl_charge_type::updateOrCreate([
            'office_id' => 2,
            'titles' => 'Gas Bill',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        
        sl_charge_type::updateOrCreate([
            'office_id' => 2,
            'titles' => 'Elictric Bill',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
