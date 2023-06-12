<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_acc_category;
use Illuminate\Support\Str;

class Sl_AccCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_acc_category::updateOrCreate([
            'category_code' => 1,
            'office_id' => 2,
            'title' => 'Assets',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_category::updateOrCreate([
            'category_code' => 2,
            'office_id' => 2,
            'title' => 'Liabilities',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_category::updateOrCreate([
            'category_code' => 3,
            'office_id' => 2,
            'title' => 'Income',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_acc_category::updateOrCreate([
            'category_code' => 4,
            'office_id' => 2,
            'title' => 'Expenses',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
        Sl_acc_category::updateOrCreate([
            'category_code' => 5,
            'office_id' => 2,
            'title' => 'Equity',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
    }
}
