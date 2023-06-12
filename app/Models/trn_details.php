<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Trn_details extends Model
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
            $number = Trn_details::count('trn_no') + 1;
            $model->trn_no =$number;
        });
    }
}
