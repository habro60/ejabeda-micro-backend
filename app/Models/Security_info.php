<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Security_info extends Model
{
    use HasFactory,HasUuids;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id'];

    
    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Security_info::count('id') + 1;
            $model->security_no =$number;
        });
    }
}
