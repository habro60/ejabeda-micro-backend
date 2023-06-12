<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Int_rate_setup extends Model
{
    use HasFactory,HasUuids;

    protected $guarded = [
        'id',
    ];
}
