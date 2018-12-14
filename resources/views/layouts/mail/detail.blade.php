<!-- {{$mail}} -->

<p>From: {{$mail->user->email}} </p>

<p>At: {{$mail->send_date}} </p>

<p>Detail : {{$mail->body}} </p>

<p> <a href="{{route('mail.inbox')}}">back</a> </p>
