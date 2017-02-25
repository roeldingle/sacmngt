<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
    <h5>{{  $job->name or '---'  }}</h5>
  </div>
  <div class="widget-content">
    <div class="container-fluid">


      <div class="row">
       
        <div class="span12" style="margin-top:10px;padding:10px">

          <table class="table table-condensed">
            <tbody>

              <tr>
                <td style="border-top: none;">Name:</td>
                <td style="border-top: none;">{{  $job->name or '---'  }}</td>
              </tr>
              <tr>
                <td>Description :</td>
                <td>{{ $job->description or '---' }}</td>
              </tr>
             
            </tbody>
          </table>

          <div class="pull-right">
            <a href="{{ route( 'job.index') }}" class="btn btn-warning btn-mini"><i class="icon-arrow-left"></i> Back to Job List</a> 
            <a href="{{ route( 'job.edit', ['id' => $job->id] ) }}" class="btn btn-info btn-mini">Edit this Job</a> 
          </div>
        </div>
      </div>
      
    </div>
    
  </div>
</div>