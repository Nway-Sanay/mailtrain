<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MailList;
class TestController extends Controller
{
    public function test(Request $request){

      $email = $request->email;

      \DB::enableQueryLog();



      $mails = MailList::UserMail($email)
                          ->with(['user'=>function($query){
                                            $query->select('id','email');
                                          }])
                          ->select(['send_date','to_email','body','id','user_id'])
                          ->get();

      	// return response()->json($mails);
        dd(\DB::getQueryLog());
    }

    public function desc(Request $request)
    {
      // $mails = MailList::
      //           // join('users','mail_lists.user_id','=','users.id')
      //           // ->orderBy('users.email','asc')
      //           select('users.id','users.email','mail_lists.send_date','mail_lists.to_email','mail_lists.body','mail_lists.id')
      //
      //           ->get()
      //           ;

      \DB::enableQueryLog();

      $mails = MailList::select(['send_date','to_email','body','id','user_id'])
                        ->with(['user'=>function($query){
                            $query->select('id','email');
                          }])
                        // ->toSql()
                        ->get();

      // $mails = MailList::find(1);

      // return $mails->fromemail;

      return response()->json(['data'=>$mails],200);

      // dd(\DB::getQueryLog());
    }
}
