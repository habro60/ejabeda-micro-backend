<?php

namespace App\Http\Controllers\Api\permission;

use App\Http\Controllers\Controller;
use App\Models\module;
use App\Models\permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function all_module()
    {
       $all_module = module::get();

       return response()->json($all_module);
    }

    public function permissions()
    {
        $permissions = Permission::with('module')->get();

        return response()->json(['data' => $permissions]);
    }

        public function permission_store(Request $request)
        {
            $input = $request->all();

            $permission=permission::create($input);

            //return response()->json($input);  
            return response()->json($permission, 201);

        }


        public function module_store(Request $request)
        {
            $input = $request->all();
    
            $module=module::create($input);
    
            //return response()->json($input);  
            return response()->json($module, 201);
    
        }   
}
