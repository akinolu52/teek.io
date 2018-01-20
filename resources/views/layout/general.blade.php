<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Site information -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <meta name="description" content="Work Smarter">

    <!-- External CSS -->
    <link rel="stylesheet" href=" {{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/themify-icons.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/owl.carousel.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/owl.transitions.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/plyr.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href=" {{ asset('assets/css/slick.css') }}">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/scheme/bluer.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans%7CLato:400,600,900" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.ico') }}">
    <link rel="apple-touch-icon" href="{{ asset('images/apple-touch-icon.png') }}">
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('images/icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('images/icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('/apple-touch-icon.png') }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('/favicon-32x32.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('/manifest.json') }}">
    <link rel="mask-icon" href="{{ asset('/safari-pinned-tab.svg" color="#5bbad5') }}">
    <meta name="theme-color" content="#ffffff">

    <!--[if lt IE 9]>
    <script src="{{ asset('assets/js/html5shiv.min.js') }}"></script>
    <script src="{{ asset('assets/js/respond.min.js') }}"></script>
    <![endif]-->
</head>

<body class="bluer">

<!-- Header -->
<nav class="navbar navbar-default style-8" data-spy="affix" data-offset-top="60">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home-agency.html"><img src="images/logo.png" alt="SaaSera Logo"></a>
        </div>

        <div class="collapse navbar-collapse" id="navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    @if(Auth::user()->role == 'user')
                        <li class="signup-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                        {{--<a href="{{ route('user.dashboard') }}"></a>--}}
                    @else
                        <li class="signup-item"><a href="{{ route('assistant.dashboard') }}">Dashboard</a></li>
                    @endif
                @else
                    <li><a href="{{ url('/login') }}">Log in</a></li>
                    <li class="signup-item"><a href="{{ url('/register') }}">Get Started</a></li>
                @endif

            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container-fluid -->
</nav>
<!-- Header End -->

@yield('content')

<footer class="style-5">
    <div class="cps-footer-upper">
        <div class="container">
            <div class="cps-footer-widget-area">
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-xs-12">
                        <div class="cps-widget about-widget">
                            <a class="cps-footer-logo" href="home-agency.html">
                                <img src="images/logo-footer.png" alt="...">
                            </a>
                            <p>Highly trained remote personal assistants to handle your mundane administrative tasks while you remain more productive</p>
                            <div class="cps-socials">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="cps-widget custom-menu-widget">
                            <h4 class="cps-widget-title">Useful Links</h4>
                            <ul class="widget-menu">
                                <li><a href="#">About us</a></li>
                                <li><a href="#">Our Services</a></li>
                                <li><a href="#">Our Team</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Our Clients</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="cps-widget custom-menu-widget">
                            <h4 class="cps-widget-title">Policies</h4>
                            <ul class="widget-menu">
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Service</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-2 col-sm-6 col-xs-12">
                        <div class="cps-widget custom-menu-widget">
                            <h4 class="cps-widget-title">Achieve More</h4>
                            <ul class="widget-menu">
                                <li><a href="#">Blog</a></li>
                                <li><a href="#">Careers</a></li>
                                <li><a href="#">Contact</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="cps-footer-lower">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12 xs-text-center">
                    <p class="copyright">&copy; Copyright <?= date('Y') ?>, <a href="home-agency.html">Teek.io</a>. All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Script -->
<script src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery-migrate-3.0.1.min.js') }}"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/owl.carousel.js') }}"></script>
<script src="{{ asset('assets/js/visible.js') }}"></script>
<script src="{{ asset('assets/js/jquery.stellar.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
<script src="{{ asset('assets/js/imagesloaded.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.pkgd.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/js/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/js/plyr.js') }}"></script>
<script src="{{ asset('assets/js/swiper.min.js') }}"></script>
<script src="{{ asset('assets/js/slick.min.js') }}"></script>
<script src="{{ asset('js/custom.js') }}"></script>
</body>

</html>
