<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MailList;
use App\User;
use App\Mail\TestMail;
use Mail;
use App\News_letter;

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

    public function mail_count()
    {

        $email = auth()->user()->email;

        $mail_count = MailList::where([
                                ['to_email',$email],
                                ['is_draft',0]
                            ])
                            ->count();

        return $mail_count;

    }

    public function draft_count()
    {
        $user_id = auth()->id();

        $draft_count = MailList::where([
                                        ['user_id',$user_id],
                                        ['is_draft',1]
                                    ])
                            ->count();

        return $draft_count;
    }

    public function inbox()
    {

        // $user_id = auth()->id();

        $email = auth()->user()->email;

        $mails = MailList::where([
                                ['to_email',$email],
                                ['is_draft',0]
                            ])
                            ->orderBy('send_date','desc')
                            ->with('user')
                            ->get()
                            ;

        $mail_count = $this->mail_count();

        $draft_count = $this->draft_count();

        // dd($draft_count);

        return $mails;

    	// return view('layouts.mail.inbox',compact('mails','drafts','mail_count','draft_count'));

    }

    public function compose_page()
    {
        $draft = null;

        return view('layouts.mail.compose',compact('draft'));

    }

    public function compose(Request $request)
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
            if ($request->id) {
                $draft = MailList::where('id',$request->id)->update([
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


        $drafts = MailList::where([
                                ['is_draft',1],
                                ['user_id',$user_id]
                            ])
                            ->orderBy('send_date','desc')
                            ->paginate(10)
                            ;

        $mail_count = $this->mail_count();

        $draft_count = $this->draft_count();

        return $drafts;

        // return view('layouts.mail.draft',compact('drafts','mails','mail_count','draft_count'));

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

        return view('layouts.mail.compose',compact('draft'));

    }

    public function send_page()
    {

      $user_id = auth()->id();

      $email = auth()->user()->email;


      $send_mails = MailList:: where('user_id',$user_id)->where('is_draft',0)
                           ->orderBy('send_date','desc')->paginate(10);


        $draft_count = $this->draft_count();

        $mail_count = $this->mail_count();

      return view('layouts.mail.send_page',compact('mails','drafts','send_mails','mail_count','draft_count'));
    }


    // Search
    public function search(Request $request)
    {
        // if ($request->has('date_search')) {
        //
        //     $this->validate(request(),[
        //     'from_date_search' => 'required',
        //     'to_date_search' => 'required'
        //     ]);
        //
        //      $searches = MailList::whereBetween('send_date',
        //                             [$request->from_date_search,
        //                             $request->to_date_search])
        //                   ->get();
        //
        //     // $date =  \Carbon\Carbon::parse($request->search);'like', '%'.$request->search.'%'
        //
        //     // $from_date = \Carbon\Carbon::parse($request->from_date_search);
        //     // $to_date = \Carbon\Carbon::parse($request->to_date_search);
        //
        //     // dd($searches);
        //
        //     return view('layouts.mail.search',compact('searches'));
        //
        // }
        // textbox search
        // if ($request->has('search')) {
        //
        //     $searches = MailList::where('to_email','like', '%'.$request->text_search.'%')
        //                     ->orWhere('body','like', '%'.$request->text_search.'%')
        //                   ->get();
        //
        //     return view('layouts.mail.search',compact('searches'));
        //
        // }

        // if ($search = $request->query('query')) {
        //   // code...
        //   $searches = MailList::where('to_email','like', '%'.$search.'%')
        //   ->orWhere('body','like', '%'.$search.'%')
        //   ->get();
        // }

        $user_id = auth()->id();

        $email = auth()->user()->email;

        $search = $request->get('q');

        if ($search) {
          // code...
          $mails = MailList::
          where('to_email','like', '%'.$search.'%')
          ->orWhere([
            ['body','like', '%'.$search.'%'],
          ])
          ->where(function ($query)
          {

            $email = auth()->user()->email;

            $user_id = auth()->id();

            $query ->where('to_email',$email)->orWhere('user_id',$user_id);
          })
          ->with('user')
          ->get();

          return $mails;
        }

        $mails = MailList::where([
                                ['to_email',$email],
                                ['is_draft',0]
                            ])
                            ->orderBy('send_date','desc')
                            ->with('user')
                            ->get()
                            ;

        return $mails;

    }

    public function news_letter_page()
    {
        // dd('news_letter');

        return view('layouts.mail.news_letter');
    }

    public function preview_pdf(Request $request)
    {

        $send_date = \Carbon\Carbon::now()->toDateTimeString();

        $img_name_to_store=null;

            if ($request->hasFile('image')) {

                $img_name_with_ext = $request->file('image')->getClientOriginalName();

                $img_name = pathinfo($img_name_with_ext,PATHINFO_FILENAME);

                $img_ext =  $request->file('image')->getClientOriginalExtension();

                $img_name_to_store = $img_name."_".time().".".$img_ext;

                $path = $request->file('image')->storeAs('images',$img_name_to_store);

            }

        // $news_letter = News_letter::create([
        //         'send_date' => $send_date,
        //         'to_email' => $request->get('email'),
        //         'body' => $request->get('body'),
        //         'image' => $img_name_to_store
        //     ]);


        $to_email = $request->get('email');
        $body = $request->get('body');
        $image = $img_name_to_store;
        // $image = \Storage::exists('images/'.$img_name_to_store);

         // dd($image);

        return view('layouts.mail.preview_pdf',compact('to_email','body','image'));
    }

    public function make_pdf(Request $request)
    {
        $to_email = $request->get('email');
        $body = $request->get('body');
        $image = $request->get('image');

        $pdf = \PDF::loadView('layouts.mail.save_pdf', compact('to_email','body','image'));
        return $pdf->download('invoice.pdf');

        // dd('make');
    }

    public function get_image($image)
    {

        $path = storage_path().'/app/images/'.$image;

        if(!File::exists($path)){
            abort(404);
        }

        $file = File::get($path);
        $type = File::mimeType($path);

        $response = Response::make($file,200);
        $response -> header("Content-Type" , 200);
        return $response;
    }


}
