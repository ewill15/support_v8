<nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
    <div class="navbar-header">
        <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#">
            <i class="fa fa-bars"></i> 
        </a>
    </div>
    <ul class="nav navbar-top-links navbar-right">
        <li>
            <form method="post" action="{{ route('logout') }}" id="logout">{{ csrf_field() }}</form>
            <a href="#" onclick="$('#logout').submit()" style="padding: 20px 10px;">
                <i class="fa fa-sign-out"></i> 
                {{ucfirst(trans('common.logout'))}}
            </a>
        </li>
    </ul>
</nav>