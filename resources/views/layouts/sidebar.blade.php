<div class="row">

	    	<!-- sidebar -->
    <div class="col-sm-3 col-md-2">

        <a href="{{route('mail.compose_page')}}" class="btn btn-danger btn-sm btn-block" role="button">COMPOSE</a>

        <hr />

        <ul class="nav nav-pills nav-stacked">
            <li>
            	<a href="{{route('mail.inbox')}}">
            		<span class="badge pull-right">{{$mail_count}}</span> Inbox
            	</a>
            </li>
            <li><a href="{{route('mail.send_page')}}">Sent Mail</a></li>
            <li><a href="{{route('mail.draft_page')}}"><span class="badge pull-right">{{$draft_count}}</span>Drafts</a></li>
            <li><a href="{{route('mail.news_letter_page')}}"><span class="badge pull-right"></span>News Letter</a></li>
        </ul>

    </div>
