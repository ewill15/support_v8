<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="{{asset('img/no-image.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="block m-t-xs font-bold mt-2 text-center">
      {{ env('APP_NAME') }}
    </span>
    <span class="text-muted text-xs block mt-2 text-center">
      {{ auth()->user()->role }} 
      <b class="caret"></b>
    </span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview menu-open">
          <a href="{{ url('/admin/dashboard') }}" class="nav-link {{($section == 'dashboard')?'active':''}}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{ ucfirst(trans('common.home')) }}
            </p>
          </a>
        </li>
        <!--------- Menu personal, provider and client  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/users') }}" class="nav-link {{($section == 'users')?'active':''}}">
            <i class="fas fa-users mr-2"></i>
            <p>
              {{ ucfirst(trans('common.users')) }}
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/colors') }}" class="nav-link {{($section == 'colors')?'active':''}}">
            <i class="fas fa-palette mr-2"></i>
            <p>
              {{ ucfirst(trans('common.colors')) }}
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/countries') }}" class="nav-link {{($section == 'countries')?'active':''}}">
            <i class="fas fa-globe mr-2"></i>
            <p>
              {{ ucfirst(trans('common.countries')) }}
            </p>
          </a>
        </li>
        
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/foods') }}" class="nav-link {{($section == 'foods')?'active':''}}">
            <i class="fas fa-hamburger mr-2"></i>
            <p>
              {{ ucfirst(trans('common.foods')) }}
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/fruits') }}" class="nav-link {{($section == 'fruits')?'active':''}}">
            <i class="fas fa-lemon mr-2"></i>
            <p>
              {{ ucfirst(trans('common.fruits')) }}
            </p>
          </a>
        </li>

        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/gusers') }}" class="nav-link {{($section == 'foods')?'active':''}}">
            <i class="fas fa-users"></i>
            <p>
              {{ ucfirst(trans('common.gusers')) }}
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>