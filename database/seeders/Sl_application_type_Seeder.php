<?php

namespace Database\Seeders;

use App\Models\Sl_application_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Sl_application_type_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_application_type::updateOrCreate([
            'uuid' => 'acc_1', 
            'title' => 'Accounting Management System', 
            'created_by' =>'1',
            'updated_by' =>'1',
        ]);

        Sl_application_type::updateOrCreate([
            'uuid' => 'micro_1', 
            'title' => 'Microcredit Management System', 
            'created_by' =>'1',
            'updated_by' =>'1',
        ]);

        Sl_application_type::updateOrCreate([
            'uuid' => 'apprt_1', 
            'title' => 'Appertment Management System', 
            'created_by' =>'1',
            'updated_by' =>'1',
        ]);

        Sl_application_type::updateOrCreate([
            'uuid' => 'summit_1', 
            'title' => 'Somiti  Management System', 
            'created_by' =>'1',
            'updated_by' =>'1',
        ]);

        Sl_application_type::updateOrCreate([
            'uuid' => 'edu_1', 
            'title' => 'Education  Management System', 
            'created_by' =>'1',
            'updated_by' =>'1',
        ]);

        Sl_application_type::updateOrCreate([
            'uuid' => 'hr_1', 
            'title' => 'HR  Management System', 
            'created_by' =>'1',
            'updated_by' =>'1',
        ]);
    }
}
