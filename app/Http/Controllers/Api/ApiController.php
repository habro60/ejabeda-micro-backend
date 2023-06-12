<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office_info;
use App\Models\Org_info;
use App\Models\Sl_office_type;
use App\Models\Sl_user_group;
use JWTAuth;
use App\Models\User;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Tymon\JWTAuth\Exceptions\JWTException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    // public function register(Request $request)
    // {



    //     // return 'ok';
    //     $validator = $request->validate([
    //         'org_name' => 'required|string|max:255|unique:org_infos',
    //         'email' => 'required|string|email|unique:org_infos',
    //         'contact_no' => 'required|unique:org_infos'
    //     ]);






    //      $org_number_old = Org_info::latest()->first()->org_number ?? '10000000';

    //       $org_number = intval($org_number_old) + 1;




    //     // $expDate=Date('y:m:d', strtotime('+30 days'));
    //     // $currentDate=Date('y:m:d');


    //     $dbNameRow = 'habroErp_' . "$request->org_name" . '_' . "$org_number";  // Your Database name to be created
    //      $dbName = str_replace(' ', '_', $dbNameRow);

    //     $databaseCreate = DB::statement("CREATE DATABASE $dbName");

    //     if ($databaseCreate == false) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Sorry, Database cannot be Created'
    //         ], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     }
    //     $expDate = Date('y-m-d', strtotime('+30 days'));
    //     $currentDate = Date('y-m-d');

    //     // DB::beginTransaction();

    //     // try {
    //         $orgInfo = Org_info::create([
    //             'org_number' => $org_number,
    //             'org_name' => $request->org_name,
    //             'email' => $request->email,
    //             'db_name' => $dbName,
    //             'db_username' => 'root',
    //             'db_password' => null,
    //             'contact_no' => $request->contact_no,
    //             'status_date' => $currentDate,
    //             'expiry_date' => $expDate,
    //         ]);


    //         //DB::commit();
    //     // } catch (\Throwable $th) {
    //     //     DB::rollback();
    //     //     return response()->json([
    //     //         'success' => false,
    //     //         'message' => 'Sorry, Carefully Agian Submit Your Information !! '
    //     //     ], Response::HTTP_INTERNAL_SERVER_ERROR);
    //     // }





    //     try {

    //         $config = Config::get('database.connections.mysql');

    //         $config['database'] = $dbName;

    //         $config['username'] = 'root';
    //         $config['password'] = null;



    //         // Update config
    //         Config::set('database.connections.mysql', $config);

    //         // Refresh config array in connection cache
    //         DB::purge('mysql');

    //         // Reconnect
    //         DB::reconnect('mysql');
    //     } catch (\Throwable $th) {
    //         //throw $th;
    //     }




    //     try {

    //         Artisan::call(
    //             'migrate',
    //             array(
    //                 '--path' => 'database/migrations',
    //                 '--database' => 'mysql',
    //                 '--force' => true
    //             )
    //         );

    //         Artisan::call('db:seed', [
    //             '--class' => DatabaseSeeder::class,
    //             '--database' => 'mysql',
    //                 '--force' => true
    //         ]);


    //      //Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class, ]);
    //         // $currentDatabase = DB::connection()->getDatabaseName();

    //         // return $currentDatabase;




    //         $expDate = Date('y-m-d', strtotime('+30 days'));
    //         $currentDate = Date('y-m-d');


    //       $office_type_id = Sl_office_type::latest()->first()->id;

    //         $officeInfo = Office_info::create([
    //             'org_number' => $org_number,
    //             'office_number' => $org_number,
    //             'office_type_id' => $office_type_id,
    //             'office_name' => $request->org_name,
    //             'email' => $request->email,
    //             'contact_no' => $request->contact_no,
    //             'status_date' => $currentDate,
    //             'parent_id' =>0,
    //             'expiry_date' => $expDate,
    //         ]);

    //         $user = User::create([
    //             'name' => 'Admin',
    //             'org_number' =>  $org_number,
    //             'office_number' => $org_number,
    //             'email' => $request->email,
    //             'password' => Hash::make($org_number),
    //             'db_name' => $dbName,
    //             'db_username' => 'root',
    //             'db_password' => null,
    //             'sl_user_group_id' => 2,
    //             'sl_role_type_id' => 3
    //         ]);



    //         DB::commit();


    //     } catch (\Throwable $th) {


    //         //return Artisan::output(); 


    //         Schema::getConnection()->getDoctrineSchemaManager()->dropDatabase("`{$dbName}`");

    //         return $th->getMessage();
    //     }





    //     //User created, return success response
    //     return response()->json([
    //         'success' => true,
    //         'message' => 'User created successfully',
    //         'email' => $request->email,
    //         'password' => $org_number
    //     ], Response::HTTP_OK);
    // }

    public function register(Request $request)
    {
        try {
            $validator = $request->validate([
                'org_name' => 'required|string|max:255|unique:org_infos,org_name',
                'email' => 'required|string|email|unique:org_infos,email',
                'contact_no' => 'required|unique:org_infos,contact_no'
            ]);

            $org_number_old = Org_info::latest()->value('org_number') ?? '10000000';
            $org_number = intval($org_number_old) + 1;

            $dbNameRow = 'habroErp_' . str_replace(' ', '_', $request->org_name) . '_' . $org_number;
            $dbName = strtolower($dbNameRow);

            $databaseCreate = DB::statement("CREATE DATABASE $dbName");

            if (!$databaseCreate) {
                return response()->json([
                    'success' => false,
                    'message' => 'Sorry, the database cannot be created'
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }

            $expDate = Date('y-m-d', strtotime('+30 days'));
            $currentDate = Date('y-m-d');

            DB::beginTransaction();

            $orgInfo = Org_info::create([
                'org_number' => $org_number,
                'org_name' => $request->org_name,
                'email' => $request->email,
                'db_name' => $dbName,
                'db_username' => 'root',
                'db_password' => null,
                'contact_no' => $request->contact_no,
                'status_date' => $currentDate,
                'expiry_date' => $expDate,
            ]);

            $config = Config::get('database.connections.mysql');
            $config['database'] = $dbName;
            $config['username'] = 'root';
            $config['password'] = null;

            // Update config
            Config::set('database.connections.mysql', $config);

            // Refresh config array in connection cache
            DB::purge('mysql');

            // Reconnect
            DB::reconnect('mysql');

            Artisan::call('migrate', [
                '--path' => 'database/migrations',
                '--database' => 'mysql',
                '--force' => true
            ]);

            Artisan::call('db:seed', [
                '--class' => DatabaseSeeder::class,
                '--database' => 'mysql',
                '--force' => true
            ]);

            $office_type_id = Sl_office_type::latest()->value('id');

            $officeInfo = Office_info::create([
                'org_number' => $org_number,
                'office_number' => $org_number,
                'office_type_id' => $office_type_id,
                'office_name' => $request->org_name,
                'email' => $request->email,
                'contact_no' => $request->contact_no,
                'status_date' => $currentDate,
                'parent_id' => 0,
                'expiry_date' => $expDate,
            ]);

            $user = User::create([
                'name' => 'Admin',
                'org_number' =>  $org_number,
                'office_number' => $org_number,
                'email' => $request->email,
                'password' => Hash::make($org_number),
                'db_name' => $dbName,
                'db_username' => 'root',
                'db_password' => null,
                'sl_user_group_id' => 2,
                'sl_role_type_id' => 3
            ]);

            DB::commit();

            // User created, return success response
            return response()->json([
                'success' => true,
                'message' => 'User created successfully',
                'email' => $request->email,
                'password' => $org_number
            ], Response::HTTP_OK);
        } catch (\Throwable $th) {
            if (isset($dbName)) {
                Schema::getConnection()->getDoctrineSchemaManager()->dropDatabase("{$dbName}");

                return response()->json([
                    'success' => false,
                    'message' => 'An error occurred',
                    'error' => $th->getMessage()
                ], Response::HTTP_INTERNAL_SERVER_ERROR);
            }
        }
    }
    public function authenticate(Request $request)
    {
        $credentials = $request->only('email', 'password', 'org_number');

        //valid credential
        $validator = Validator::make($credentials, [
            'email' => 'required|email',
            'password' => 'required|string|min:6|max:50'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Wrong Data Input !',
            ], 210);
        }
        try {

            $org = Org_info::where('org_number', $request->org_number)->first();
            $dbName = $org->db_name;
            $currentDate = Date('y-m-d');


            if ($org->expiry_date < $currentDate) {

                return response()->json([
                    'success' => false,
                    'message' => 'License Expired !',
                ], 210);
            }

            $config = Config::get('database.connections.mysql');

            $config['database'] = $dbName;

            $config['username'] = 'root';
            $config['password'] = null;



            // Update config
            Config::set('database.connections.mysql', $config);

            // Refresh config array in connection cache
            DB::purge('mysql');

            // Reconnect
            DB::reconnect('mysql');
        } catch (\Throwable $th) {
            //throw $th;
        }

        //Request is validated
        //Crean token
        try {


            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Login credentials are invalid.',
                ], 400);
            }
        } catch (JWTException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Could not create token.',
            ], 500);
        }
        $user = User::where('email', $request->email)->first();
        $office_name = Office_info::where('office_number', $user->office_number)->first()->office_name;



        //Token created, return with success response and jwt token

        // return response()->json(['user' => Auth::user(), 'token' => $token]);

        return response()->json([
            'success' => true,
            'token' => $token,
            'user' => $user,
            'role' => $user->role->title,
            'office_name' => $office_name,
        ]);
    }

    public function logout(Request $request)
    {
        //valid credential
        $validator = Validator::make($request->only('token'), [
            'token' => 'required'
        ]);

        //Send failed response if request is not valid
        if ($validator->fails()) {
            return response()->json(['error' => $validator->messages()], 200);
        }


        //Request is validated, do logout        
        try {
            JWTAuth::invalidate($request->token);

            return response()->json([
                'success' => true,
                'message' => 'User has been logged out'
            ]);
        } catch (JWTException $exception) {
            return response()->json([
                'success' => false,
                'message' => 'Sorry, user cannot be logged out'
            ], Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    public function get_user(Request $request)
    {

        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        return response()->json(['user' => $user]);
    }


    public function user_filter(Request $request)
    {

        $this->validate($request, [
            'token' => 'required'
        ]);

        $user = JWTAuth::authenticate($request->token);

        $user::user::query();
        $user->when(request('filter_by') == 'date', function ($q) {
            return $q->orderBy('created_at', request('ordering_rule', 'desc'));
        });
        $user = $user->get();

        return response()->json(['user' => $user]);
    }
}
