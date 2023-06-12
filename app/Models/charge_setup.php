<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class charge_setup extends Model
{
    use HasFactory, HasUuids;

    protected $guarded = [
        'id',
    ];

    public function sl_charge_type()
    {
        return $this->belongsTo(sl_charge_type::class,'sl_charge_type_id','id');
    }

    public function sl_charge_pay_method()
    {
        return $this->belongsTo(Sl_charge_pay_method::class,'sl_charge_pay_method_id','id');
    }
    public function sl_charge_pay_period()
    {
        return $this->belongsTo(Sl_charge_pay_period::class,'sl_charge_pay_period_id','id');
    }

    public function gl_acc_code()
    {
        return $this->belongsTo(Gl_acc_code::class,'gl_acc_code_id','id') ;
    }
    public function product()
    {
        return $this->belongsTo(Prod_service_setup::class,'product_id','id') ;
    }
}
