<?php

namespace App\Http\Middleware;

use Closure;
use App\User;

class CheckApiToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {   
        // dd($request);
        $auth_token = $request->header('Authorization');
        if(empty($auth_token)) {
            return response()->json([
                'status' => false,
                'error' => 'Missing token'
            ]);
        }

        $clear_token = substr($auth_token, 7);
        $user = User::where('api_token', $clear_token)->first();
        if(!$user) {
            return response()->json([
                'status' => false,
                'error' => 'Token / User association doesn\'t match' 
            ]);
        }

        return $next($request);
    }
}
