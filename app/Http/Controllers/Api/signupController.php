<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class signupController extends Controller
{
    public function register(Request $request)
    {
        $validateUser = validator::make(
            $request->all(),
            [
                'name' => 'required',
                'email' => 'required |email|unique:users,email',
                'password' => 'required',
            ]
        );
        if ($validateUser->fails()) {

            return response()->json([
                'status' => false,
                'message' => 'vaildation error ',
                'errors' => $validateUser->errors()

            ], 401);
        }

        $user = User::create(
            [
                'name' =>  $request->name,
                'email' =>  $request->email,
                'password' =>  $request->password,
            ]
        );

        return response()->json([
            'status' => true,
            'message' => ' user created succfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }


    public function login(Request $request)
    {
        echo "log in";
    }
}
