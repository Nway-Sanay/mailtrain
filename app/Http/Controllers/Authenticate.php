<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Validator;


class Authenticate extends Controller
{
    //
    public function login(Request $request)
    {
    	$credentials = $request->only('email','password');
    	$rules = [
    		'email' => 'required|email',
    		'password' => 'required|min:5'
    	];
    	$validator = Validator::make($credentials, $rules);
    	if ($validator->fails()) {
    		return response()->json([
    			'status' => 'Error',
    			'message' => $validator->message()
    		]);
    	}

    	try{

    		if (!$token = JWTAuth::attempt($credentials)) {
    			return response()->json([
    				'status' => 'Error',
    				'message' => 'Cannot find account'
    			],401);
    		}

    	}catch(JWTException $e){
    		return response()->json([
    			'status' => 'Error',
    			'message' => 'Cannot login'
    		]);
    	}

    	return response()->json([
    		'status' => 'Success',
    		'data' =>[
    			'token' => $token,
    		]
    	]);
    }

    public function logout(Request $request)
    {
    	$token = $request->header('Authorization');

    	try {
    		JWTAuth::invalidate($token);
    		return response()->json([
    			'status' => 'Success',
    			'message' => 'Logged out'
    		]);
    	} catch (JWTException $e) {
    		return response()->json([
    			'status' => 'Error',
    			'message' => 'Cannot Log out'
    		],500);
    	}
    }
}
