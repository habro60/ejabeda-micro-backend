<?php

namespace App\Modules\Microcredit\Office\Http\Controllers\Microcredit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OfficeController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Microcredit/Office::welcome");
    }
}
