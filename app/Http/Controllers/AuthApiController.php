<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function register(Request $request) {

        $valid = $request->validate([
            'name' => 'nullable|string',
            'phone' => 'required|unique:users',
            'address' => 'required|string',
        ]);

        $user = User::create([
            'name'=> $valid['name'],
            'phone'=> $valid['phone'],
            'address'=> $valid['address'],
            'email'=> 'a'.$valid['name'].'@gmail.com',
            'password'=>Hash::make(123456),
        ]);


        $token = $user->createToken('userToken')->plainTextToken;
       return response()->json([
            'message'=>'success',
            'users'=>$user,
            'token'=>$token,
        ],200);
    }

     public function login(Request $request) {
        $valid = $request->validate([
            'phone'=>'required'
        ]);

        $user = User::where('phone',$valid['phone'])->first();
       // $password = Hash::check($valid['password'], $user->password);
        if(!$user){
            return response()->json([
                    'message'=>'login problem'
                ]);
        }else{
        $token = $user->createToken('userToken')->plainTextToken;
            return response()->json([
                'message'=>'success',
                'user'=>$user,
                'token'=>$token,
            ]);
    }


    }

     public function logout() {
        auth()->user()->tokens()->delete();
        return response()->json(['message'=>'success']);
    }
}
