<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product_closing_rule extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = [
        'id',
    ];
}
