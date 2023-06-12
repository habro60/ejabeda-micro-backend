<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Office_info;
use App\Models\Org_info;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Database\Seeders\DatabaseSeeder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class OrganizationController extends Controller
{
    public function organizationRegister(Request $request)
    {
         
        
        $request->validate([
            'org_name' => ['required', 'string', 'max:255'],
            'org_number' => ['required', 'numeric' ],
            'email' => ['required', 'string', 'email', 'max:255'],
           
        ]);

        // $expDate=Date('y:m:d', strtotime('+30 days'));
        // $currentDate=Date('y:m:d');


        $dbNameRow = 'habroErp_'."$request->org_name".'_'."$request->org_number";  // Your Database name to be created
        $dbName=str_replace(' ', '_', $dbNameRow);

        $databaseCreate=DB::statement("CREATE DATABASE $dbName");

        $expDate=Date('y:m:d', strtotime('+30 days'));
        $currentDate=Date('y:m:d');

           
    $orgInfo = Org_info::create([
        'org_number' => $request->org_number,
        'org_name' => $request->org_name,
        'email' => $request->email,
        'db_name' => $dbName,
        'contact_no' => $request->contact_no,
        'address' => $request->address,
        'status_date' => $currentDate,
        'expiry_date' => $expDate,
    ]);

    $user=User::create([
        'name'=> 'Admin',
        'org_number'=>  $request->org_number,
        'office_number'=> $request->org_number,
        'email'=> $request->email,
        'password'=>Hash::make($request->org_number),
        'db_name'=> $dbName,
        'db_username'=>'root',
        'db_password'=> null,
    
    ]);

       



        try {
            
            $config = Config::get('database.connections.mysql');

            $config['database'] = $dbName;

                $config['username'] = 'root';
                $config['password'] = null;
            

          //  try{

                // Set new password if applicable
                // if($user->db_password | $user->db_password==null){
                //     throw new Exception('503');
                   
                // }
           // }
           // catch(Exception $e){

                //throw new DynamicConnectionInvalidPasswordException('The payload provider for user password is invalid');
            //}

            // Update config
            Config::set('database.connections.mysql', $config);

            // Refresh config array in connection cache
            DB::purge('mysql');

            // Reconnect
            DB::reconnect('mysql');
        } catch (\Throwable $th) {
            Schema::getConnection()->getDoctrineSchemaManager()->dropDatabase("`{$dbName}`");

        }

       
//         config([
// "database.connections.dynamic"=>[
//             'driver' => 'mysql',
//             'host' => env('DB_HOST_root', '127.0.0.1'),
//             'port' => env('DB_PORT_root', '3306'),
//             'database' => $dbName,
//             'username' => 'root',
//             'password' =>'',
//             'charset' => 'utf8mb4',
//             'collation' => 'utf8mb4_unicode_ci',
//             'prefix' => '',
//             'prefix_indexes' => true,
//             'strict' => true,
//             'engine' => null,
//             'options' => extension_loaded('pdo_mysql') ? array_filter([
//                 PDO::MYSQL_ATTR_SSL_CA => env('MYSQL_ATTR_SSL_CA'),
//             ]) : [],
// ]
//         ]);


        try {
           
            Artisan::call('migrate',
                 array(
                '--path' => 'database/migrations',
                '--database' => 'mysql',
                '--force' => true));

            Artisan::call('db:seed', [
                '--class' => DatabaseSeeder::class
            ]);

                // $currentDatabase = DB::connection()->getDatabaseName();

                // return $currentDatabase;
    


                
            DB::transaction(function () use($request,$dbName) {
                $expDate=Date('y:m:d', strtotime('+30 days'));
                $currentDate=Date('y:m:d');

          
        
          
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

       
            // Artisan::call("migrate",['--database'=>'dynamic']);
           // return Artisan::output();
        
        } catch (\Throwable $th) {

           
             //return Artisan::output(); 

            DB::rollBack();
           // Schema::getConnection()->getDoctrineSchemaManager()->dropDatabase("`{$dbName}`");

            return $th->getMessage();

        }



        // try {

       

    
        



        //     //code...
        // } catch (\Throwable $th) {
        //     //throw $th;

        //     DB::rollBack();

        //     return $th->getMessage();
        // }
        
       // return $request;
      
        // $user = User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        // ]);
        

        // event(new Registered($user));

        // Auth::login($user);






        return redirect(RouteServiceProvider::HOME);


 
       
    }
}
