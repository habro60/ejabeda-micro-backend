<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class nominee_info extends Model
{ use HasFactory,HasUuids;
    // $connection="";
    protected $guarded = [
        'id',
    ];
}
