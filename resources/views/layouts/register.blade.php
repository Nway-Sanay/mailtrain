<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>

	

	<div class="container">
		<div class="row">
			<div class="col-sm-8">
				<h2>Register</h2>
				<hr>
				<form action="/register" method="POST">


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
				    <label for="email">Email address</label>
				    <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder="Enter email">
				  </div>
				  <div class="form-group">
				    <label for="Password">Password</label>
				    <input type="password" class="form-control" name="password" id="Password" placeholder="Password">
				  </div>
				  <div class="form-check">
				  	<button type="submit" class="btn btn-primary">Register</button>
				  	<a href="/login" class="btn btn-secondary active" role="button" aria-pressed="true">Login</a>
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