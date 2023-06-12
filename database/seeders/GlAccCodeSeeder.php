<?php

namespace Database\Seeders;

use App\Models\Gl_acc_code;
use App\Models\Sl_acc_category;
use App\Models\Sl_acc_type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GlAccCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $sl_acc_category=Sl_acc_category::where('category_code','=',1)->first();
        $acc_type=Sl_acc_type::where('acc_type_code','=',6)->first();
        Gl_acc_code::updateOrCreate([
            'office_id'=>2,
            'category_id' => $sl_acc_category->id,
            'acc_type_id' => $acc_type->id,
            'parent_id' => 0,
            'acc_head' => 'ASSET',
            'postable_acc' => 'N',
            'subsidiary_group_code' => 'N/A',
            'rep_glcode' => 10000000,
            'is_ho_acc' => 0,
            'contra_acc_code' => 0,
            'remarks' => 'N/A',
            'status' => 1,
            'status_date' => date('Y-m-d'),
            'create_by' => 1,
            'modifide_by' => 1,  
        ]);


        $sl_acc_category=Sl_acc_category::where('category_code','=',2)->first();
        Gl_acc_code::updateOrCreate([
            'office_id'=>2,
            'category_id' => $sl_acc_category->id,
            'acc_type_id' => $acc_type->id,
            'parent_id' => 0,
            'acc_head' => 'LIABILITIE',
            'postable_acc' => 'N',
            'subsidiary_group_code' => 'N/A',
            'rep_glcode' => 20000000,
            'is_ho_acc' => 0,
            'contra_acc_code' => 0,
            'remarks' => 'N/A',
            'status' => 1,
            'status_date' => date('Y-m-d'),
            'create_by' => 1,
            'modifide_by' => 1,  
        ]);


        $sl_acc_category=Sl_acc_category::where('category_code','=',3)->first();
    
        Gl_acc_code::updateOrCreate([
            'office_id'=>2,
            'category_id' => $sl_acc_category->id,
            'acc_type_id' => $acc_type->id,
            'parent_id' => 0,
            'acc_head' => 'INCOME',
            'postable_acc' => 'N',
            'subsidiary_group_code' => 'N/A',
            'rep_glcode' => 30000000,
            'is_ho_acc' => 0,
            'contra_acc_code' => 0,
            'remarks' => 'N/A',
            'status' => 1,
            'status_date' => date('Y-m-d'),
            'create_by' => 1,
            'modifide_by' => 1,  
        ]);

        $sl_acc_category=Sl_acc_category::where('category_code','=',4)->first();
        Gl_acc_code::updateOrCreate([
            'office_id'=>2,
            'category_id' => $sl_acc_category->id,
            'acc_type_id' => $acc_type->id,
            'parent_id' => 0,
            'acc_head' => 'EXPENSE',
            'postable_acc' => 'N',
            'subsidiary_group_code' => 'N/A',
            'rep_glcode' => 40000000,
            'is_ho_acc' => 0,
            'contra_acc_code' => 0,
            'remarks' => 'N/A',
            'status' => 1,
            'status_date' => date('Y-m-d'),
            'create_by' => 1,
            'modifide_by' => 1,  
        ]);

    }
}
