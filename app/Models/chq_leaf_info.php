<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class chq_leaf_info extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = [
        'id',
    ];
}
