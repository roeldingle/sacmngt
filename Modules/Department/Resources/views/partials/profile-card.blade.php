<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
    <h5>{{  $department->name or '---'  }}</h5>
  </div>
  <div class="widget-content">
    <div class="container-fluid">


      <div class="row">
        <div class="span2"></div>
        <div class="span10" style="margin-top:10px">

          <table class="table table-condensed">
            <tbody>

              <tr>
                <td style="border-top: none;">Name:</td>
                <td style="border-top: none;">{{  $department->name or '---'  }}</td>
              </tr>
              <tr>
                <td>Description :</td>
                <td>{{ $department->description or '---' }}</td>
              </tr>
             
            </tbody>
          </table>

          <div class="pull-right">
            <a href="{{ route( 'department.index') }}" class="btn btn-warning btn-mini"><i class="icon-arrow-left"></i> Back to Department List</a> 
            <a href="{{ route( 'department.edit', ['id' => $department->id] ) }}" class="btn btn-info btn-mini">Edit this Department</a> 
          </div>
        </div>
      </div>
      
    </div>
    
  </div>
</div>