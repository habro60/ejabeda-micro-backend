<?php

namespace App\Modules\Microcredit\Organization\Http\Controllers\Microcredit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrganizationController extends Controller
{

    /**
     * Display the module welcome screen
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view("Microcredit/Organization::welcome");
    }
}
