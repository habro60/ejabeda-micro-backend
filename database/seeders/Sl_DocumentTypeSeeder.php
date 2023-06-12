<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Sl_document_type;
class Sl_DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sl_document_type::updateOrCreate([
            'doc_type_code'=>1,
            'title' => 'NID',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_document_type::updateOrCreate([
            'doc_type_code'=>2,
            'title' => 'Passport',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_document_type::updateOrCreate([
            'doc_type_code'=>3,
            'title' => 'Birth Certificate',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);

        Sl_document_type::updateOrCreate([
            'doc_type_code'=>4,
            'title' => 'TIN',
            'application_type' => 1,
            'created_by' => 1,
            'updated_by' => 1
        ]);
       
    }
}