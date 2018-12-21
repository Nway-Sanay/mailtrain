<!DOCTYPE html>
<html>
<head>
	<title>Compose</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

	

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h2>News Letter</h2>
				<hr>
				<form method="post" action="{{route('mail.pre_pdf')}}" enctype="multipart/form-data">


					@if ($errors->any())
					    <div>
					        <ul style="list-style: none;">
					            @foreach ($errors->all() as $error)
					                <li class="alert alert-danger">{{ $error }}</li>
					            @endforeach
					        </ul>
					    </div>
					@endif



					{{csrf_field()}}
				  <div class="form-group">
				    <label for="email">To Email address</label>
				    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">

				  </div>
				  <div class="form-group">
				    <label for="body">Body</label>
				    <textarea class="form-control" name='body' id="body" placeholder="type something...."></textarea>
				  </div>
				  <div class="form-group">
				    <input type="file" id="image" name="image">
				  </div>
				  <div class="form-check">
				  	<button type="submit" name="save" class="btn btn-primary">Export as PDF</button>
				  	
				  	<a href="{{url()->previous()}}" class="btn btn-secondary active" role="button" aria-pressed="true">Back</a>
				  </div>
				</form>
			</div>
		</div>
	</div>



	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

</body>
</html>