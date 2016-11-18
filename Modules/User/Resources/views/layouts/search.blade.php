<div class="row">
	<div class="col-sm-6 col-md-6" style="padding-bottom:5px">

		<form method="GET" action="/user" >
		    <div class="input-group">
                <div class="input-group-btn search-panel">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                    	<span id="search_concept">Filter by</span> <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="#all">All</a></li>
                      <li><a href="#fname">Firstname</a></li>
                      <li><a href="#lname">Lastname</a></li>
                      <li><a href="#email">Email</a></li>
                      <li><a href="#role">Role</a></li>
                      <li><a href="#status">Status</a></li
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

