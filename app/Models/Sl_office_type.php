<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Sl_office_type extends Model
{
    use HasFactory,HasUuids;

    public function office()
    {
        return $this->hasMany(Office_info::class,'id','office_type_id');
    }
}
