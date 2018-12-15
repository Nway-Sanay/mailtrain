<!-- {{$mail}} -->

<p>To: 
	@if($mail->to_email == auth()->user()->email)
	Me
	@else {{$mail->to_email}}
	@endif
</p>

<p>From: 
	@if($mail->user->email == auth()->user()->email)
	Me
	@else {{$mail->user->email}}
	@endif
</p>


<p>At: {{$mail->send_date}} </p>

<p>Detail : {{$mail->body}} </p>

@if($mail->file_name)
<p>Attachment : 

	<a href="/storage/attach_files/{{$mail->file_name}}">

	{{$mail->file_name}}

	</a>
</p>
@endif

<p> <a href="{{route('mail.inbox')}}">back</a> </p>
