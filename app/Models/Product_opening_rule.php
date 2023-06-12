<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Product_opening_rule extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = [
        'id',
    ];

    
public function product()
{
    return $this->belongsTo(Prod_service_setup::class);
}
}

