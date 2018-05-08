<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Validation
{
    public function handle($request, Closure $next) 
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $username = $request->input('username');
        $email = $request->input('email');

        if (!$firstname || strlen($firstname) < 6 || trim($firstname) === '') {
            return 'First name cannot be empty.';
        }

        if (!$lastname || strlen($lastname) < 6 || trim($lastname) === '') {
            return 'Last name cannot be empty.';
        }

        if (!$username || strlen($username) < 6 || trim($username) === '') {
            return 'Username cannot be empty.';
        }

        if (!filter.test($email)) {
            return 'Input a valid Email';
        }
    
        return $next($request);
    }
}
