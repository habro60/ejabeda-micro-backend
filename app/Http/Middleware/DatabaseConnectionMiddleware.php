<?php

namespace App\Http\Middleware;

use App\Models\Org_info;
use Closure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\Exception\HttpException;


class DatabaseConnectionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $orgNumber = $request->input('org_number');
        // Find the organization in the root database
        $org = Org_info::where('org_number', $orgNumber)->first();
        // If organization is not found, skip the middleware
        if (!$org) {
            return response()->json(['error' => 'Organization not found'], 404);
        }
        if ($org){

            // Check if user model has property for dynamic database
            if($org->db_name){

                           
                $userDatabase = $org->db_name;

                $currentDatabase = DB::connection()->getDatabaseName();

                // If current database is no set
                if($userDatabase && $userDatabase != $currentDatabase){
                   

                    $config = Config::get('database.connections.mysql');

                    $config['database'] = $userDatabase;

                    // Set new username if applicable
                    if($org->db_username){
                      
                        $config['username'] = $org->db_username;
                        $config['password'] = $org->db_password;
                    }

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
                    return $next($request);
                }

            }
           
        }

        

    }
}
