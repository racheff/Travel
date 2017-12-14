<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Travel Agents</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/templatemo-style.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/animate.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="owlcarousel/assets/owl.theme.default.min.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.singlePageNav.min.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/wow.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/myjavascript.js"></script>
</head>
<body id="top">
<a href="#top"><i class="fa fa-angle-double-up" id="backtotop"></i></a>
<!-- start preloader -->
<div class="preloader">
    <div class="sk-spinner sk-spinner-wave">
        <div class="sk-rect1"></div>
        <div class="sk-rect2"></div>
        <div class="sk-rect3"></div>
        <div class="sk-rect4"></div>
        <div class="sk-rect5"></div>
    </div>
</div>
<!-- end preloader -->

<!--start header-->

<!--end header -->

<!-- start navigation -->
<nav class="navbar navbar-default templatemo-nav" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
                <span class="icon icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand animated bounceIn"><img src="images/airlogo.png"></a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">HOT</a></li>
                <li><a href="#">ABOUT US</a></li>
                <li><a href="#">TRAVEL AGENTS</a></li>
                <li><a href="#">DESTINATIONS</a></li>
                <li><a href="#">PACKAGES</a></li>
                <li><a href="#">CONTACT US</a></li>
            </ul>

        </div>
    </div>
</nav>
<!-- end navigation -->
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            @if (Route::has('login'))
                <div class="login_register_popup" id="body_close">
                    <i class="fa fa-user-plus loginpopup"></i>
                    @auth
                        <span>Hello {{ Auth::user()->name }} !</span>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    @endauth
                </div>
            @endif
        @else
            <div class="login_register_popup" id="body_close">
                <i class="fa fa-user-o loginpopup"></i>
            {{--<i class="fa fa-times" style="display:none;"></i>--}}
            <!-- login -->
                <form method="post" id="login" action="{{ route('login') }}">
                    {{ csrf_field() }}

                    @if ($errors->has('email'))
                        <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                        <script type="text/javascript">
                            $("#login").show();
                            $(".loginpopup").hide();
                            $(".fa-times").show();
                        </script>
                    @endif
                    @if ($errors->has('password'))
                        <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                    @endif
                    @if ($errors->has('name'))
                        <span class="help-block">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                    @endif
                    <input name="email" type="text" class="form-control" id="email" required="" placeholder="E-Mail Address">
                    <input name="password" type="password" class="form-control" id="password" required="" placeholder="Password">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}> <label for="remember" class="remember">Remember Me</label><br>
                    <a href="#" class="forgot_password">Forgot your password?</a><br>


                    <input type="submit" id="login_button" value="login">
                    <input type="submit" id="register_button" value="register">
                </form>
                <!-- register -->
                <form method="post" id="register" action="{{ route('register') }}" style="display:none;">
                    {{ csrf_field() }}
                    <input name="name" type="text" class="form-control" id="name" required="" placeholder="Name">
                    <input name="email" type="text" class="form-control" id="email" required="" placeholder="E-Mail Address">
                    <input name="password" type="password" class="form-control" id="password" required="" placeholder="Password">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required="" placeholder="Confirm Password">
                    <input type="submit" id="register_button" value="register">
                </form>
                <!-- forgot -->
                <form method="post" id="forgot" action="{{ route('password.request') }}" style="display:none;">
                    {{ csrf_field() }}

                    <input name="email" type="text" class="form-control" id="email" required="" placeholder="E-Mail Address">

                    <input type="submit" id="forgot_button" value="Confirm">
                </form>

            </div>
        @endauth
    </div>
@endif

<!-- start home -->
<section id="home">
    <div class="container" id="homecontainer">
        <div class="row">
            <div class="owl-carousel">
                <div><img src="images/travel11.jpg"></div>
                <div><img src="images/travel2.jpg"></div>
                <div><img src="images/travel3.jpeg"></div>
            </div>
            <div class="col-md-offset-2 col-md-8 main-content-box">
                <h1 class="wow fadeIn" data-wow-offset="50" data-wow-delay="0.9s">
                    <div class="element">
                        <div class="sub-element">
                            Find your destination and leave your dreams come true !
                        </div>
                    </div>
                </h1>

                <a data-scroll href="#about" class="btn btn-default wow fadeInUp" data-wow-offset="50" data-wow-delay="0.6s">GET STARTED</a>
            </div>
        </div>
    </div>
</section>
<!-- end home -->
<script type="text/javascript">
    $(document).ready(function(){
        var owl = $('.owl-carousel');
        owl.owlCarousel({
            items:1,
            loop:true,
            margin:10,
            autoplay:true,
            autoplayTimeout:7000,
            autoplayHoverPause:true,
            smartSpeed:450,
            animateOut: 'fadeOut',
            navText: [
                "<i class='fa fa-chevron-left'></i>",
                "<i class='fa fa-chevron-right'></i>"
            ],
            nav:true
        });
    });
</script>