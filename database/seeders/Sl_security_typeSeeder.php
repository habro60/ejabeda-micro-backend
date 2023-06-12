<?php

namespace Database\Seeders;

use App\Models\Sl_security_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sl_security_typeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_security_type::updateOrCreate([
            'office_id' => 2,
            'security_type_code' =>1,
            'titles' => 'Land Security',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_security_type::updateOrCreate([
            'office_id' => 2,
            'security_type_code' =>2,
            'titles' => 'Job Security',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_security_type::updateOrCreate([
            'office_id' => 2,
            'security_type_code' =>3,
            'titles' => 'Desposit Account',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
