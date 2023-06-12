<?php

namespace App\Http\Controllers\Api\gl_acc_code;

use App\Http\Controllers\Controller;
use App\Models\Gl_acc_code;
use App\Models\Office_info;
use App\Models\Sl_acc_category;
use App\Models\Sl_acc_type;
use App\Repository\gl_account\gl_accountRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;


class Gl_accountController extends Controller
{
    protected $gl_account;
    public function __construct(gl_accountRepository $gl_account)
    {
         $this->gl_account=$gl_account;
    }

    public function allglaccount()
    {
        $allglaccount = Gl_acc_code::get();
        return response()->json($allglaccount);
    }
    public function expenseGlaccount()
    {

        $expenseGlaccount=  DB::table('gl_acc_codes')
        ->join('sl_acc_categories', 'gl_acc_codes.category_id', '=', 'sl_acc_categories.id')
        ->select('gl_acc_codes.*')
        ->where('gl_acc_codes.postable_acc','Y')
        ->where('sl_acc_categories.category_code', 4)
        ->orwhere('sl_acc_categories.category_code', 3)
        ->get();

        //$expenseGlaccount = Gl_acc_code::where('acc_code','=',4)->get();
        return response()->json($expenseGlaccount);
    }

    public function get_gl_acc()
    {

        //  return $all_gl_account = $this->gl_account->get_all_data();

          $glaccounts = Gl_acc_code::with('childs')->with('sl_account_type')->where('parent_id', '0')->get();

        $data = [];

        foreach ($glaccounts as $glaccount) {

            
            $data[] = [
                'id' => $glaccount->id,
                'parent_id' => $glaccount->parent_id,
                'acc_head' => $glaccount->acc_head,
                'sl_account_type' => $glaccount->sl_account_type->title,
                'sl_account_cayegory' => $glaccount->sl_account_category->title,
                'childs' => $this->getChildren($glaccount)
            ];
        }

        return response()->json($data);

      
    }


    public function getChildren($glaccount)
    {
        $children = [];

        foreach ($glaccount->childs as $child) {
            $children[] = [
                'id' => $child->id,
                'parent_id' => $child->parent_id,
                'acc_head' => $child->acc_head,
                'sl_account_type' => $child->sl_account_type->title,
                'sl_account_cayegory' => $child->sl_account_category->title,
                 'childs' => $this->getChildren($child)
            ];
        }

        return $children;
    }

    public function gl_account_store(Request $request)
    {

        //  return $request;
        // $validator = Validator::make($request, [
        //     'office_id' => 'required',
        //     'category_id' => 'required',
        //     'acc_type_id' => 'required',
        //     'parent_id' => 'required',
        //     'acc_head' => 'required',
        //     'postable_acc' => 'required',
        //     'subsidiary_group_code' => 'required',
        //     'contra_acc_code' => 'required',
        //     'remarks' => 'required',
        // ]);
        // return $request;
        // //Send failed response if request is not valid
        // if ($validator->fails()) {
        //     return response()->json(['error' => $validator->messages()], 200);
        // }

        $parent_id = empty($request->parent_id) ? 0 : $request->parent_id;


      $office = Office_info::where('office_number',Auth::user()->office_number)->first();

      $office_id = $office->id;

      $status_date = date('Y-m-d');

        try {

            $office_create = Gl_acc_code::create([
                'office_id' => $office_id,
                'category_id' => $request->category_id,
                'acc_type_id' => $request->acc_type_id,
                'parent_id' => $parent_id,
                'acc_head' => $request->acc_head,
                'postable_acc' => $request->postable_acc,
                'subsidiary_group_code' => $request->subsidiary_group_code,
                'rep_glcode' => $request->rep_glcode,
                'is_ho_acc' => $request->is_ho_acc,
                'contra_acc_code' => $request->contra_acc_code,
                'remarks' => $request->remarks,
                'status' => $request->status,
                'status_date' => $status_date,
                'create_by' => $request->create_by,
                

            ]);

            // $office_create = Office_info::create($input);
            return response()->json([
                'success' => true,
                'message' => 'Gl Account Create Succeassfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something Went To wrong'
            ]);
        }
    }

    public function gl_account_edit($id)
    {

            // $gl_acc_category=$this->sl_gl_account_category();
            // $gl_acc_type=$this->sl_gl_account_type();
           
            $gl_account=Gl_acc_code::find($id);

            return response()->json([
                'success'=>true,
                'message' =>'successfully Found Data',
                'gl_account' =>$gl_account
            ]);
        
    }

    public function sl_glaccount_category()
    {
        $gl_acc_category=Sl_acc_category::get();
        // $gl_acc_category=$this->sl_gl_account_category();

        return response()->json([
            'success'=>true,
            'message' =>'successfully Found Data',
            'gl_acc_category' =>$gl_acc_category,
            
        ]);
    }

    public function sl_glaccount_type()
    {
        //return 'ok';
        // $gl_acc_type=$this->sl_gl_account_type();

        

        $gl_acc_type= Sl_acc_type::get();

        return response()->json([
            'success'=>true,
            'message' =>'successfully Found Data',
            'gl_acc_type' =>$gl_acc_type,
            
        ]);
    }

    public function update_gl_account_data(Request $request)
    {
       $this->validate($request, [
          'category_id' => 'required',
          'acc_type_id' => 'required',
        //   'parent_id' => 'required',
          'acc_head' => 'required',
       ]);


       
      $gl_account =  Gl_acc_code::where('id',$request->id)->first();

      if($gl_account->parent_id == '0'){
        $parent_id = 0;
      }else{
        $parent_id = $request->parent_id;
      }
      

      
 
       try {
 
        Gl_acc_code::whereId($request->id)->update([
            'category_id' => $request->category_id,
            'acc_type_id' => $request->acc_type_id,
            'parent_id' => $parent_id,
            'acc_head' => $request->acc_head,
            'postable_acc' => $request->postable_acc,
            'subsidiary_group_code' => $request->subsidiary_group_code,
            'rep_glcode' => $request->rep_glcode,
            'contra_acc_code' => $request->contra_acc_code,
            'remarks' => $request->remarks,
            // 'status' => $request->status,
            // 'status_date' => $request->status_date,
            'modifide_by' => $request->modifide_by,
             'id' => $request->id
          ]);
 
          // $office_create = Office_info::create($input);
          return response()->json([
             'success' => true,
             'message' => 'Gl Account Edit Info Update Succeassfully'
          ]);
       } catch (\Throwable $th) {
          return response()->json([
             'success' => false,
             'message' => 'Something Went To wrong'
          ]);
       }
    }
}
