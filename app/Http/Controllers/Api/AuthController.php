<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = User::create($request->all());
        return $user;
    }

    public function login(Request $request){
        $user = User::where("email",$request->email)->first();
        if(!$user || !Hash::check($request->password,$user->password)){
            return response()->json([
                "message"=>"Not Found"
            ],404);
        }

        $token = $user->createToken("api_token")->plainTextToken;
        return response()->json([
            "token"=>$token
        ]);
    }

    public function logout(Request $request){
        $request->user()->tokens()->delete();
        return response()->json([
            "message"=>"Logout"
        ]);
    }
}
