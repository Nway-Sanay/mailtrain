@extends('layouts.master')

@section('title','Send')

@section('header','Send')

@section('content')

    <div class="col-sm-9 col-md-10">

        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                @foreach($send_mails as $mail)
                    <div class="list-group">

						<a href="{{route('mail.read_detail',['id'=> $mail->id])}}" class="list-group-item read">

	                        <span class="name" style="min-width: 120px;display: inline-block;">

	                         {{$mail->to_email}}
	                        </span>

	                        <span class="text-muted" style="font-size: 11px;">{{$mail->body}}  </span>
	                        <span class="badge">{{$mail->send_date}}</span>
	                        <span class="pull-right">
								@if (!$mail->is_read)
								  <span class='account-active badge'>Unread</span>
								 @elseif($mail->is_read)
								  <span class='account-active badge'>Read</span>
								@endif
	                    	</span>



	                    </a>

                    </div>
                @endforeach
            </div>

        </div>


    </div>

    <div style="text-align: center;">

    	{{$mails->links()}}

    </div>

</div><!-- <= closing div tag from sidebar -->


@endsection
