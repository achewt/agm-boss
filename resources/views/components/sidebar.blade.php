<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('home') }}">{{ env('APP_NAME') }}</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="active"><a class="nav-link" href="{{ route('home') }}"><i class="far fa-square"></i> <span>Dashboard</span></a></li>

              <li class="menu-header">Starter</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Layout</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="layout-default.html">Default Layout</a></li>
                  <li><a class="nav-link" href="layout-transparent.html">Transparent Sidebar</a></li>
                  <li><a class="nav-link" href="layout-top-navigation.html">Top Navigation</a></li>
                </ul>
              </li>
              
              <li class="menu-header">Access Management</li>
              <li><a class="nav-link" href="{{ route('view-users') }}"><i class="fas fa-pencil-ruler"></i> <span>User</span></a></li>
              <li><a class="nav-link" href="{{ route('view-roles') }}"><i class="fas fa-pencil-ruler"></i> <span>Role</span></a></li>
              <li><a class="nav-link" href="{{ route('view-users') }}"><i class="fas fa-pencil-ruler"></i> <span>Employee</span></a></li>
            </ul>
        </aside>
      </div>