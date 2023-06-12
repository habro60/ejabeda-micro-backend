<?php

namespace App\Http\Controllers\Api\test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        return $holiday = DB::table('holidays')
        ->join('sl_holiday_types', 'holidays.holiday_type', '=', 'sl_holiday_types.id')
        ->select('holidays.*',  'sl_holiday_types.title as sl_holiday_type_title')
        ->orderBy('holidays.holiday_date')
        ->get();
    }
}
