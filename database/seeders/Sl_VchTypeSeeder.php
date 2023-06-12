<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_vch_type;

class Sl_VchTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_vch_type::updateOrCreate([
            'office_id'=>2,
            'vch_type_code'=>1,
            'title' => 'Dr.',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_vch_type::updateOrCreate([
            'office_id'=>2,
            'vch_type_code'=>2,
            'title' => 'Cr.',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
  
    }
    }
    