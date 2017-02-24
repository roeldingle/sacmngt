<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
    <h5>{{  $role->name or '---'  }}</h5>
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
                <td style="border-top: none;">{{  $role->name or '---'  }}</td>
              </tr>
              <tr>
                <td>Description :</td>
                <td>{{ $role->description or '---' }}</td>
              </tr>
             
            </tbody>
          </table>

          <div class="pull-right">
            <a href="{{ route( 'role.index') }}" class="btn btn-warning btn-mini"><i class="icon-arrow-left"></i> Back to Role List</a> 
            <a href="{{ route( 'role.edit', ['id' => $role->id] ) }}" class="btn btn-info btn-mini">Edit this Role</a> 
          </div>
        </div>
      </div>
      
    </div>
    
  </div>
</div>