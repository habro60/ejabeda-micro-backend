<?php

namespace App\Http\Controllers\Api\product;

use App\Http\Controllers\Controller;
use App\Models\Gl_acc_code;
use App\Models\Office_info;
use App\Models\Prod_service_setup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{

   public function productAll()
   {
      $Prod_service_setup = Prod_service_setup::get();
      return response()->json($Prod_service_setup);
   }
   public function all_gl_acc()
   {
      $all_gl_acc = Gl_acc_code::get();
      return response()->json($all_gl_acc);
   }

   public function productIndex()
   {

      $product_ser_setups = Prod_service_setup::with('childs')->with('sl_product_category')->where('parent_id', '0')->get();

      $data = [];

      foreach ($product_ser_setups as $product_ser_setup) {
         $data[] = [
            'id' => $product_ser_setup->id,
            'parent_id' => $product_ser_setup->parent_id,
            'product_name' => $product_ser_setup->product_name,
            'product_category' => $product_ser_setup->sl_product_category->title,
            'all_gl_acc' => $product_ser_setup->all_gl_acc->acc_head,
            'childs' => $this->getChildren($product_ser_setup)
         ];
      }

      return response()->json($data);
   }


   public function getChildren($product_ser_setup)
   {
      $children = [];

      foreach ($product_ser_setup->childs as $child) {
         $children[] = [
            'id' => $child->id,
            'parent_id' => $child->parent_id,
            'product_name' => $child->product_name,
            'product_category' => $child->sl_product_category->title,
            'childs' => $this->getChildren($child)
         ];
      }

      return $children;
   }


   public function add_prod_service_setup(Request $request)
   {

     // return $request;

      $this->validate($request, [
         'product_name' => 'required',
      ]);
      $parent_id = empty($request->parent_id) ? 0 : $request->parent_id;
      $office = Office_info::where('office_number', Auth::user()->office_number)->first();
      $office_id = $office->id;

      

      try {

         $prod_service_setup = Prod_service_setup::create([
            'office_id' => $office_id,
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,
            'gl_acc_id' => $request->gl_acc_id,
            'parent_id' => $parent_id,
            'created_by' => $request->created_by

         ]);



         // $office_create = Office_info::create($input);
         return response()->json([
            'success' => true,
            'message' => 'product Service Setup Create Succeassfully'
         ]);
      } catch (\Throwable $th) {
         return response()->json([
            'success' => false,
            'message' => 'Somethings Went To wrong'
         ]);
      }






      // return back();
   }


   public function get_edit_prod_service_setup_data($id)
   {
      //return $id;
      //return $office_edit_info = Office_info::find($id);
      try {
         $prod_service_setup_edit_info = Prod_service_setup::find($id);
         return response()->json([
            'success' => true,
            'product_edit_info' => $prod_service_setup_edit_info
         ]);
      } catch (\Throwable $th) {
         return response()->json([
            'success' => false,
            'message' => 'Something went to wrong'
         ]);
      }
   }


   public function update_prod_service_setup_data(Request $request)
   {
      $this->validate($request, [
         'product_category' => 'required',
         'product_name' => 'required',
      ]);


      try {

         Prod_service_setup::whereId($request->id)->update([
            'product_name' => $request->product_name,
            'product_category' => $request->product_category,
            'gl_acc_id' => $request->gl_acc_id,
            'parent_id' => $request->parent_id,
            'updated_by' => $request->updated_by,
            'id' => $request->id
         ]);

         // $office_create = Office_info::create($input);
         return response()->json([
            'success' => true,
            'message' => 'product Service Setup Edit Info Update Succeassfully'
         ]);
      } catch (\Throwable $th) {
         return response()->json([
            'success' => false,
            'message' => 'Something Went To wrong'
         ]);
      }
   }
}
