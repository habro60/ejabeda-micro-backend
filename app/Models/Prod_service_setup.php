<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Prod_service_setup extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = [
        'id',
    ];

    public function childs() {
        return $this->hasMany(Prod_service_setup::class,'parent_id','id') ;
    }

    public function productOpeningRule()
    {
        return $this->belongsTo(Product_opening_rule::class);
    }
    public function sl_product_category()
    {
        return $this->belongsTo(Sl_product_category::class,'product_category','id');
    }
    public function all_gl_acc()
    {
        return $this->belongsTo(Gl_acc_code::class,'gl_acc_id','id');
    }
    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Prod_service_setup::count('id') + 1;
            $model->prod_code =$number;
        });
    }
}
