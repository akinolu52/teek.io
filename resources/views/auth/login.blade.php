<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    {{--<link rel="shortcut icon" href="{{ asset('auth/img/favicon_1.ico') }}">--}}

    <title>Teek - Login</title>

    <!-- Google-Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,600,700,900,400italic' rel='stylesheet'>


    <!-- Bootstrap core CSS -->
    <link href="{{ asset('auth/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/bootstrap-reset.css') }}" rel="stylesheet">

    <!--Animation css-->
    <link href="{{ asset('auth/css/animate.css') }}" rel="stylesheet">

    <!--Icon-fonts css-->
    <link href="{{ asset('auth/assets/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet">

    <!--Morris Chart CSS -->
    <link rel="stylesheet" href="{{ asset('auth/assets/morris/morris.css') }}">


    <!-- Custom styles for this template -->
    <link href="{{ asset('auth/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/helper.css') }}" rel="stylesheet">
    <link href="{{ asset('auth/css/style-responsive.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 tooltipss and media queries -->
    <!--[if lt IE 9]>
    <script src="{{ asset('js/html5shiv.js') }}"></script>
    <script src="{{ asset('js/respond.min.js') }}"></script>
    <![endif]-->

</head>


<body>

<div class="wrapper-page animated fadeInDown">
    <div class="panel panel-color panel-primary">
        <div class="panel-heading">
            <h3 class="text-center m-t-10"> Sign In to <strong>Teek</strong> </h3>
        </div>

        <form class="form-horizontal m-t-40" method="post" action="{{ route('login') }}">
            {{ csrf_field() }}
            @if (Session::has('message'))
                <div class="alert alert-info">
                    <span class="help-block">
                        {{ Session::get('message') }}
                    </span>
                </div>
            @endif

            <div class="form-group ">
                <div class="col-xs-12">
                    <input class="form-control" type="text" placeholder="Email" name="email" value="akinolu52@gmail.com">
                </div>
            </div>
            <div class="form-group ">

                <div class="col-xs-12">
                    <input class="form-control" type="password" placeholder="Password" name="password" value="methane12">
                </div>
            </div>

            <div class="form-group ">
                <div class="col-xs-12">
                    <label class="cr-styled">
                        <input type="checkbox" checked>
                        <i class="fa"></i>
                        Remember me
                    </label>
                </div>
            </div>

            <div class="form-group m-t-40">
                <div class="col-xs-6">
                    <a title="Register with facebook" href="{{ route('social.login', 'facebook') }}">
                        <i class="fa fa-facebook-official fa-2x"></i>
                    </a>
                </div>

                <div class="col-xs-6 text-right">
                    <button class="btn btn-purple w-md" type="submit">Log In</button>
                </div>
            </div>

            <div class="form-group m-t-30">
                <div class="col-sm-12 text-center">
                    <a href="{{ route('register') }}">Create an account</a>
                </div>
            </div>
        </form>

    </div>
</div>




<!-- js placed at the end of the document so the pages load faster -->
<script src="{{ asset('auth/js/jquery.js') }}"></script>
<script src="{{ asset('auth/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('auth/js/pace.min.js') }}"></script>
<script src="{{ asset('auth/js/wow.min.js') }}"></script>
<script src="{{ asset('auth/js/jquery.nicescroll.js') }}" type="text/javascript"></script>

<!--common script for all pages-->
<script src="{{ asset('auth/js/jquery.app.js') }}"></script>


</body>
</html>
