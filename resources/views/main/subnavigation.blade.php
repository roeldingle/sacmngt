<div class="navbar navbar-default" style="left:0" id="subnav">
    <div class="col-md-12">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse2">
          <i class="fa fa-list" aria-hidden="true"></i>
        </button>
        
        <div class="collapse navbar-collapse" id="navbar-collapse2">
          <ul class="nav navbar-nav navbar-right">
            <li class="">
              <a href="{{ route('dashboard') }}">Dashboard</a>
             </li>
            
             @if(Auth::user()->role->id == 1 )
             <li>
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                System Settings <span class="caret"></span>
              </a>
                <ul class="dropdown-menu">
                  <li><a href="/user"><i class="fa fa-users" aria-hidden="true"></i> &nbsp;Users</a></li>
                  <li><a href="/role"><i class="fa fa-address-card-o" aria-hidden="true"></i> &nbsp;Roles</a></li>
                  <li><a href="/department"><i class="fa fa-building-o" aria-hidden="true"></i> &nbsp;Department</a></li>
                </ul>
            </li>
            @endif()

           </ul>
        </div>	
     </div>	
</div>