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
	                <h3>User List  <button type="button" class="btn btn-sm btn-primary btn-create pull-right">Create New</button></h3>
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
						        <th idth="5%">Status</th>
						      </tr>
						    </thead>
						    <tbody>

						    	@if(count($users) <= 0)
					                <tr role="row"><td colspan="6">No results found</td></tr>
					              @else

					                @foreach($users as $index=>$row)
					                 <tr>
								      	<td><input type="checkbox" name="check" class="check"></td>
								      	<td>1</td>
								        <td>{{ $row->getUserMeta()->fname }}</td>
								        <td>{{ $row->getUserMeta()->lname }}</td>
								        <td>{{ $row->email }}</td>
								        <td>{{ $row->role->name }}</td>
								        <td>{!! ($row->is_active) ? '<span class="label label-success">active</span>' : '<span class="label label-default">inactive</span>' !!}</td>
								      </tr>
					                 @endforeach

					              @endif

						    </tbody>
						  </table>

                  </div>

                  <div class="panel-footer">
	                <div class="row">
	                  <div class="col col-xs-4">Page 1 of 5
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


