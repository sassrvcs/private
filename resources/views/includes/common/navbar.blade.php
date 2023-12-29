<!-- Left navbar links -->
<ul class="navbar-nav ">
  <li class="nav-item">
    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
  </li>

  {{-- <li class="nav-item d-none d-sm-inline-block">
    <a href="{{ route('admin.dashboard') }}" class="nav-link">Home</a>
  </li> --}}
  {{-- <li class="nav-item d-none d-sm-inline-block">
    <a href="#" class="nav-link">Contact</a>
  </li> --}}
</ul>

<!-- Right navbar links -->
<ul class="navbar-nav ml-auto docker-drop">
  <!-- Notifications Dropdown Menu -->
  {{-- @include('backend.admin.common.notification') --}}
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      {{-- <i class="far fa-bell"></i>
      <span class="badge badge-warning navbar-badge notification-count">{{ 0 }}</span> --}}
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
      <a href="#" class="dropdown-item" data-id="">
        <div class="media">
          <div class="media-body">
          <h3 class="dropdown-item-title" align="center">
            {{ 'There are no new notifications' }}
          </h3>
          <p class="text-sm"> </p>
          {{-- <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>  </p> --}}
          </div>
        </div>
      </a>
      <div class="dropdown-divider"></div>
      {{-- {{ route('admin.notification.index') }} --}}
    <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
  </div>

</li>
  <!-- Profile Dropdown Menu -->
  <li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#">
      <i class="far fa-user-circle"></i>
    </a>

    <div class="dropdown-menu dropdown-menu-right">
      <a href="#" class="dropdown-item d-none "><i class="fas fa-user"></i> My Profile</a>
      {{-- {{ route('admin.my-profile.index') }} --}}
      {{-- @if (auth()->user()->isA('dean')) --}}
      {{-- @endif --}}
      <a href="{{ route('admin.change-password.create') }}" class="dropdown-item"><i class="fas fa-key"></i> Change password</a>
      <a href="{{ route('logout') }}" class="dropdown-item"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>
  </li>
</ul>
