<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
class TestController extends Controller
{
    public function test(Request $request){
      	$user =	User::create($request->all());
		return response()->json($user);
    }
}
