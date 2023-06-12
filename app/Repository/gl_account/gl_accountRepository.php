<?php
namespace App\Repository\gl_account;

use App\Models\Gl_acc_code;
use App\Models\Sl_acc_category;
use App\Models\Sl_acc_type;

class gl_accountRepository implements gl_accountInterface{


    public function get_all_data()
    {
        
        $glaccounts = Gl_acc_code::with('childs')->where('parent_id', '0')->get();

        $data = [];

        foreach ($glaccounts as $glaccount) {
            $data[] = [
                'id' => $glaccount->id,
                'parent_id' => $glaccount->parent_id,
                'acc_head' => $glaccount->acc_head,
                'sl_account_type' => $glaccount->sl_account_type->title,
                'sl_account_cayegory' => $glaccount->sl_account_cayegory->title,
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
                'sl_account_type' => $glaccount->sl_account_type->title,
                'sl_account_cayegory' => $glaccount->sl_account_cayegory->title,
                 'childs' => $this->getChildren($child)
            ];
        }

        return $children;
    }


    public function accountStoreOrUpdate($id = null, $data)
    {
        

    }


    public function accountdelete($id)
    {
        
    }


    public function sl_gl_account_category(){

        return $account_category = Sl_acc_category::get();
        // try {
        //     $account_category = Sl_acc_category::get();
        //     return response()->json([
        //        'success' => true,
        //        'message' => 'Successfully Get Account Category Data',
        //        'account_category' => $account_category
        //     ]);
        //  } catch (\Throwable $th) {
        //     return response()->json([
        //        'success' => false,
        //        'message' => 'Something went to wrong'
        //     ]);
        //  }

    }
    public function sl_gl_account_type(){


        return Sl_acc_type::get();


        // try {
        //     $account_category = Sl_acc_category::get();
        //     return response()->json([
        //        'success' => true,
        //        'message' => 'Successfully Get Account Category Data',
        //        'account_category' => $account_category
        //     ]);
        //  } catch (\Throwable $th) {
        //     return response()->json([
        //        'success' => false,
        //        'message' => 'Something went to wrong'
        //     ]);
        //  }

    }
}