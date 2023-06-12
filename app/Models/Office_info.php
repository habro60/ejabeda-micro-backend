<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office_info extends Model
{
    use HasFactory,HasUuids;
    // $connection="";
    protected $guarded = [
        'id',
    ];


    public function childs() {
        return $this->hasMany(Office_info::class,'parent_id','id') ;
    }

    public function sl_office_type()
    {
        return $this->belongsTo(Sl_office_type::class,'office_type_id','id');
    }
}
