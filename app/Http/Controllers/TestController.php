<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MailList;
class TestController extends Controller
{
    public function test(Request $request){

      $email = $request->email;

      $mails = MailList::UserMail($email)
                          ->get();

      	return response()->json($mails);
    }
}
