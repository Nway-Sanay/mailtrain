<p>{{$to_email}}</p>
<p>{{$body}}</p>

<img src="{{route('image',$image)}}">

<a href="{{route('mail.make_pdf',['email' => $to_email,'body' => $body,'image' => $image])}}">Save PDF</a>

<a href="{{url()->previous()}}">Back</a>