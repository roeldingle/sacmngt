<!--sidebar-menu-->
<div id="sidebar">

  <div style="padding:10px;color:#fff;background-color:#90228D;text-align:center">
    <img src="{{ Auth::user()->getAvatar() }}" class="img-circle" style="width:50px;"> <br>
      <span class="text">

        @if(isset(Auth::user()->meta))
        {{ Auth::user()->meta->fname }} {{ Auth::user()->meta->lname }}
        @else
        {{ Auth::user()->email }}
        @endif


      </span><br>
      <span style="font-size:10px">{{ Auth::user()->role->name }}</span>
  </div>
  <a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class="@if($main == 'Dashboard')  active  @endif"><a href="/dashboard"><i class="icon icon-dashboard"></i> <span>Dashboard</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-trophy"></i> <span>My SAC Pins</span></a> </li>
    <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>IT Support</span></a> </li>
    <li> <a href="charts.html"><i class="icon icon-paper-clip"></i> <span>HR Support</span></a> </li>
    <li class="submenu @if($main == 'Admin Settings')  active open  @endif"> <a href="#"><i class="icon icon-cogs"></i> <span>Admin Settings</span> <span class="label label-important">5</span></a>
      <ul>
        <li class="@if($sub == 'Users') active  @endif"><a href="{{ route('user.index') }}"><i class="icon icon-user"></i> Users Management</a></li>
        <li class="@if($sub == 'Jobs') active  @endif"><a href="{{ route('job.index') }}"><i class="icon icon-copy"></i> Jobs Management</a></li>
        <li class="@if($sub == 'Teams') active  @endif"><a href="{{ route('team.index') }}"><i class="icon icon-group"></i> Teams Management</a></li>
        <li class="@if($sub == 'Departments') active  @endif"><a href="{{ route('department.index') }}"><i class="icon icon-briefcase"></i> Departments Management</a></li>
        <li class="@if($sub == 'Roles') active  @endif"><a href="{{ route('role.index') }}"><i class="icon icon-copy"></i> Roles Management</a></li>
      </ul>
    </li>
    
  </ul>
</div>
<!--sidebar-menu-->