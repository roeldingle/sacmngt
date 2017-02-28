@extends('main.main')

@section('top-headermenu')
  @include('main.top-headermenu')
@stop

@section('sidemenu')
  @include('main.sidemenu',['main' => 'Admin Settings', 'sub' => 'Teams'])
@stop

@section('breadcrumbs')
  @include('main.breadcrumbs', ['title' => 'Team Management', 
  'breadcrumbs' => 
    [
      [ 'title' => 'Team Management',
        'url' => '/team',
      ]
    ]
  ])
@stop

@section('content')
    <div class="row-fluid">
      <div class="span12">
          
          @include('team::partials.search')
        <div class="widget-box">

          <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>Team List</h5>
            <a href="{{ route('team.create') }}" class="btn btn-primary btn-mini pull-right" style="margin:10px"><i class="icon-plus-sign"></i> Add New</a>

            </div>
          <div class="widget-content nopadding">
            
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="10px"><input type="checkbox" class="checkall" name="checkall"/></th>
                  <th width="20px">#</th>
                  <th>Department</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Leader</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>

                @if(count($teams) <= 0)
                  <tr class="row"><td colspan="8" style="text-align:center">No results found</td></tr>
                @else
                  @foreach($teams as $index=>$row)
                   <tr>
                  <td style="text-align:center"><input type="checkbox" name="check" class="check" value="{{ $row->id }}"></td>
                  <td>{{ $loop->iteration }}</td>
                  <td>{{ $row->department->name }}</td>
                  <td>{{ $row->name }}</td>
                  <td>{{ $row->description }}</td>
                  <td>

                    @if(isset($row->leader))
                      @if(isset($row->leader->meta->fname) && isset($row->leader->meta->lname))
                      {{ $row->leader->meta->fname. ' '.$row->leader->meta->lname }}
                      @else
                      {{ Modules\User\Entities\User::findOrFail($row->leader_id)->email }}
                      @endif
                    @else
                      ---
                    @endif


                  </td>
                  <td class="" style="text-align:center">
                    
                    <a href="{{ route( 'team.edit', ['id' => $row->id] ) }}" class="btn btn-info btn-mini">Edit</a> 
                    <a href="{{ route( 'team.show', ['id' => $row->id] ) }}" class="btn btn-success btn-mini">View</a> 
                  </td>
                </tr>
                  @endforeach
                @endif

              </tbody>
            </table>
          </div>
          <a href="#" id="delete-btn" class="btn btn-danger btn-mini" style="margin:10px"><i class="icon-minus-sign"></i> Delete</a>
          
          <br />
          <div class="pagination pagination-sm pull-right" >
            {!! $teams->appends(['search_param' => $search['search_param'], 'search' => $search['search'] ])->links() !!}
          </div>
        </div>
        <!--end widget box-->
        
        </div>
      </div>
    </div>
  </div>
@stop