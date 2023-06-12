<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Sl_application_type extends Model
{
    use HasFactory,HasUuids;

    public function sl_user_group()
    {
       
        return $this->hasMany(Sl_user_group::class);
       
    }
}
