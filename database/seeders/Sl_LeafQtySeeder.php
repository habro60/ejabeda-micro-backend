<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_leaf_quantity;
class Sl_LeafQtySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
      Sl_leaf_quantity::updateOrCreate([
        'office_id' => 2,
        'leaf_type_code'=> 10,
        'title' => '10 page',
        'application_type' => 1,
        'created_by' => 1,
        'updated_by' => 1
    ]);

    Sl_leaf_quantity::updateOrCreate([
        'office_id' => 2,
        'leaf_type_code'=> 20,
        'title' => '20 pages',
        'application_type' => 1,
        'created_by' => 1,
        'updated_by' => 1
    ]);

    Sl_leaf_quantity::updateOrCreate([
        'office_id' => 2,
        'leaf_type_code'=> 50,
        'title' => '50 pages',
        'application_type' => 1,
        'created_by' => 1,
        'updated_by' => 1
    ]);

    Sl_leaf_quantity::updateOrCreate([
        'office_id' => 2,
        'leaf_type_code'=> 100,
        'title' => '10 Pages',
        'application_type' => 1,
        'created_by' => 1,
        'updated_by' => 1
    ]);
}
}
