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
        <!--------- Menu user  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/users') }}" class="nav-link {{($section == 'users')?'active':''}}">
            <i class="fas fa-users mr-2"></i>
            <p>
              {{ ucfirst(trans('common.users')) }}
            </p>
          </a>
        </li>

        <!--------- Menu banks  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/banks') }}" class="nav-link {{($section == 'banks')?'active':''}}">
            <i class="fas fa-piggy-bank mr-2"></i>
            <p>
              {{ ucfirst(trans('common.banks')) }}
            </p>
          </a>
        </li>

        <!--------- Menu companies  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/companies') }}" class="nav-link {{($section == 'companies')?'active':''}}">
            <i class="fas fa-building mr-2"></i>
            <p>
              {{ ucfirst(trans('common.companies')) }}
            </p>
          </a>
        </li>

        <!--------- Menu services  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/services') }}" class="nav-link {{($section == 'services')?'active':''}}">
            <i class="fas fa-cogs mr-2"></i>
            <p>
              {{ ucfirst(trans('common.services')) }}
            </p>
          </a>
        </li>

        <!--------- Menu cancels  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/cancels') }}" class="nav-link {{($section == 'cancels')?'active':''}}">
            <i class="fas fa-ban mr-2"></i>
            <p>
              {{ ucfirst(trans('common.payment')) }}
            </p>
          </a>
        </li>

        <!--------- Menu credits  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/credits') }}" class="nav-link {{($section == 'credits')?'active':''}}">
            <i class="fas fa-shopping-basket"></i>
            <p>
              {{ ucfirst(trans('common.credits')) }}
            </p>
          </a>
        </li>
        <!--------- Menu songs  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/songs') }}" class="nav-link {{($section == 'songs')?'active':''}}">
            <i class="fas fa-music mr-2"></i>
            <p>
              {{ ucfirst(trans('common.songs')) }}
            </p>
          </a>
        </li>

        <!--------- Menu quarentine  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/quarentines') }}" class="nav-link {{($section == 'quarentines')?'active':''}}">
            <i class="fas fa-utensils mr-2"></i>
            <p>
              {{ ucfirst(trans('common.quarentines')) }}
            </p>
          </a>
        </li>

        <!--------- Menu bill  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/bills') }}" class="nav-link {{($section == 'bills')?'active':''}}">
            <i class="fas fa-file-invoice-dollar mr-2"></i>
            <p>
              {{ ucfirst(trans('common.bills')) }}              
            </p>
          </a>
        </li>

        <!--------- Menu accounts  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/accounts') }}" class="nav-link {{($section == 'accounts')?'active':''}}">
            <i class="fas fa-file-invoice mr-2"></i>
            <p>
              {{ ucfirst(trans('common.accounts')) }}
            </p>
          </a>
        </li>

        <!--------- Menu web-accounts  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/webs') }}" class="nav-link {{($section == 'webs')?'active':''}}">
            <i class="fas fa-network-wired mr-2"></i>
            <p>
              {{ ucfirst(trans('common.webs')) }}
            </p>
          </a>
        </li>

        <!--------- Menu machines  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/machines') }}" class="nav-link {{($section == 'machines')?'active':''}}">
            <i class="fas fa-desktop mr-2"></i>
            <p>
              {{ ucfirst(trans('common.machines')) }}
            </p>
          </a>
        </li>

        <!--------- Menu dictionaries  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/dictionaries') }}" class="nav-link {{($section == 'dictionaries')?'active':''}}">
            <i class="fas fa-book mr-2"></i>
            <p>
              {{ ucfirst(trans('common.dictionaries')) }}
            </p>
          </a>
        </li>

        <!--------- Menu languages  -------------------> 
        <li class="nav-item has-treeview">
          <a href="{{ url('/admin/languages') }}" class="nav-link {{($section == 'languages')?'active':''}}">
            <i class="fas fa-language mr-2"></i>
            <p>
              {{ ucfirst(trans('common.languages')) }}
            </p>
          </a>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>