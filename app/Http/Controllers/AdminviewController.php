<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminviewController extends Controller
{
   public function dashboard()
   {
    return view('Backend.dashboard');
   }

   public function appsetup()
   {
    return view('Backend.applicationSetup.applicationSetup');
   }
   public function officeinfo()
   {
      
    return view('Backend.officeSetup.office');
   }
   public function account()
   {
    return view('Backend.gl_accountSetup.gl_account');
   }
   public function product()
   {
    return view('Backend.Product&Service.Product&Service');
   }
}
