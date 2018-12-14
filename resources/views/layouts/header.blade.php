<div class="row">
	        <div class="col-sm-3 col-md-2">
	            <div class="btn-group">
	                <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
	                    Mail <span class="caret"></span>
	                </button>
	                <ul class="dropdown-menu" role="menu">
	                    <li><a href="{{route('home')}}">Home</a></li>
	                    <li><a href="#">{{auth()->user()->email}}</a></li>
	                    <li><a href="{{route('logout')}}">Logout</a></li>
	                </ul>
	            </div>
	        </div>
	        @yield('header')


</div>

	    <hr />