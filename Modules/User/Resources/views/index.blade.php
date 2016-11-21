@extends('base::layouts.master')


@section('content')

    @include('base::layouts.navigation')
    <div class="clearfix"></div>
    @include('base::layouts.subnavigation')
    <!--main-->
    <div class="container-fluid" id="main">

       <div class="row">

          @include('base::layouts.left-profile')

          <!--center-->
        	<div class="col-sm-9 col-md-9">

              @include('base::layouts.alert')
            	 
              	<ol class="breadcrumb">
				  <li><a href="#">Home</a></li>
				  <li><a href="#">Library</a></li>
				  <li class="active">Data</li>
				</ol>

                <div class="panel panel-default">
                  <div class="panel-heading">
	                <h3>User List  <a class="btn btn-sm btn-primary btn-create pull-right" href="{{ route('user.create') }}">Create New</a></h3>
                  </div>

                  <div class="panel-body" style="padding-top:0">

              		@include('user::layouts.search')

                        <table class="table table-striped table-bordered table-list">
						    <thead>
						      <tr>
						      	<th width="5%"><input type="checkbox" name="check-all" class="check-all"></th>
						      	<th width="5%">#</th>
						        <th>Firstname</th>
						        <th>Lastname</th>
						        <th>Email</th>
						        <th>Role</th>
						        <th idth="5%">Action</th>
						      </tr>
						    </thead>
						    <tbody>
						    	
						    	@if(count($users) <= 0)
					                <tr role="row"><td colspan="8" style="text-align:center">No results found</td></tr>
					              @else

					                @foreach($users as $index=>$row)
					                
					                 <tr>
								      	<td><input type="checkbox" name="check" class="check"></td>
								      	<td>{{ $loop->iteration }}</td>
								        <td>{{ $row->setMeta()->fname }}</td>
								        <td>{{ $row->setMeta()->lname }}</td>
								        <td>{{ $row->email }}</td>
								        <td>{{ $row->role->name }}</td>
								        <td class="">
								      	<a href="{{ route( 'user.show', ['id' => $row->id] ) }}">View</a> |
					                      <a href="{{ route( 'user.edit', ['id' => $row->id] ) }}">Edit</a> 
					                    </td>
								      </tr>
							      
					                @endforeach


					              @endif
					          	

						    </tbody>
						  </table>

						  <div>
						  	<button type="button" class="btn btn-sm btn-danger btn-delete">Delete item(s)</button>
						 </div>

                  </div>

                  <div class="panel-footer">
	                <div class="row">
	                  <div class="col col-xs-4">
	                  	<p>{{ $users->total() }} result(s)</p>
	                  	Page {{ $users->currentPage() }} of {{ $users->lastPage() }}
	                  </div>
	                  <div class="col col-xs-8" style="text-align:right">
	                    {!! $users->appends(['search_param' => $search['search_param'], 'search' => $search['search'] ])->links() !!}
	                  </div>
	                </div>
	              </div>


                </div>
          </div>
          <!--/center-->

      </div><!--/row-->
      
      @include('base::layouts.footer')
      
    </div><!--/main-->
@stop


