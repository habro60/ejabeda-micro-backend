<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office_info;
use App\Models\Org_info;
use App\Models\Sl_office_type;
use App\Modules\Microcredit\Office\Models\Microcredit\Office;
use App\Repository\Office\officeRepository;
use Carbon\Carbon;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OfficeController extends Controller
{
    protected $office;

    public function __construct(officeRepository $office)
    {
        $this->office = $office;
    }

    public function alloffice()
    {
        $allOffice = Office_info::get();
        return response()->json($allOffice);
    }


    public function manageOffice()
    {

        // $parent_offices = Office_info::with('sl_office_type')->where('parent_id', '=', '0')->get();

        //     $allOffices_1 = Office_info::with('sl_office_type')->get();


        //     $office_type = Office_info::with('childs')->with('sl_office_type')->where('parent_id', '=', '0')->get();

        //  return   DB::table('office_infos as u1')
        // ->join('office_infos as u2', 'u1.parent_id', '=', 'u2.id')
        // ->join('sl_office_types', 'u1.office_type_id', '=', 'sl_office_types.id')
        // ->select('u1.office_name', 'u2.office_name as parent_name', 'sl_office_types.title as sl_office_types_name')
        // ->get();
        //most important
        // $data = Office_info::with(['childs' => function ($query) {
        //     $query->with('childs');
        // }])->where('parent_id','0')->get();


        $offices = Office_info::with('childs')->where('parent_id', '0')->get();

        $data = [];

        foreach ($offices as $office) {
            $data[] = [
                'id' => $office->id,
                'parent_id' => $office->parent_id,
                'office_name' => $office->office_name,
                'sl_office_type' => $office->sl_office_type->title,
                'childs' => $this->getChildren($office)
            ];
        }

        return response()->json($data);


        // In your controller method
        $data = DB::table('office_infos as u1')
            ->leftJoin('office_infos as u2', 'u1.parent_id', '=', 'u2.id')
            ->leftJoin('sl_office_types', 'u1.office_type_id', '=', 'sl_office_types.id')
            ->select('u1.office_name', 'u1.parent_id', 'u2.office_name as parent_name', 'sl_office_types.title as sl_office_types_name')
            ->orderBy('u1.parent_id')
            ->orderBy('u1.id')
            ->get();

        // return $data;


        return $data = $this->setLevel($data);


        $tree = collect([]);

        foreach ($data as $item) {
            $parent = $tree->where('id', $item->parent_id)->first();
            if ($parent) {
                $parent->children[] = $item;
            } else {
                $tree->push($item);
            }
        }

        return response()->json($tree);

        // return $test=DB::table('office_infos as u1')
        // ->join('office_infos as u2', 'u1.parent_id', '=', 'u2.id')
        // ->join('sl_office_types', 'sl_office_types.id', '=', 'office_infos.office_type_id')
        // ->select('u1.office_name', 'u2.office_name as parent_name','sl_office_types.title')
        // ->get();
        // foreach($office_type as $row){

        //     $allOffices[]=[
        //         'office_name' => $row->office_name, 
        //         'office_number' => $row->office_number, 
        //         'id' => $row->id, 
        //         'sl_office_type' => $row->sl_office_type->title,
        //         'childs'=>$row->childs
        //         ];
        // }
        // return $allOffices;

        // return response()->json([
        //     'success' => true,
        //     'alloffice' => $allOffices,
        //     'parent_offices' => $parent_offices
        // ]);
        //return view('officeTreeview',compact('offices','allOffices'));
    }




    private function setLevel($data, $parent_id = 0, $level = 0)
    {

        $result = [];

        foreach ($data as $row) {
            if ($row->parent_id == $parent_id) {
                // $row->level = $level;
                $row->children = $this->setLevel($data, $row->id, $level + 1);
                $result[] = $row;
            }
        }

        return $result;
    }


    public function getChildren($office)
    {
        $children = [];

        foreach ($office->childs as $child) {
            $children[] = [
                'id' => $child->id,
                'parent_id' => $child->parent_id,
                'office_name' => $child->office_name,
                'sl_office_type' => $child->sl_office_type->title,
                'childs' => $this->getChildren($child)
            ];
        }

        return $children;
    }


    public function child($id)
    {

        $child_office = Office_info::with('childs')->with('sl_office_type')->where('parent_id', '=', $id)->get();

        foreach ($child_office as $row) {

            $child[] = [
                'office_name' => $row->office_name,
                'office_number' => $row->office_number,
                'id' => $row->id,
                'sl_office_type' => $row->sl_office_type->title,
                'childs' => $row->childs
            ];
        }
        //    $data= $child_office->childs();

        return response()->json([
            'success' => true,
            'child_office' => $child

        ]);
    }


    public function addOffice(Request $request)
    { 
        $this->validate($request, [
            'office_name' => 'required',
        ]);
        $org_number_old = Office_info::latest()->first() ?? '10000000';

        $org_number = intval($org_number_old->org_number);
        $office_number = intval($org_number_old->office_number) + 1;
        $status_date = now()->toDateString();

        // $input = $request->all();
        $parent_id = empty($request->parent_id) ? 0 : $request->parent_id;


        try {

            $office_create = Office_info::create([
                'org_number' => $org_number,
                'office_number' => $office_number,
                'office_name' => $request->office_name,
                'status_date' => $status_date,
                'contact_no' => $request->contact_no,
                'email' => $request->email,
                'office_type_id' => $request->office_type_id,
                'parent_id' => $parent_id
            ]);

            // $office_create = Office_info::create($input);
            return response()->json([
                'success' => true,
                'message' => 'Office Create Succeassfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Somethings Went To wrong'
            ]);
        }



        // return back();
    }

    public function sl_office_type()
    {
        try {
            $sl_office_type = Sl_office_type::get();
            return response()->json([
                'success' => true,
                'office_type' => $sl_office_type
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went to wrong'
            ]);
        }
    }



    public function get_edit_office_data($id)
    {
        //return $id;
        //return $office_edit_info = Office_info::find($id);
        try {
            $office_edit_info = Office_info::find($id);
            return response()->json([
                'success' => true,
                'office_edit_info' => $office_edit_info
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something went to wrong'
            ]);
        }
    }
    public function update_office_data(Request $request)
    {
        $this->validate($request, [
            'office_name' => 'required',
        ]);

        // $input = $request->all();
        //$input['parent_id'] = empty($input['parent_id']) ? 0 : $input['parent_id'];


        try {

            Office_info::whereId($request->id)->update([
                'office_name' => $request->office_name,
                'contact_no' => $request->contact_no,
                'email' => $request->email,
                'office_type_id' => $request->office_type_id,
                'id' => $request->id
            ]);

            // $office_create = Office_info::create($input);
            return response()->json([
                'success' => true,
                'message' => 'Office Update Succeassfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'success' => false,
                'message' => 'Something Went To wrong'
            ]);
        }
    }


    public function index()
    {

        return response()->json([
            // childs
            'success' => true,
        ]);

        // return $offices=$this->office->getAllData();

    }


    public function store(Request $request, $id = null)
    {
        $data = $request->except('csrf_token');
        return $offices = $this->office->storeOrUpdate($id = null, $data[]);
    }
    public function get_valid_org()
    {

        return  $org = Org_info::select("*")
            ->where("status", 1)
            ->where(function ($query) {
                $query->whereRaw(
                    'DATEDIFF(expiry_date, date("Y:m:d"))',
                    '>',
                    0
                );
            })
            ->get();

        // $data=$request->except('csrf_token');
        // return $offices=$this->office->storeOrUpdate($id=null,$data[]);

    }
}
