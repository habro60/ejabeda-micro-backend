<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Holiday extends Model
{
    use HasFactory,HasUuids;
    
    protected $guarded = [
        'id',
    ];

    public function sl_holiday_type()
    {
        return $this->belongsTo(Sl_holiday_type::class,'holiday_type','id');
    }


}
