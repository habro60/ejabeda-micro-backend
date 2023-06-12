<?php

namespace App\Http\Controllers\Api\user;

use App\Events\UserCreated;
use App\Http\Controllers\Controller;
use App\Models\Office_info;
use App\Models\Posting_transfer;
use App\Models\Sl_role_type;
use App\Models\Sl_user_group;
use App\Models\User;
use App\Models\User_detail_info;
use Database\Seeders\DatabaseSeeder;
use GuzzleHttp\Psr7\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {

        Artisan::call(
            'migrate',
            array(
                '--path' => 'database/migrations',
                '--database' => 'mysql',
                '--force' => true,
            )
        );

        Artisan::call('db:seed', [
            '--class' => DatabaseSeeder::class,
            '--database' => 'mysql',
            '--force' => true,
        ]);

        // $currentDatabase = DB::connection()->getDatabaseName();
        // return $currentDatabase;

        $users = DB::table('users')
            ->join('sl_role_types', 'users.sl_role_type_id', '=', 'sl_role_types.id')
            ->join('sl_user_groups', 'users.sl_user_group_id', '=', 'sl_user_groups.id')
            ->select('users.name', 'users.id', 'sl_role_types.title as role_title', 'sl_user_groups.title as user_group_title')
            ->get();

        $roles = Sl_role_type::get();
        $sl_user_group = Sl_user_group::get();
        $allOffice = Office_info::get();

        return response()->json([
            'success' => true,
            'user' => $users,
            'sl_role_type' => $roles,
            'sl_user_group' => $sl_user_group,
            'allOffice' => $allOffice,
        ])->setStatusCode(200);

    }

    public function create(Request $request)
    {

        try {

            $user = User::create([
                'sl_role_type_id' => $request->sl_role_type_id,
                'sl_user_group_id' => $request->sl_user_group_id,
                'name' => $request->name,
                'email' => $request->email,
                'posting_date' => $request->posting_date,
                'posting_place' => $request->office_number,
                'org_number' => Auth::user()->org_number,
                'office_number' => $request->office_number,
                'db_name' => Auth::user()->db_name,
                'db_username' => Auth::user()->db_username,
                'db_password' => Auth::user()->db_password,
                'password' => Hash::make($request->password),

            ]);

            event(new UserCreated($user));

            return response()->json([
                // childs
                'success' => true,
                'message' => 'User Create Successfully',
            ]);
        } catch (\Throwable$th) {
            return response()->json([

                'success' => false,
                'message' => 'Something Wrong',
            ]);
        }

    }

    public function edit($id)
    {
        $user = User::find($id);

        return response()->json([
            'success' => true,
            'user' => $user,
        ]);
    }

    public function user_transfer_update(Request $request)
    {
        //   $this->validate($request, [
        //      'id' => 'required',
        //      'holiday_type' => 'required',
        //      'holiday_name' => 'required',
        //      'holiday_date' => 'required',
        //      'updated_by' => 'required'
        //   ]);

        DB::beginTransaction();

        try {

           $user= User::whereId($request->id)->update([
                'sl_role_type_id' => $request->sl_role_type_id,
                'sl_user_group_id' => $request->sl_user_group_id,
                'name' => $request->name,
                'email' => $request->email,
                'posting_date' => $request->posting_date,
                'posting_place' => $request->office_number,
                'org_number' => Auth::user()->org_number,
                'office_number' => $request->office_number,
                'db_name' => Auth::user()->db_name,
                'db_username' => Auth::user()->db_username,
                'db_password' => Auth::user()->db_password,
            ]);

           $ptransfer= Posting_transfer::where('user_id', $request->id)->where('is_current', true)->update([

               'tranf_date'=>$request->posting_date,
               'tranf_from_place'=>$request->office_number,
               'is_current'=>false,
               'updated_by'=>Auth::user()->id

            ]);

            if ($request->sl_user_group_id == '2') {

               Posting_transfer::create([
                   'user_id' => $request->id,
                   'posting_date' => $request->posting_date,
                   'posting_place' =>$request->office_number,
                   'created_by'=>Auth::user()->id
               ]);
           }

             DB::commit();

            return response()->json([
                // childs
                'success' => true,
                'message' => 'User Transfer Successfully',
            ]);
        } catch (\Throwable$th) {

            DB::rollback();
            return response()->json([

                'success' => false,
                'message' => 'Somthing Went To Wrong',
            ]);
         }
    }
    public function user_update(Request $request)
    {
        //   $this->validate($request, [
        //      'id' => 'required',
        //      'holiday_type' => 'required',
        //      'holiday_name' => 'required',
        //      'holiday_date' => 'required',
        //      'updated_by' => 'required'
        //   ]);

        DB::beginTransaction();

        try {

           $user= User::whereId($request->id)->update([
                'sl_role_type_id' => $request->sl_role_type_id,
                'sl_user_group_id' => $request->sl_user_group_id,
                'name' => $request->name,
                'email' => $request->email,
                'posting_date' => $request->posting_date,
                'posting_place' => $request->office_number,
                'org_number' => Auth::user()->org_number,
                'office_number' => $request->office_number,
                'db_name' => Auth::user()->db_name,
                'db_username' => Auth::user()->db_username,
                'db_password' => Auth::user()->db_password,
                'password' => Hash::make($request->password),
            ]);

           $ptransfer= Posting_transfer::where('user_id', $request->id)->where('is_current', true)->update([

               'posting_date'=>$request->posting_date,
               'posting_place'=>$request->office_number,
               'updated_by'=>Auth::user()->id

            ]);

           

             DB::commit();

            return response()->json([
                // childs
                'success' => true,
                'message' => 'User Updated Successfully',
            ]);
        } catch (\Throwable$th) {

            DB::rollback();
            return response()->json([

                'success' => false,
                'message' => 'Somthing Went To Wrong',
            ]);
         }
    }

    public function user_active()
    {
        $users = DB::table('users')
            ->join('sl_role_types', 'users.sl_role_type_id', '=', 'sl_role_types.id')
            ->join('sl_user_groups', 'users.sl_user_group_id', '=', 'sl_user_groups.id')
            ->select('users.name', 'users.id', 'users.status', 'sl_role_types.title as role_title', 'sl_user_groups.title as user_group_title')
            ->where('status', true)
            ->get();

        return response()->json([
            'success' => true,
            'user' => $users,
        ]);
    }

    public function user_inactive()
    {
        $users = DB::table('users')
            ->join('sl_role_types', 'users.sl_role_type_id', '=', 'sl_role_types.id')
            ->join('sl_user_groups', 'users.sl_user_group_id', '=', 'sl_user_groups.id')
            ->select('users.name', 'users.id', 'users.status', 'sl_role_types.title as role_title', 'sl_user_groups.title as user_group_title')
            ->where('status', false)
            ->get();
        return response()->json([
            'success' => true,
            'user' => $users,
        ]);
    }

    public function user_transfer()
    {
        $users = DB::table('users')
            ->join('sl_role_types', 'users.sl_role_type_id', '=', 'sl_role_types.id')
            ->join('sl_user_groups', 'users.sl_user_group_id', '=', 'sl_user_groups.id')
            ->select('users.name', 'users.id', 'users.status', 'sl_role_types.title as role_title', 'sl_user_groups.title as user_group_title')
            ->where('sl_user_groups.id', '=', 2)
            ->get();
        $roles = Sl_role_type::get();
        $sl_user_group = Sl_user_group::get();
        $allOffice = Office_info::get();

        return response()->json([
            'success' => true,
            'user' => $users,
            'sl_role_type' => $roles,
            'sl_user_group' => $sl_user_group,
            'allOffice' => $allOffice,
        ])->setStatusCode(200);
    }

    public function update_user_status($id)
    {
        $user_status = User::where('id', $id)->first();
        $user_status->status = !$user_status->status;
        $user_status->update();

    }

public function user_all_transfer_history($userid)
{

    $tr_history=  DB::table('users')
    ->join('posting_transfers', 'users.id', '=', 'posting_transfers.user_id')
    ->select('users.name', 'users.id','posting_transfers.*')
    ->where('posting_transfers.user_id',$userid)
    ->where('posting_transfers.is_current',0)
    ->get();

   //$tr_history=Posting_transfer::where('user_id',$userid)->get();
   return response()->json([
      'success' => true,
      'user_trans_hister' => $tr_history
      
  ])->setStatusCode(200);
}

public function user_team_laed()
{
    $user_team_laed=  DB::table('users')
    ->join('user_detail_infos', 'users.id', '=', 'user_detail_infos.user_id')
    ->select('users.name', 'users.id')
    ->where('user_detail_infos.is_team_lead', true)
    ->get();
    return response()->json([
       'success' => true,
       'user_team_laed' => $user_team_laed
       
   ])->setStatusCode(200);
}


    public function user_detail_update(Request $request)
    {

    //   try {
         //code...
     
        // return $request;


       $office = Office_info::where('office_number', Auth::user()->office_number)->first();

         $office_id = $office->id;

      $user = User_detail_info::updateOrCreate(
         ['user_id' => $request->user_id], // Search condition
         [
            
         'office_id' => $office_id,
         'user_id' => $request->user_id,
         'user_number' => $request->user_number,
         'under_team_lead' => $request->under_team_lead,
         'is_team_lead' => $request->is_team_lead,
         'full_name' => $request->full_name,
         'contact_no' => $request->contact_no,
         'date_of_birth' => $request->date_of_birth,
         'father_name' => $request->father_name,
         'mother_name' => $request->mother_name,
         'pause_name' => $request->pause_name,
         'image' => $request->image,
         'present_address' => $request->present_address,
         'permenant_address' => $request->permenant_address,
         'NID' => $request->NID,
         'profession' => $request->profession,
         'created_by' =>Auth::user()->id,
         'updated_by' =>Auth::user()->id

         ] // Update or create data
     );

     return response()->json([
      'success' => true,
      'message' => "User Detail Update Successfully",
      
  ]);

// } catch (\Throwable $th) {
//    return response()->json([
//       'success' => false,
//       'message' => "Cheack Your Data And Resubmit Please",
      
//   ]);
// }

    }

    public function user_detail_get($id)
    {

     $user_details= User_detail_info::where('user_id',$id)->first();
      return response()->json([
         'success' => true,
         'user_detail' =>$user_details,
         'user_id' =>$id,
     ]);
    }

    public function group_type_user($id)
    {

     $user= User::where('sl_user_group_id',$id)->get();
     return response()->json([
        'success' => true,
        'user' => $user
        
    ])->setStatusCode(200);
    }

}
