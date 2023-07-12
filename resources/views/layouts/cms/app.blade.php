<!DOCTYPE html>
<html>

<head>
    @include('layouts.cms.header')
</head>

<body>
    <div id="wrapper">
        @include('layouts.cms.navigation')
        <div id="page-wrapper" class="gray-bg dashbard-1">            
            <div class="row border-bottom">
                @include('layouts.cms.topnavbar')
            </div>
            <div class="row  border-bottom white-bg dashboard-header">
                @yield('content')
            </div>
            @include('layouts.cms.footer')
        </div>
    </div>
    @include('layouts.cms.scripts')

    @yield('js')
</body>
</html>