<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
    <img src="{{auth()->user()->image_path}}" alt="Logo" class="brand-image img-circle elevation-3"
         style="opacity: .8">
    <span class="brand-text font-weight-light">{{env('APP_NAME')}}</span>
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
              Inicio
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="{{ url('/admin/users') }}" class="nav-link {{($section == 'user')?'active':''}}">
            <i class="nav-icon fas fa-users"></i>
            <p>
              {{ucfirst(trans('common.users'))}}
            </p>
          </a>
        </li>
        <li class="nav-item has-treeview menu-open">
          <a href="{{ url('/admin/registers') }}" class="nav-link {{($section == 'register')?'active':''}}">
            <i class="nav-icon fas fa-globe"></i>
            <p>
              {{ucfirst(trans('common.web_registers'))}}
            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>