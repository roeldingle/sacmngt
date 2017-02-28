<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
    <h5>{{  $team->name or '---'  }}</h5>
  </div>
  <div class="widget-content">
    <div class="container-fluid">


      <div class="row">
       
        <div class="span12" style="margin-top:10px;padding:10px">

          <table class="table table-condensed">
            <tbody>

              <tr>
                <td style="border-top: none;">Name:</td>
                <td style="border-top: none;">{{  $team->name or '---'  }}</td>
              </tr>
              <tr>
                <td>Description :</td>
                <td>{{ $team->description or '---' }}</td>
              </tr>
              <tr>
                <td>Leader :</td>
                <td>

                @if(isset($team->leader->meta->fname) && isset($team->leader->meta->lname))
                {{ $team->leader->meta->fname or '---' }} {{ $team->leader->meta->lname or '---' }}
                @else
                {{ $team->leader->email }}
                @endif

                </td>
              </tr>
             
            </tbody>
          </table>

          <div class="pull-right">
            <a href="{{ route( 'team.index') }}" class="btn btn-warning btn-mini"><i class="icon-arrow-left"></i> Back to Team List</a> 
            <a href="{{ route( 'team.edit', ['id' => $team->id] ) }}" class="btn btn-info btn-mini">Edit this Team</a> 
          </div>
        </div>
      </div>
      
    </div>
    
  </div>
</div>