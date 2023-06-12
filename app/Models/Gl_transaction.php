<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gl_transaction extends Model
{
    use HasFactory,HasUuids;
    // $connection="";
    protected $guarded = [
        'id',
    ];

    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Gl_transaction::count('trn_no') + 1;
            $model->trn_no =$number;
        });
    }
}
