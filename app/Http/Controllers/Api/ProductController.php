<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'org_name' => ['required', 'string', 'max:255'],
           
            'email' => ['required', 'string', 'email', 'max:255'],

        ]);

        // $expDate=Date('y:m:d', strtotime('+30 days'));
        // $currentDate=Date('y:m:d');


        $dbNameRow = 'habroErp_' . "$request->org_name" . '_' . "$request->org_number";  // Your Database name to be created
        $dbName = str_replace(' ', '_', $dbNameRow);

        $databaseCreate = DB::statement("CREATE DATABASE $dbName");

        $expDate = Date('y:m:d', strtotime('+30 days'));
        $currentDate = Date('y:m:d');


        $orgInfo = Org_info::create([
            'org_number' => $request->org_number,
            'org_name' => $request->org_name,
            'email' => $request->email,
            'db_name' => $dbName,
            'db_username' => 'root',
            'db_password' => null,
            'contact_no' => $request->contact_no,
            'address' => $request->address,
            'status_date' => $currentDate,
            'expiry_date' => $expDate,
        ]);

        $user = User::create([
            'name' => 'Admin',
            'org_number' =>  $request->org_number,
            'office_number' => $request->org_number,
            'email' => $request->email,
            'password' => Hash::make($request->org_number),
            'db_name' => $dbName,
            'db_username' => 'root',
            'db_password' => null,

        ]);





        try {

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




        try {

            Artisan::call(
                'migrate',
                array(
                    '--path' => 'database/migrations',
                    '--database' => 'mysql',
                    '--force' => true
                )
            );

            // $currentDatabase = DB::connection()->getDatabaseName();

            // return $currentDatabase;




            DB::transaction(function () use ($request, $dbName) {
                $expDate = Date('y:m:d', strtotime('+30 days'));
                $currentDate = Date('y:m:d');




                $officeInfo = Office_info::create([
                    'org_number' => $request->org_number,
                    'office_number' => $request->org_number,
                    'office_name' => $request->org_name,
                    'email' => $request->email,
                    'contact_no' => $request->contact_no,
                    'address' => $request->address,
                    'status_date' => $currentDate,
                    'expiry_date' => $expDate,
                ]);


                // DB::commit();

            });
        } catch (\Throwable $th) {


            //return Artisan::output(); 

            DB::rollBack();
            Schema::getConnection()->getDoctrineSchemaManager()->dropDatabase("`{$dbName}`");

            return $th->getMessage();
        }





        //User created, return success response
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], Response::HTTP_OK);
    }

}
