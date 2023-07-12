<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{!! asset('img/no-image.png') !!}" width="100px"/>
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{Auth()->user()->username}}</span>
                    </a>
                </div>
                <div class="logo-element">
                    {{env('APP_NAME')}}
                </div>
            </li>
            <li class="{{ \App\Helper::check_route('admin/users') }}">
                <a href="{{url('admin/users')}}">
                    <i class="fa fa-users fa-2x"></i> 
                    <span class="nav-label">{{ucfirst(trans('common.users'))}}</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-file-text-o fa-2x"></i> 
                    <span class="nav-label">{{ucfirst(trans('common.bills'))}}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ \App\Helper::check_route('admin/companies') }}">
                        <a href="{{ url('admin/companies') }}" title="companies">
                            <i class="fa fa-building fa-2x"></i>
                            <span class="nav-label">{{ucfirst(trans('common.companies'))}}</span>
                        </a>
                    </li>
                    <li class="{{ \App\Helper::check_route('admin/bills') }}">
                        <a href="{{ url('admin/bills') }}" title="bills">
                            <i class="fa fa-file-text-o fa-2x"></i>
                            <span class="nav-label">{{ucfirst(trans('common.bills'))}}</span>
                        </a>
                    </li>                
                </ul>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-vcard-o"></i> 
                    <span class="nav-label">{{ucfirst(trans('common.accounts'))}}</span>
                    <span class="fa arrow"></span>
                </a>
                <ul class="nav nav-second-level collapse">
                    <li class="{{ \App\Helper::check_route('admin/banks') }}">
                        <a href="{{ url('admin/banks') }}" title="{{ucfirst(trans('common.banks'))}}">     
                            <i class="fa fa-bank fa-2x"></i>               
                            <span class="nav-label">{{ucfirst(trans('common.banks'))}}</span>
                        </a>
                    </li>
                    <li class="{{ \App\Helper::check_route('admin/accounts') }}">
                        <a href="{{ url('admin/accounts') }}" title="{{ucfirst(trans('common.accounts'))}}">
                            <i class="fa fa-bars fa-2x"></i> 
                            <span class="nav-label">{{ucfirst(trans('common.accounts'))}}</span>
                        </a>
                    </li>        
                    {{--<li class="{{($section == 'Deposito')?'active':''}}">
                        <a href="/admin/depositos" title="depositos">                    
                                <span class="nav-label">Deposito</span>
                            </a>
                    </li>--}}
                </ul>
            </li>
            <li class="{{ \App\Helper::check_route('admin/services') }}">
                <a href="{{url('admin/services')}}" title="servicios">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label">{{ucfirst(trans('common.services'))}}</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/songs') }}">
                <a href="{{url('admin/songs')}}" title="canciones">
                    <i class="fa fa-music"></i>
                    <span class="nav-label">{{ucfirst(trans('common.songs'))}}</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/quarentines') }}">
                <a href="{{url('admin/quarentines')}}">
                    <i class="fa fa-cutlery"></i>
                    <span class="nav-label">{{ucfirst(trans('common.quarentine'))}}</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/machines') }}">
                <a href="{{url('admin/machines')}}" title="machine">
                    <i class="fa fa-desktop"></i>
                    <span class="nav-label">Machines</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/dictionaries') }}">
                <a href="{{url('admin/dictionaries')}}" title="dictionary">
                    <i class="fa fa-book"></i>
                    <span class="nav-label">Dictionary</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/cancel') }}">
                <a href="{{url('admin/cancel')}}" title="cancel">
                    <i class="fa fa-ban"></i>
                    <span class="nav-label">Cancel Services</span>
                    <span class="float-right label label-primary">INCOMPLETE</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/tasks') }}">
                <a href="{{url('admin/tasks')}}" title="task">
                    <i class="fa fa-cogs"></i>
                    <span class="nav-label">Task</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/resumes') }}">
                <a href="{{url('admin/resumes')}}" title="resume">
                    <i class="fa fa-pencil"></i>
                    <span class="nav-label">Resume</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/sections') }}">
                <a href="{{url('admin/sections')}}" title="section">
                    <i class="fa fa-pencil"></i>
                    <span class="nav-label">Section</span>
                </a>
            </li>
            <li class="{{ \App\Helper::check_route('admin/registers') }}">
                <a href="{{url('admin/registers')}}" title="register">
                    <i class="fa fa-pencil"></i>
                    <span class="nav-label">Page Register</span>
                </a>
            </li>
        </ul>
        
    </div>
</nav>        