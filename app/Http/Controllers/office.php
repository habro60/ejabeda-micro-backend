<?php

namespace App\Http\Controllers;

use App\Models\Office_info;
use App\Models\Sl_office_type;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;

class office extends Controller
{
   public function getOffice($id)
   {

   return $allOffices = Office_info::where('office_type',$id)->pluck('office_name','id')->all();

   }
public function manageOffice()
{
    $offices = Office_info::where('parent_id', '=', 0)->get();
    $allOffices = Office_info::pluck('office_name','id')->all();
    $OfficeType = Sl_office_type::where('application_type',1)->orderBy('id')->pluck('title','id')->all();
    return view('Backend.officeSetup.office',compact('offices','allOffices','OfficeType'));
}

public function addOffice(Request $request)
{
            $this->validate($request, [
                'office_name' => 'required',
            ]);
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];

        Office_info::create($input);
        return back();
}


}
