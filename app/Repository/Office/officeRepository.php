<?php
namespace App\Repository\Office;

use App\Models\Office_info;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

class officeRepository implements officeInterface{

    protected $office=null;

    public function getAllData(){

        
        $offices = Office_info::where('parent_id', '=', 0)->get();

        $products = [];
        // $categories = [$this];
        while(count($offices) > 0){
            $nextoffices = [];
            foreach ($offices as $office) {
                $products = array_merge($products, $office->childs->all());
                $nextoffices = array_merge($nextoffices, $office->childs->all());
            }
            $offices = $nextoffices;
        }
        return new Collection($products);
    
    //     $offices = Office_info::where('parent_id', '=', 0)->get();

    //    return $offices->childs->get();

    //     return Office_info::where();
        //  $currentDatabase = DB::connection()->getDatabaseName();
        // return $currentDatabase;
        // return  DB::table('office_infos')->get();

    }
    public function storeOrUpdate($id = null,$data){
        if ($id==null) {
            $office=new Office_info();
            $office->org_number = $data['org_number'];
            $office->office_number = $data['office_number'];
            $office->office_name = $data['office_name'];
            $office->office_name = $data['office_name'];
            $office->geo_divisions_id = $data['geo_divisions_id'];
            $office->geo_districts_id = $data['geo_districts_id'];
            $office->geo_upazilas_id = $data['geo_upazilas_id'];
            $office->address = $data['address'];
            $office->contact_no = $data['contact_no'];
            $office->email = $data['email'];
            $office->office_type_id = $data['office_type_id'];
            $office->parent_id = $data['parent_id'];
            $office->status_date = $data['status_date'];
            $office->validity_period = $data['validity_period'];
            $office->expiry_date = $data['expiry_date'];
            $office->status = $data['status'];
            $office->save();

        }else{

        }

    }
    public function view($id){

    }
    public function delete($id){

    }

}