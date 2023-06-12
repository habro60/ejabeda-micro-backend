<?php

namespace App\Http\Controllers\Api\product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Office_info;
use App\Models\Prod_service_setup;
use App\Models\Sl_holiday_type;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProductServiceController extends Controller
{
    public function manageProductService()
    {

        $prod_services = Prod_service_setup::with('childs')->where('parent_id', '0')->get();

        $data = [];

        foreach ($prod_services as $prod_service) {
            $data[] = [
                'id' => $prod_service->id,
                'parent_id' => $prod_service->parent_id,
                'product_name' => $prod_service->product_name,
                'sl_prod_service_type' => $prod_service->sl_prod_service_type->title,
                'childs' => $this->getChildren($prod_service)
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


    public function getChildren($prod_service)
    {
        $children = [];

        foreach ($prod_service->childs as $child) {
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
  
}
