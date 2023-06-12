<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Chq_book_info extends Model
{
    use HasFactory,HasUuids;
   
    protected $guarded = [
        'id',
    ];

    protected $table = 'chq_book_infos';

    public function bankAccInfo()
    {
        return $this->belongsTo(Bank_acc_info::class, 'bank_acc_no', 'bank_acc_no');
    }

 


    public static function boot() {
        parent::boot();

        static::creating(function ($model) {
            $number = Chq_book_info::count('chq_book_no') + 1;
            $model->chq_book_no =$number;
        });
    }
}
