<div class="widget-box">
  <div class="widget-title"> <span class="icon"> <i class="icon-info-sign"></i> </span>
    <h5>{{ (isset($user) && isset($user->meta) ) ? $user->meta->fname.' '.$user->meta->lname : $user->email }}</h5>
  </div>
  <div class="widget-content">
    <div class="container-fluid">

      <div class="row">
        <div class="span3">
          <img class="img-circle" src="{{ $user->getAvatar() }}"> 
        </div>
        <div class="span8" style="margin-top:10px;">
          <h4>{{ (isset($user) && isset($user->meta) ) ? $user->meta->fname.' '.$user->meta->lname : $user->email }}</h4>
          <span><i class="icon-envelope-alt"></i> &nbsp; {{ (isset($user) ) ? $user->email: '---' }}</span><br />
          <span><i class="icon-phone"></i> &nbsp; {{ (isset($user) && isset($user->meta) ) ? $user->meta->contact : '---' }}</span><br />
        </div>
      </div>

      <div class="row">
        <div class="span3"></div>
        <div class="span9" style="margin-top:10px">

          <table class="table table-condensed">
            <tbody>
              <tr>
                <td style="border-top: none;">Department:</td>
                <td style="border-top: none;">{{ isset($user) ? $user->department->description : '---' }}</td>
              </tr>
              <tr>
                <td>Team :</td>
                <td>{{ (isset($user) && isset($user->meta) && isset($user->meta->team) ) ? $user->meta->team->name : '---' }}</td>
              </tr>
              <tr>
                <td>Position :</td>
                <td>{{ (isset($user) && isset($user->meta->job) ) ? $user->meta->job->description : '---' }}</td>
              </tr>
              <tr>
                <td>Date Hired :</td>
                <td>{{ (isset($user) && isset($user->meta->date_hired) ) ? $user->meta->date_hired->format('F d, Y') : '---' }}</td>
              </tr>
              <tr>
                <td>Address</td>
                <td>{{ (isset($user) && isset($user->meta->address) ) ? $user->meta->address : '---' }}</td>
              </tr>
             
            </tbody>
          </table>

          <div class="pull-right">
            <a href="{{ route( 'user.index') }}" class="btn btn-warning btn-mini"><i class="icon-arrow-left"></i> Back to User List</a> 
            <a href="{{ route( 'user.edit', ['id' => $user->id] ) }}" class="btn btn-info btn-mini">Edit this User</a> 
          </div>
        </div>
      </div>
      
    </div>
    
        


  </div>
</div>