<?php
namespace App\Repository\Role;

use App\Models\module;
use App\Models\Role;
use App\Models\Sl_role_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class roleRepository implements roleInterface{

    protected $role=null;

    public function getAllData(){

        return  $roles = Sl_role_type::getAllRoles();
    }
    public function roleCreate()
    {

      return  $modules = module::getWithPermissions();
        
    }

    public function storeOrUpdate($id = null,$data){
        if(is_null($id)){
           $role= Sl_role_type::create([
                'name' => $data->name,
                'slug' => Str::slug($data->name),
                'created_by' => Auth::user()->id
               
            ])->permissions()->sync($data->input('permissions', []));
            return $role;
        }else{
            $role=Sl_role_type::find($id);
            $role->update([
                'name' => $data->name,
                'slug' => Str::slug($data->name),
                'updated_by' => Auth::user()->id
            ]);
            $role->permissions()->sync($data->input('permissions', []));
        }    }
    public function view($id){
        return  $role=Role::find($id);
    }
    public function delete($id){
        return Role::find($id)->delete();
    }

    
    public function all_menu($name){
         $menu = \App\Models\Menu::where('name',$name)->first();
        return $menu->menuItems()->with('childs')->get();
    }
}