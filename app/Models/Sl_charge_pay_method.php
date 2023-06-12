<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
class Sl_charge_pay_method extends Model
{
    use HasFactory,HasUuids;

    public function charge_rate_setup() {
        return $this->hasMany(charge_setup::class,'id','sl_charge_pay_method_id') ;
    }
}
