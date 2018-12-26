<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Validator;


class Authenticate extends Controller
{

     // public function __construct()	  {
     //   $this->middleware('auth:api', ['except' => ['login']]);
     // }

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

        $token = JWTAuth::attempt($credentials);

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
        	// $token = $request->header('Authorization');

          $token =JWTAuth::getToken();
          // return $token;
          // $token = $request->bearerToken();
          //
          if(!$token){
            return response()->json([
        			'status' => 'Fail',
        			'message' => 'token not found'
        		]);
          }

        	try {
        		JWTAuth::invalidate(JWTAuth::getToken());
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
//
//       // Auth::guard('api')->logout();
//
//       $this->guard()->logout();
//
//       return response()->json(['success' => true, 'message' => 'Successfully logged out'], 200);
//
//     }
//
//
//     // public function __construct()
//     // {
//     //     $this->middleware('auth:api', ['except' => ['login']]);
//     // }
//     //
//     // /**
//     //  * Get a JWT via given credentials.
//     //  *
//     //  * @return \Illuminate\Http\JsonResponse
//     //  */
//     // public function login()
//     // {
//     //     $credentials = request(['email', 'password']);
//     //
//     //     if (! $token = auth()->attempt($credentials)) {
//     //         return response()->json(['error' => 'Unauthorized'], 401);
//     //     }
//     //
//     //     return $this->respondWithToken($token);
//     // }
//     //
//     // /**
//     //  * Get the authenticated User.
//     //  *
//     //  * @return \Illuminate\Http\JsonResponse
//     //  */
//     // public function me()
//     // {
//     //     return response()->json(auth()->user());
//     // }
//     //
//     // /**
//     //  * Log the user out (Invalidate the token).
//     //  *
//     //  * @return \Illuminate\Http\JsonResponse
//     //  */
//     // public function logout()
//     // {
//     //     auth()->logout();
//     //
//     //     return response()->json(['message' => 'Successfully logged out']);
//     // }
//     //
//     // /**
//     //  * Refresh a token.
//     //  *
//     //  * @return \Illuminate\Http\JsonResponse
//     //  */
//     // public function refresh()
//     // {
//     //     return $this->respondWithToken(auth()->refresh());
//     // }
//     //
//     // /**
//     //  * Get the token array structure.
//     //  *
//     //  * @param  string $token
//     //  *
//     //  * @return \Illuminate\Http\JsonResponse
//     //  */
//     // protected function respondWithToken($token)
//     // {
//     //     return response()->json([
//     //         'access_token' => $token,
//     //         'token_type' => 'bearer',
//     //         'expires_in' => auth()->factory()->getTTL() * 60
//     //     ]);
//     // }
//
// }
