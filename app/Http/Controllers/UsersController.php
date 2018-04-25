<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Firebase\JWT\ExpiredException;
use Illuminate\Support\Facades\Hash;

/**
 * class UsersController
 * 
 */
class UsersController extends Controller
{   

    protected function jwt(User $user) {
        $payload = [
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + 60*60
        ];

        return JWT::encode($payload, env('SECRET_KEY'));
    }


    /**
     * Signs the user up;
     * 
     * param Request- Request object for signing up
     */
    public function register(Request $request)
    {
        $hash_password = app()->make('hash');
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $username = $request->input('username');
        $email = $request->input('email');
        $password = $hash_password->make($request->input('password'));

        $this->validate($request,[
            'firstname' => 'required',
            'email' => 'required|email|unique:users',
            'lastname' => 'required',
            'username' => 'required|min:6',
            'password' => 'required|min:8'
        ]);

        $user_found = User::where('email', $email)
                            ->where('username', $username)->first();
        if ($user_found) {
            return response()->json(
                [   
                    'status' => 422,
                    'error' => 'User already registered'
                ]
            );
        } else {
            $user = User::create([
                'first_name' => $firstname,
                'last_name' => $lastname,
                'username' => $username,
                'email' => $email,                                                       
                'password' => $password,
            ]);
        }
        return response()->json([
            'message' => 'You have successfully signed up',
            'status' => 201,
            'detail' => $user
        ]);
    }

    /**
     * Signs user in;
     * 
     * param Request- Request object for signing in users
     */
    public function signin(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');
        $username = $request->input('username');

        $user_found = User::where('email', $email)
                                ->orWhere('username', $username)->first();
        if(!$user_found) {
            return response()->json([
                'error' => 'User is not registered',
                'status' => 404
            ]);
        }

        if (Hash::check($password, $user_found->password))
        {
            return response()->json(
            [  
                'status' => '200',
                'message' => 'You have successfully signed in',
                'token' => $this->jwt($user_found)
            ]);
        }
        return response()->json([
            'error' => 'Invalid username or email.',
            'status' => 400
        ]);

    }
    
    /**
     * Gets the detail of a single user.
     * 
     * param {Request} $request - Request object
     * param {number} $userId - id of the user
     *
     * Returns {any} - Detail of a single user
     */
    public function singleUser(Request $request, $userId)
    {   
        $userId = $user->id;
        $current_user = User::find($userId);
        return response()->json([
            'currentUser' => $user
        ]);
    }
}
