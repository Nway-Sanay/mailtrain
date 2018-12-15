<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MailList;
use App\User;
use App\Mail\TestMail;
use Mail;

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

        $mails = MailList::where([
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
        $draft = null;

        return view('layouts.mail.compose',compact('draft'));

    }

    public function compose($id=null,Request $request)
    {
        $to_email = $request->get('email');
        $body = $request->get('body');
        $send_date = \Carbon\Carbon::now()->toDateTimeString();
        $user_id = auth()->id();

        $sender_mail = auth()->user()->email;

        //save as a draft

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

        //send mail

        $this->validate(request(),[
            'email' => 'required|email|exists:users',
            'body' => 'required',
            'attach_file' => 'nullable|mimes:pdf|max:10000'
        ]);

        if ($request->has('save')) {

            // send from a draft

            if ($id) {
                MailList::where('id',$id)->update([
                                                    'send_date' => $send_date,
                                                    'to_email' => $to_email,
                                                    'body' => $body,
                                                    'user_id' => $user_id,
                                                    'is_draft'=> 0,
                                                    ]);
            }

            $file_name_to_store=null;

            if ($request->hasFile('attach_file')) {

                $file_name_with_ext = $request->file('attach_file')->getClientOriginalName();

                $file_name = pathinfo($file_name_with_ext,PATHINFO_FILENAME);

                $file_ext =  $request->file('attach_file')->getClientOriginalExtension();

                $file_name_to_store = $file_name."_".time().".".$file_ext;

                $path = $request->file('attach_file')->storeAs('public/attach_files',$file_name_to_store);

            }

            $mail_list = MailList::create([
                            'send_date' => $send_date,
                            'to_email' => $to_email,
                            'body' => $body,
                            'user_id' => $user_id,
                            'file_name' => $file_name_to_store,
                        ]);


            $content = [
                'sender_mail' => $sender_mail,
                'attach_file' => $file_name_to_store,
                'to_email' => $to_email,
                'body' => $body
            ];

            Mail::to($to_email)->send(new TestMail($content));

            return redirect()->to('/mail/inbox');

        }
    }

    public function draft(Request $request)
    {
        $user_id = auth()->id();

        $email = auth()->user()->email;

        $mails = MailList::where([
                                ['to_email',$email],
                                ['is_draft',0]
                            ])
                            ->get();

        $drafts = MailList::where([
                                ['is_draft',1],
                                ['user_id',$user_id]
                            ])
                            ->orderBy('send_date','desc')
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
        $draft = MailList::where('id',$id)->first();

        // dd($draft->body);

        return view('layouts.mail.compose',compact('draft'));

    }

    public function send_page()
    {

      $user_id = auth()->id();

      $email = auth()->user()->email;

      $mails = MailList::where([
                              ['to_email',$email],
                              ['is_draft',0]
                          ])->get()
                          
                          
                          ;

      $send_mails = MailList:: where('user_id',$user_id)->where('is_draft',0)
                           ->orderBy('send_date','desc')->paginate(10);

      $drafts = MailList::where([
                                ['user_id',$user_id],
                                ['is_draft',1]
                                  ])
                          ->get();

      // dd($send_mail);

      return view('layouts.mail.send_page',compact('mails','drafts','send_mails'));
    }

    public function search(Request $request)
    {
        if ($request->has('date_search')) {

             // $searches = MailList::where('send_date','like', '%'.$request->search.'%')
             //              ->get();

            $date =  \Carbon\Carbon::parse($request->search);

            $date = $date->addDay(2);

            dd($date." ".\Carbon\Carbon::parse($request->search));

            // return view('layouts.mail.search',compact('searches'));

        }

        if ($request->has('search')) {
            dd("search with textbox");
        }

        
    }

}
