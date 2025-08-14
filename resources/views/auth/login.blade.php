<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{env('APP_NAME')}} - LOGIN</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- CUSTOM FONT-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Kavivanar&amp;family=Pangolin&amp;display=swap" rel="stylesheet">

    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('admin/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/css/login_v15/style.css') }}" />
</head>

<body>
    <section class="ftco-section" style="background-color: #000bff47">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Maya's Boutique</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-7 col-lg-5">
                    <div class="wrap">
                        <div class="img" style="
                                    background-image: url(img/login_test.jpg);
                                "></div>
                        <div class="login-wrap p-4 p-md-5">
                            <form class="signin-form" method="POST" action="{{ route('login') }}" autocomplete="off"
                                role="form">
                                {{ csrf_field() }}
                                <div class="form-group mt-3">
                                    <input type="text" class="form-control" name="email" />
                                    <label class="form-control-placeholder" for="username">{{ ucfirst(trans('common.email')) }}</label>
                                </div>
                                <div class="form-group">
                                    <input id="password-field" type="password" class="form-control" name="password" />
                                    <label class="form-control-placeholder mt-1" for="password">{{ ucfirst(trans('common.password')) }}</label>
                                    <span toggle="#password-field"
                                        class="fa fa-fw fa-eye field-icon toggle-password"></span>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="form-control btn btn-primary rounded submit px-3">
                                        {{ ucfirst(trans('common.login')) }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!--===============================================================================================-->
    <script src="{{ asset('admin/vendor/jquery/jquery-3.4.1.min.js') }}"></script>

    <!--===============================================================================================-->
    <script src="{{ asset('admin/vendor/bootstrap/js/popper43.js') }}"></script>
    <script src="{{ asset('admin/vendor/bootstrap/js/bootstrap43.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('admin/js/main43.js') }}"></script>
</body>

</html>