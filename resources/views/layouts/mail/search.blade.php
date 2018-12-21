<!-- {{$searches}} -->

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">


<div class="container">
	<div class="row">
		<table class="table">
		  <thead>
		    <tr>
		      <th scope="col">#</th>
		      <th scope="col">To Email</th>
		      <th scope="col">Body</th>
		      <th scope="col">Send_date</th>
		    </tr>
		  </thead>
		  <tbody>
		  	@foreach($searches as $key => $search)
		    <tr>
		      <th scope="row">{{$key+1}}</th>
		      <td>{{$search->to_email}}</td>
		      <td>{{$search->body}}</td>
		      <!-- <td>{{$search->send_date}}</td> -->
		       <td>{{Carbon\Carbon::parse($search->send_date)->diffForHumans()}}</td>
		    </tr>
		    @endforeach
		  </tbody>
		</table>
	</div>
	<a href="{{route('mail.inbox')}}" class="btn btn-primary active" role="button" aria-pressed="true">Return to inbox</a>
</div>