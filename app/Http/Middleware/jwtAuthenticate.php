<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Http\Request;
use Firebase\JWT\JWT;
use Firebase\JWT\ExpiredException;
use App\User;

class JwtMiddleware
{
    public function handle($request, Closure $next, $guard = null)
    {
        $token = $request->bearerToken();
        if (!$token) {
            return response()->json([
                'error' => 'Unauthorized user.',
                'status' => 401
            ]);
        }
        try {
            $credentials = JWT::decode($token, env('SECRET_KEY'), ['HS256']);
        }
        catch (ExpiredException $e) {
            return response()->json([
                'status' => 403,
                'error' => 'Please sign in to access this route.'
            ]);
        }
        catch (Exception $e){
            return response()->json([
                'status' => 500,
                'error' => 'Something went wrong.'
            ]);
        }

        $request->currentUserId = $credentials->sub;

        return $next($request);
    }
}
