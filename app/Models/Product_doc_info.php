<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product_doc_info extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = [
        'id',
    ];
}
