<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#users" aria-expanded="true" aria-controls="users">
    <i class="fas fa-fw fa-cog"></i>
    <span>Users</span>
  </a>
  <div id="users" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
      <h6 class="collapse-header">Users</h6>
      <a class="collapse-item" href="{{ route('admin.users.index') }}">All Users</a>
      <a class="collapse-item" href="{{ route('admin.users.create') }}">Create User</a>
    </div>
  </div>
</li>