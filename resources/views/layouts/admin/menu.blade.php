<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="#" class="brand-link">
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

        <!--------- Menu clothes  -------------------> 
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              {{ ucfirst(trans('common.clothes')) }}
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <!--------- Sale clothes  -------------------> 
            <li class="nav-item pl-3">
              <a href="{{ url('/admin/clothes') }}" class="nav-link {{($section == 'sale_clothes')?'active':''}}">
                <i class="fas fa-tshirt mr-2"></i>
                <p>
                  {{ ucfirst(trans('common.sales')) }}
                </p>
              </a>
            </li>

            <!--------- Report clothes  -------------------> 
            <li class="nav-item pl-3">
              <a href="{{ url('/admin/clothes_report') }}" class="nav-link {{($section == 'report_clothes')?'active':''}}">
                <i class="fas fa-chart-line mr-2"></i>
                <p>
                  {{ ucfirst(trans('common.reports')) }}
                </p>
              </a>
            </li>

            @if ( auth()->user()->role == 'admin' )
              <li class="nav-item pl-3">
                <a href="{{ url('/admin/inventary_clothes') }}" class="nav-link {{($section == 'inventary_clothes')?'active':''}}">
                  <i class="fas fa-list mr-2"></i>
                  <p>
                    {{ ucfirst(trans('common.inventary')) }}
                  </p>
                </a>
              </li>
            @endif
          </ul>
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

        <!--------- Pasanaku  -------------------> 

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-table"></i>
            <p>
              Pasanaku
              <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item pl-3">
              <a href="{{ url('/admin/pasanakus') }}" class="nav-link {{($section == 'pasanakus')?'active':''}}">
                <i class="fas fa-money-bill-alt mr-2"></i>
                <p>
                  Pasanakus
                </p>
              </a>
            </li>
            <li class="nav-item pl-3">
              <a href="{{ url('/admin/penalties') }}" class="nav-link {{($section == 'penalties')?'active':''}}">
                <i class="fas fa-exclamation-triangle mr-2"></i>
                <p>
                  Multas
                </p>
              </a>
            </li>
            <li class="nav-item pl-3">
              <a href="{{ url('/admin/rules') }}" class="nav-link {{($section == 'rules')?'active':''}}">
                <i class="fas fa-bars mr-2"></i>
                <p>
                  Reglas
                </p>
              </a>
            </li>
            <li class="nav-item pl-3">
              <a href="{{ url('/admin/history') }}" class="nav-link {{($section == 'history')?'active':''}}">
                <i class="fa fa-history mr-2"></i>
                <p>
                  History
                </p>
              </a>
            </li>

        @if ( auth()->user()->role == 'admin' )
          <li class="nav-item pl-3">
            <a href="{{ url('/admin/legends') }}" class="nav-link {{($section == 'legends')?'active':''}}">
              <i class="fas fa-list mr-2"></i>
              <p>
                Leyendas
              </p>
            </a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ url('/admin/final-events') }}" class="nav-link {{($section == 'events')?'active':''}}">
              <i class="fas fa-award mr-2"></i>
              <p>
                Eventos Finales
              </p>
            </a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ url('/admin/notifications') }}" class="nav-link {{($section == 'notifications')?'active':''}}">
              <i class="fas fa-bell mr-2"></i>
              <p>
                Notificaciones
              </p>
            </a>
          </li>
          <li class="nav-item pl-3">
            <a href="{{ url('/admin/export') }}" class="nav-link">
              <i class="fas fa-file mr-2"></i>
              <p>
                Backup
              </p>
            </a>
          </li> 
          
          <li class="nav-item pl-3">
            <a href="{{ url('/admin/permissions') }}" class="nav-link">
              <i class="fas fa-user-tag mr-2"></i>
              <p>
                Roles y Permisos
              </p>
            </a>
          </li> 
        @endif   

          </ul>
        </li>

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>