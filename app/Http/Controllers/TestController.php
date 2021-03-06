<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\MailList;
use App\Location;

class TestController extends Controller
{
    public function test(Request $request){

      $email = $request->email;

      // \DB::enableQueryLog();



      $mails = MailList::UserMail($email)
                          ->with(['user'=>function($query){
                                            $query->select('id','email');
                                          }])
                          ->select(['send_date','to_email','body','id','user_id'])
                          ->get();

      	return response()->json($mails);
        // dd(\DB::getQueryLog());
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

      // \DB::enableQueryLog();

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

    public function manyTest()
    {
      $user = User::find(2);
      $user->locations()->attach(2);
      return $user;
    }

    // retreive user using location_name
    public function withUser(Location $location)
    {

        $user = $location->users;
        return response()->json($user);
        // return $user->pluck('city','email');

    }

    // retreive user using user_name along with the location
    public function withLocation(User $user)
    {
      return response()->json($user);
      // dd($user);
      // return $user->city;
    }
}
