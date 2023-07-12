<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>MPC | Login</title>

    <link href="{!! asset('cms/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('cms/font-awesome/css/font-awesome.css') !!}" rel="stylesheet">

    <link href="{!! asset('cms/css/animate.css') !!}" rel="stylesheet">
    <link href="{!! asset('cms/css/style.css') !!}" rel="stylesheet">

    <link href="{!! asset('cms/css/base_style.css') !!}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">MPC</h1>
            </div>

            <form class="m-t" role="form" method="POST" action="{{ route('login') }}" autocomplete="off">
                {{ csrf_field() }}
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="Username" name="email" required>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" name="password" required>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">{{ucfirst(trans('common.login'))}}</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{!! asset('cms/js/jquery-3.1.1.min.js') !!}"></script>
    <script src="{!! asset('cms/js/popper.min.js') !!}"></script>
    <script src="{!! asset('cms/js/bootstrap.js') !!}"></script>

</body>

</html>
