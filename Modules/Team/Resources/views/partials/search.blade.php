<!--search-->
<div class="search-wrap">
  <form method="GET" action="{{ route('team.index') }}" >
    <select name="search_param" required>
      <option value="">--Select--</option>
      <option value="name">Name</option>
      <!-- <option value="role_id">Role</option> -->
    </select>
    <input type="text" name="search" required placeholder="Search here...">
    <button type="submit" class="tip-bottom" data-original-title="Search"><i class="icon-search icon-white"></i></button>
  </form>
</div>
<!--end search-->