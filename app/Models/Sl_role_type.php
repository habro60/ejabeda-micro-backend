<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Sl_role_type extends Model
{
    use HasFactory;

    public function sl_user_group()
    {
        return $this->belongsToMany(Sl_user_group::class,'sl_user_group_id','id');
    }   
    public function users()
    {
        return $this->hasMany(User::class,'id','sl_role_type_id');
    }

    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }
}
