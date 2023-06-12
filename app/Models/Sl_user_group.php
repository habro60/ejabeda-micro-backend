<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sl_user_group extends Model
{
    use HasFactory;

    // public function role()
    // {
    //     return $this->belongsTo(Role::class);
    // }
    public function sl_role_type()
    {
        return $this->belongsToMany(Sl_role_type::class,'id','sl_user_group_id');
    }
    // public function hasPermission($permission): bool
    // {
    //     return $this->role->permissions()->where('slug', $permission)->first() ? true : false;
    // }
}
