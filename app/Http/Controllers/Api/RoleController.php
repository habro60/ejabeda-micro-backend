<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\module;
use App\Models\Role;
use App\Repository\Role\roleRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class RoleController extends Controller
{
    protected $role;

    public function __construct(roleRepository $role)
    {
        $this->role = $role;
    }
      public function index()
      {
         return $roles=$this->role->getAllData();
      }

      public function menu($name)
      {
         $menu=$this->role->all_menu($name);
         $user_permision=Auth::user()->role->permissions;
        // $modules = Module::withPermissionsAndUrls();
         return response()->json([
            'success' => true,
            'menu' => $menu,
            'user_permission' => $user_permision
            // 'modules' => $modules
        ]);

        
      }

     
    

    
    // public function index()
    // {
    //     Gate::authorize('app.roles.index');
    //     $roles = Role::getAllRoles();
    //     return view('backend.roles.index',compact('roles'));
    // }

  
    public function create()
    {
        // Gate::authorize('app.roles.create');
        $modules =$this->role->roleCreate();
        return response()->json([
            'success' => true,
            'module' => $modules
        ]);
       
    }

    public function store(Request $request)
    {
        Role::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ])->permissions()->sync($request->input('permissions', []));
   
        return response()->json([
            'success' => true,
            
        ]);
    }

  
    public function edit(Role $role)
    {
       
        $modules = module::all();
        return view('backend.roles.form',compact('role','modules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateRoleRequest $request
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
  }
