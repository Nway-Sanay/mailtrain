<!DOCTYPE html>
<html>
<head>
	<title>@yield('title')</title>

	<!-- <link rel="stylesheet" type="text/css" href="mail.css"> -->

	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

	<style type="text/css">
		
		body{ margin-top:50px;}
		.nav-tabs .glyphicon:not(.no-margin) { margin-right:10px; }
		.tab-pane .list-group-item:first-child {border-top-right-radius: 0px;border-top-left-radius: 0px;}
		.tab-pane .list-group-item:last-child {border-bottom-right-radius: 0px;border-bottom-left-radius: 0px;}
		.tab-pane .list-group .checkbox { display: inline-block;margin: 0px; }
		.tab-pane .list-group input[type="checkbox"]{ margin-top: 2px; }
		.tab-pane .list-group .glyphicon { margin-right:5px; }
		.tab-pane .list-group .glyphicon:hover { color:#FFBC00; }
		a.list-group-item.read { color: #222;background-color: #F3F3F3; }
		hr { margin-top: 5px;margin-bottom: 10px; }
		.nav-pills>li>a {padding: 5px 10px;}

		.ad { padding: 5px;background: #F5F5F5;color: #222;font-size: 80%;border: 1px solid #E5E5E5; }
		.ad a.title {color: #15C;text-decoration: none;font-weight: bold;font-size: 110%;}
		.ad a.url {color: #093;text-decoration: none;}

	</style>

</head>
<body>

	<div class="container">

		@include('layouts.header')
		
		@include('layouts.sidebar')

		@yield('content')

	</div>


	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.3/js/bootstrap.min.js"></script>

</body>
</html>