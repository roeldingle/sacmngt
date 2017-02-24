<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> Dashboard</a>
  <ul>
    <li class=""><a href="index.html"><i class="icon icon-dashboard"></i> <span>Dashboard</span></a> </li>
    <li> <a href="widgets.html"><i class="icon icon-trophy"></i> <span>My SAC Pins</span></a> </li>
    <li> <a href="charts.html"><i class="icon icon-signal"></i> <span>IT Support</span></a> </li>
    <li> <a href="charts.html"><i class="icon icon-paper-clip"></i> <span>HR Support</span></a> </li>
    <li class="submenu @if($main == 'Admin Settings')  active open  @endif"> <a href="#"><i class="icon icon-cogs"></i> <span>Admin Settings</span> <span class="label label-important">3</span></a>
      <ul>
        <li class="@if($sub == 'Users') active  @endif"><a href="{{ route('user.index') }}"><i class="icon icon-user"></i> Users Management</a></li>
        <li class="@if($sub == 'Roles') active  @endif"><a href="{{ route('role.index') }}"><i class="icon icon-copy"></i> Roles Management</a></li>
        <li class="@if($sub == 'Teams') active  @endif"><a href="{{ route('team.index') }}"><i class="icon icon-group"></i> Teams Management</a></li>
        <li class="@if($sub == 'Departments') active  @endif"><a href="{{ route('department.index') }}"><i class="icon icon-briefcase"></i> Departments Management</a></li>
      </ul>
    </li>
    
  </ul>
</div>
<!--sidebar-menu-->