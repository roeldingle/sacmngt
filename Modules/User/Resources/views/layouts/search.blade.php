<div class="row">
<div class="col-sm-8 col-md-8" style="padding: 5px 0 5px 15px;">
  
    @if(Request::has('search_param') || Request::has('search'))
      <strong>Search by: {{ Request::input('search_param') }} -> {{ Request::input('search') }}</strong>
    @endif


  </div>
	<div class="col-sm-4 col-md-4" style="padding-bottom:5px">

		<form method="GET" action="/user" >
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Search by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#all">All</a></li>
                      <li><a href="#fname">Firstname</a></li>
                      <li><a href="#lname">Lastname</a></li>
                      <li><a href="#email">Email</a></li>
                    </ul>
                </div>
                <input type="hidden" name="search_param" value="all" id="search_param">         
                <input type="text" class="form-control" name="search" placeholder="Search term...">
                <span class="input-group-btn">
                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                </span>

                
            </div>
		</form>

    

	</div>


</div>

<!-- <div class="row">
    <div class="col-sm-11 col-md-11" style="padding: 5px 0 5px 15px;">
      <strong>
        @if(Request::has('search_param') || Request::has('search'))
          Search by: {{ Request::input('search_param') }} -> {{ Request::input('search') }} <span class="pull-right"> {{ $users->total() }} result(s) </span>
        @endif
      </strong>

    </div>
  </div> -->

