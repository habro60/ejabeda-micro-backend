<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Sl_holiday_type extends Model
{
    use HasFactory,HasUuids;

    public function holidays()
    {
        return $this->hasMany(Holiday::class,'id','holiday_type');
    }
}
