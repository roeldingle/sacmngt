@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Users'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'User Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Dashboard',
        'url' => '/user',
      ],
      [
      'title' => 'User Management',
      'url' => '/users',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
        
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>User List</h5>
            <a href="{{ route('user.create') }}" class="btn btn-primary btn-mini pull-right" style="margin:10px">New User</a>

            </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="10px"><input type="checkbox" class="checkall" name="checkall"/></th>
                  <th width="20px">#</th>
                  <th>Email</th>
                  <th>User Role</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @if(count($users) <= 0)
                  <tr role="row"><td colspan="8" style="text-align:center">No results found</td></tr>
                @else
                  @foreach($users as $index=>$row)
                   <tr>
                  <td style="text-align:center"><input type="checkbox" name="check" class="check" value="{{ $row->id }}"></td>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $row->email }}</td>
                  <td>{{ $row->role->name }}</td>
                  <td class="" style="text-align:center">
                    
                    <a href="{{ route( 'user.edit', ['id' => $row->id] ) }}" class="btn btn-info btn-mini">View</a> 
                    <a href="{{ route( 'user.show', ['id' => $row->id] ) }}" class="btn btn-success btn-mini">Edit</a> 
                  </td>
                </tr>
                  @endforeach
                @endif

              </tbody>
            </table>
          </div>

          <a href="#" id="delete-btn" class="btn btn-danger btn-mini" style="margin:10px">Delete</a>
        </div>
        <!--end widget box-->
        </div>
      </div>
    </div>
  </div>
@stop