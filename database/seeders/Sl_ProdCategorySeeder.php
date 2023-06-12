<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_product_category;

class Sl_ProdCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_product_category::updateOrCreate([
            'prod_category_code'=>1,
            'title' => 'Deposit A/C',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_product_category::updateOrCreate([
            'prod_category_code'=>2,
            'title' => 'Recuring Deposit A/C',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_product_category::updateOrCreate([
            'prod_category_code'=>3,
            'title' => 'Loan A/C',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_product_category::updateOrCreate([
            'prod_category_code'=>4,
            'title' => 'Bill Collection',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_product_category::updateOrCreate([
            'prod_category_code'=>5,
            'title' => 'Fund Collection',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_product_category::updateOrCreate([
            'prod_category_code'=>6,
            'title' => 'Chanda  Collection',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
       
    }
}