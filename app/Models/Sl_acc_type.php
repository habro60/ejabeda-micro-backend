<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Sl_acc_type extends Model
{
    use HasFactory,HasUuids;

    public function gl_acc_code()
    {
        return $this->hasMany(Gl_acc_code::class,'id','acc_type_id');
    }
}
