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
	        


			<div class="col-sm-9 col-md-10">
            <!-- Split button -->
            	@yield('header')
	           
	           <form action="{{route('mail.search')}}" method="post"> 
				  <!-- <div class="row"> -->
				  	{{csrf_field()}}
				    <div class="col-xs-6 col-md-4 pull-right">
				      <div class="input-group">
				        <input type="text" class="form-control" placeholder="Search..." name="search" id="search"/>
				        <div class="input-group-btn">
				          <button class="btn btn-primary" name="search" type="submit">
				            <span class="glyphicon glyphicon-search"></span>
				          </button>
				        </div>
				      </div>
				    </div>
				    <div class="col-xs-6 col-md-4 pull-right">
				      <div class="input-group">
				        <input type="date" class="form-control" placeholder="Search..." name="search" id="search"/>
				        <div class="input-group-btn">
				          <button class="btn btn-primary" name="date_search" type="submit">
				            <span class="glyphicon glyphicon-search"></span>
				          </button>
				        </div>
				      </div>
				    </div>
				  <!-- </div> -->
				</form>

	        </div>


</div>

	    <hr />