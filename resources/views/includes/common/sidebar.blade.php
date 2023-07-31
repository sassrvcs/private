<!-- Brand Logo -->
<a href="{{ route('admin.dashboard') }}" class="brand-link">
    <img src="{{ asset('images/template-logo.svg') }}" alt="#" class="brand-image">
    <span class="brand-text font-weight-light">{{ Str::title(config('app.name')) }}</span>
</a>

<!-- Sidebar -->
<div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        {{-- <div class="image">
            <img src="{{asset('images/logo-icon.png')}}" class="img-circle elevation-2" alt="User Image">
        </div> --}}
        <div class="info">
            <a href="#" class="d-block">{{ Str::title(auth()->user()->full_name) }}</a>
            {{-- <span class="d-block text-muted"> Role :
                {{ Str::title(auth()->user()->getRoles()[0]) }}
            </span> --}}
        </div>
    </div>

    <!-- SidebarSearch Form -->
    <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class  with font-awesome or any other icon font library -->
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                        {{-- <span class="right badge badge-danger">New</span> --}}
                    </p>
                </a>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.package.*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link  {{ request()->routeIs('admin.package.*') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Packages
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                {{-- style="{{ request()->routeIs('admin.agent.*') ? ' display: block;' : 'display: none;' }}"" --}}
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.package.index')}}"
                            class="nav-link {{ request()->routeIs('admin.package.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.package.create')}}" class="nav-link {{ request()->routeIs('admin.package.create') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.addonservice.*') ? 'menu-is-opening menu-open' : '' }}">
                {{-- {{ request()->routeIs('admin.agent.*') ? ' active' : '' }} --}}
                <a href="#" class="nav-link ">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Add-on Services
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                {{-- style="{{ request()->routeIs('admin.agent.*') ? ' display: block;' : 'display: none;' }}"" --}}
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.addonservice.index')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.addonservice.create')}}" class="nav-link {{ request()->routeIs('admin.addonservice.create') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
            </li>

            <li class="nav-item {{ request()->routeIs('admin.business-banking.*') ? 'menu-is-opening menu-open' : '' }}">
                <a href="#" class="nav-link  {{ request()->routeIs('admin.business-banking.*') ? ' active' : '' }}">
                    <i class="nav-icon fas fa-graduation-cap"></i>
                    <p>
                        Business banking
                        <i class="right fas fa-angle-left"></i>
                    </p>
                </a>
                {{-- style="{{ request()->routeIs('admin.agent.*') ? ' display: block;' : 'display: none;' }}"" --}}
                <ul class="nav nav-treeview">
                    <li class="nav-item">
                        <a href="{{ route('admin.business-banking.index')}}"
                            class="nav-link {{ request()->routeIs('admin.business-banking.index') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>List</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('admin.business-banking.create')}}" class="nav-link {{ request()->routeIs('admin.business-banking.create') ? 'active' : '' }}">
                            <i class="far fa-circle nav-icon"></i>
                            <p>Add New</p>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
    <!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
