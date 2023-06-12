<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\TokenInvalidException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Facades\JWTAuth;

class JwtMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        try {
            $user = JWTAuth::parseToken()->authenticate();
        } catch (TokenInvalidException $e) {
            return response()->json(['status' => 'Token is Invalid'], 401);
        } catch (TokenExpiredException $e) {
            // Refresh token
            $newToken = JWTAuth::refresh(JWTAuth::getToken());
            $response = $next($request);
            $response->headers->set('Authorization', 'Bearer '.$newToken);
            return $response;
        } catch (\Exception $e) {
            return response()->json(['status' => 'Authorization Token not found'], 401);
        }
        return $next($request);
    }
}
