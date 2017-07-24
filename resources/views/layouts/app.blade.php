<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Homepage</title>

    <!--[if IE]><style type="text/css">.pie {behavior:url(PIE.htc);}</style><![endif]-->

    @yield('favicon')

    <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,800italic,700italic,600italic,400italic,300italic,800,700,600' rel='stylesheet' type='text/css'>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/basic.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dropzone.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.min.css"/>

</head>
<body>
<div id="app">

    <header class="header" id="header"><!--header-start-->
        <div class="container">
            @if (Route::has('login'))
                <div class="top-right links">
                    @if (Auth::check())


                        <a class="btn btn-danger fl-rt" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                        </form>

                    @else
                        <a class="btn btn-success fl-rt wow fadeInLeft delay-05s" href="{{ url('/login') }}">Login</a>
                        <a class="btn btn-primary register-btn fl-rt wow fadeInRight delay-05s" href="{{ url('/register') }}">Register</a>
                    @endif
                </div>
            @endif

            @yield('logo')

            <h1 class="animated fadeInDown delay-07s">Welcome To Knight Studios</h1>

        </div>
    </header><!--header-end-->



    @yield('content')

    <footer class="footer">
        <div class="container">
            @yield('logofooter')
            <span class="copyright">&copy; Knight Theme. All Rights Reserved</span>

        </div>
    </footer>
</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('js/jquery.1.8.3.min.js')}}"></script>
<script src="{{ asset('js/bootstrap.js')}}"></script>
<script src="{{ asset('js/jquery-scrolltofixed.js')}}"></script>
<script src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
<script src="{{ asset('js/jquery.isotope.js')}}"></script>
<script src="{{ asset('js/wow.js')}}"></script>
<script src="{{ asset('js/classie.js')}}"></script>
<script src="{{ asset('js/dropzone.js')}}"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.min.js"></script>
<script src="{{ asset('js/tools.js')}}"></script>
<script src="{{ asset('js/home.js')}}"></script>
<script src="{{ asset('js/artist.js')}}"></script>
<script src="{{ asset('js/album.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function(e) {
        $('#test').scrollToFixed();
        $('.res-nav_click').click(function(){
            $('.main-nav').slideToggle();
            return false

        });

    });
</script>

<script>
    wow = new WOW(
        {
            animateClass: 'animated',
            offset:       100
        }
    );
    wow.init();
</script>


<script type="text/javascript">
    $(window).load(function(){

        $('.main-nav li a, .servicelink').bind('click',function(event){
            var $anchor = $(this);

            $('html, body').stop().animate({
                scrollTop: $($anchor.attr('href')).offset().top - 102
            }, 1500,'easeInOutExpo');
            /*
             if you don't want to use the easing effects:
             $('html, body').stop().animate({
             scrollTop: $($anchor.attr('href')).offset().top
             }, 1000);
             */
            event.preventDefault();
        });
    })
</script>

<script type="text/javascript">

    $(window).load(function(){


        var $container = $('.portfolioContainer'),
            $body = $('body'),
            colW = 375,
            columns = null;


        $container.isotope({
            // disable window resizing
            resizable: true,
            masonry: {
                columnWidth: colW
            }
        });

        $(window).smartresize(function(){
            // check if columns has changed
            var currentColumns = Math.floor( ( $body.width() -30 ) / colW );
            if ( currentColumns !== columns ) {
                // set new column count
                columns = currentColumns;
                // apply width to container manually, then trigger relayout
                $container.width( columns * colW )
                    .isotope('reLayout');
            }

        }).smartresize(); // trigger resize to set container width
        $('.portfolioFilter a').click(function(){
            $('.portfolioFilter .current').removeClass('current');
            $(this).addClass('current');

            var selector = $(this).attr('data-filter');
            $container.isotope({

                filter: selector,
            });
            return false;
        });

    });

</script>


</body>
</html>
