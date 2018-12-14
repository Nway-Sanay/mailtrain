<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MailList;
use App\User;

class TrainController extends Controller
{

	// public function __construct()
	// { 	
	// 	$this->middleware('auth');
	// }

    public function index()
    {	
        

    	return view('welcome');
        
    }

    public function inbox()
    {    	

        $user_id = auth()->id();

        $email = auth()->user()->email;

        $mails = MailList::where('user_id',$user_id)->where('is_draft',0)
                            ->orWhere([
                                ['to_email',$email],
                                ['is_draft',0]
                            ])
                            ->orderBy('send_date','desc')
                            ->paginate(10)
                            ;

        

        $drafts = MailList::where([
                                        ['user_id',$user_id],
                                        ['is_draft',1]
                                    ])
                            ->get();

    	return view('layouts.mail.inbox',compact('mails','drafts'));

    }

    public function compose_page()
    {       
        return view('layouts.mail.compose');
        
    }

    public function compose(Request $request)
    {       
        

        $to_email = $request->get('email');
        $body = $request->get('body');
        $send_date = \Carbon\Carbon::now()->toDateTimeString();
        $user_id = auth()->id();


        if ($request->has('draft')) {          

            $mail_list = MailList::create([
                'send_date' => $send_date,
                'to_email' => $to_email,
                'body' => $body,
                'user_id' => $user_id,
                'is_draft' => 1
            ]);

            return redirect()->to('/mail/draft');
        }

        if ($request->has('save')) {
            
            $this->validate(request(),[
                'email' => 'required|email|exists:users',
                'body' => 'required',
            ]);

            $mail_list = MailList::create([
                'send_date' => $send_date,
                'to_email' => $to_email,
                'body' => $body,
                'user_id' => $user_id
            ]);

            return redirect()->to('/mail/inbox');
        }


    }

    public function draft(Request $request)
    {       
        $user_id = auth()->id();

        $email = auth()->user()->email;

        $mails = MailList::where([
                                ['user_id',$user_id],
                                ['is_draft',1]
                            ])
                            ->orWhere([
                                ['to_email',$email],
                                ['is_draft',0]
                            ])
                            ->get();

        $drafts = MailList::where([
                                ['is_draft',1],
                                ['user_id',$user_id]
                            ])
                            ->paginate(10)
                            ;

        return view('layouts.mail.draft',compact('drafts','mails'));

    }

    public function detail($id)
    {
        $mail = MailList::where('id',$id)->first();

        if($mail->is_read == 0){
            $mail->is_read = 1;
            $mail->save();
        }

        return view('layouts.mail.detail',compact('mail'));
    }

    public function draft_detail($id)
    {
        dd($id);
    }

}
