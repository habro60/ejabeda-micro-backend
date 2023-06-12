<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class Bank_acc_info extends Model
{
    use HasFactory,HasUuids;
    protected $table = 'bank_acc_infos';
    


    protected $guarded = [
        'id',
    ];

    public function chqBookInfo()
    {
        return $this->hasOne(Chq_book_info::class, 'bank_acc_no', 'bank_acc_no');
    }
}
