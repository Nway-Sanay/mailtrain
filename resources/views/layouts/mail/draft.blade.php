@extends('layouts.master')

@section('title','Draft')

@section('header','Draft')
	    
@section('content')


    <div class="col-sm-9 col-md-10">

        <!-- Tab panes -->
        <div class="tab-content">
            <div class="tab-pane fade in active" id="home">
                <div class="list-group">

                    @foreach($drafts as $draft)
                        <a href="#" class="list-group-item read">
                            
                            <span class="name" style="min-width: 120px;display: inline-block;"> To: {{$draft->to_email}} </span> 
                            
                            <span class="text-muted" style="font-size: 11px;">{{$draft->body}}  </span> 
                            <span class="badge">{{$draft->send_date}}</span> 
                            <span class="pull-right">
                            	<span class="badge">Draft</span>
                        	</span>
                        </a>
                    @endforeach

                </div>
            </div>
          
        </div>
    	
        
    </div>


    <div style="text-align: center;">

    	{{$drafts->links()}}

    </div>

</div><!-- <= closing div tag from sidebar -->

@endsection