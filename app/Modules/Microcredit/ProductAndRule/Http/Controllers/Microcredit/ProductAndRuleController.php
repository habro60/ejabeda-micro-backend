<?php

namespace App\Modules\Microcredit\ProductAndRule\Http\Controllers\Microcredit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductAndRuleController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Microcredit/ProductAndRule::welcome");
    }
}
