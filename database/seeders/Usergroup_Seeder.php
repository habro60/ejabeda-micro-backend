<?php

namespace Database\Seeders;

use App\Models\Sl_role_type;
use App\Models\Sl_user_group;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Usergroup_Seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role=Sl_role_type::all();
       
        Sl_user_group::updateOrCreate([       
            'title' => 'Software Eng',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);

        Sl_user_group::updateOrCreate([
            
            'title' => 'Company Employee',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);

        Sl_user_group::updateOrCreate([
            
            'title' => 'Member',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);

        Sl_user_group::updateOrCreate([
            
            'title' => 'Supplier',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);

        Sl_user_group::updateOrCreate([
            
            'title' => 'Customar',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);
        Sl_user_group::updateOrCreate([
            
            'title' => 'Owner',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);

        Sl_user_group::updateOrCreate([
            
            'title' => 'Tanent',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);

        Sl_user_group::updateOrCreate([
            
            'title' => 'Doner',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);

        Sl_user_group::updateOrCreate([
            
            'title' => 'Teacher',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);
        Sl_user_group::updateOrCreate([
            
            'title' => 'Student',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);
        Sl_user_group::updateOrCreate([
            
            'title' => 'Gurdian',
            'updated_by' => '1',
            'created_by' =>'1',
        ]);
    }
}
