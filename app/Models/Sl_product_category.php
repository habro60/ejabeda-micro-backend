<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;


class Sl_product_category extends Model
{
    use HasFactory,HasUuids;

    public function product_service()
    {
        return $this->hasMany(Prod_service_setup::class,'id','product_category');
    }
}
