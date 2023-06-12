<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Gl_acc_code extends Model
{
    use HasFactory,HasUuids;
    // $connection="";
    protected $guarded = [
        'id',
    ];


    public function childs() {
        return $this->hasMany(Gl_acc_code::class,'parent_id','id') ;
    }

    public function sl_account_type()
    {
        return $this->belongsTo(Sl_acc_type::class,'acc_type_id','id');
    }

    public function sl_account_category()
    {
        return $this->belongsTo(Sl_acc_category::class,'category_id','id');
    }

    public function charge_rate_setup() {
        return $this->hasMany(charge_setup::class,'id','gl_acc_code_id') ;
    }

    public function product_gl_acc()
    {
        return $this->hasMany(Prod_service_setup::class,'id','gl_acc_id');
    }

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Gl_acc_code::count('id') + 1;
            $model->acc_code =$number;
        });
    }
  
}
