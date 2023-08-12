<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- META DATA -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- TITLE OF SITE -->
    <title>@yield('title')</title>

    @yield('styles')

    <!-- favicon img -->
    {{-- <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/> --}}

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}" />

    <!--animate.css-->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" />

    <!--hover.css-->
    <link rel="stylesheet" href="{{asset('/css/hover-min.css')}}">

    <!--datepicker.css-->
    <link rel="stylesheet" href="{{asset('/css/datepicker.css')}}">

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="{{asset('/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/css/owl.theme.default.min.css')}}" />

    <!-- range css-->
    <link rel="stylesheet" href="{{asset('/css/jquery-ui.min.css')}}" />

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />

    <!-- bootsnav -->
    <link rel="stylesheet" href="{{asset('/css/bootsnav.css')}}" />

    <!--style.css-->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" />

    <!--responsive.css-->
    <link rel="stylesheet" href="{{asset('/css/responsive.css')}}" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body style="background-image: url('{{asset('images/room-bg.jpg')}}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: top;">>
    <!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->


    <!-- main-menu Start -->
    <header class="top-area">
        <div class="header-area">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                Perla<span>Somesului</span>
                            </a>
                        </div><!-- /.logo-->
                    </div><!-- /.col-->
                    <div class="col-sm-10">
                        <div class="main-menu">

                            <!-- Brand and toggle get grouped for better mobile display -->
                            <div class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <i class="fa fa-bars"></i>
                                </button><!-- / button-->
                            </div><!-- /.navbar-header-->
                            <div class="collapse navbar-collapse">
                                <ul class="nav navbar-nav navbar-right">
                                    <li class="smooth-menu"><a href="#home" style="bottom:0px;">Acasa</a></li>
                                    <li class="smooth-menu"><a href="#description" style="bottom:0px;">Despre noi</a></li>
                                    <li class="smooth-menu"><a href="#gallery">Camere</a></li>
                                    @if(!Session::has('user'))
                                    <a href="{{route('login')}}" class="my-buttons">
                                        <li>
                                            <button class="book-btn">Logare
                                            </button>
                                        </li>
                                    </a><!--/.project-btn-->
                                    <a href="{{route('register')}}" class="my-buttons">
                                        <li>
                                            <button class="book-btn">Inregistrare
                                            </button>
                                        </li>
                                    </a><!--/.project-btn-->
                                    @else
                                    <li>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle my-home-button" type="button" data-toggle="dropdown">
                                                <i class="fa-solid fa-circle-user" style="margin-right: 10px;"></i><span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a href="{{route('account')}}" class="my-dropdown-items" style="color:black; height:20px; padding-top:0px;">
                                                        Administrare cont</a>
                                                </li>
                                                @if(Session::get('user')['userType'] == 'admin')
                                                <li><a href="{{route('admin-home')}}" class="my-dropdown-items" style="color:black; height:20px; padding-top:0px;">
                                                        Admin</a>
                                                </li>
                                                @endif
                                                <li><a id='logout' href="" class="my-dropdown-items" style="color:red; height:20px; padding-top:0px;">Deconectare</a></li>
                                            </ul>
                                        </div>
                                    </li><!--/.project-btn-->
                                    @endif
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.main-menu-->
                    </div><!-- /.col-->
                </div><!-- /.row -->
                <div class="home-border"></div><!-- /.home-border-->
            </div><!-- /.container-->
        </div><!-- /.header-area -->

    </header><!-- /.top-area-->
    <!-- main-menu End -->

    <div class="container-fluid">@yield('content')</div>

    <!-- footer-copyright start -->
    <footer class="footer-copyright" style="padding-bottom: 50px;">
        <hr>
        <div class="container">
            <div class="footer-content" style="padding-bottom: 0px; padding-top: 20px;">
                <div class="row">

                    <div class="col-sm-5">
                        <div class="single-footer-item" style="margin-bottom: 50px;">
                            <div class="footer-logo">
                                <a>Perla<span>Somesului</span></a>
                                <p>Bistrita-Nasaud, Valea Mare, 54</p>
                            </div>
                        </div><!--/.single-footer-item-->
                        <div class="single-footer-item text-center">
                            <div class="single-footer-txt text-left">
                                <h5 style="color: #565a5c;"><b> Contacte:</b></h5>
                                <div style="margin-left: 15px; margin-top: 15px;">
                                    <p>+40 735 403 250</p>
                                    <p style="text-transform: lowercase;">sorinatreitel@yahoo.ro</p>
                                </div>
                            </div><!--/.single-footer-txt-->
                        </div><!--/.single-footer-item-->
                    </div><!--/.col-->
                    <div class="col-sm-2" style="padding-top: 11rem;"></div>
                    <div class="col-sm-5">
                        <h3 style="margin-bottom: 20px; color: #565a5c;"><b>Locația noastră</b></h3>
                        <iframe style="height: 300px; width: 500px;" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4561.4582683909075!2d24.948108235177255!3d47.46534799024697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDfCsDI3JzUwLjgiTiAyNMKwNTYnNTkuOCJF!5e1!3m2!1sen!2sro!4v1686534136756!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>

                </div><!--/.row-->

            </div><!--/.footer-content-->
            <div id="scroll-Top">
                <i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
            </div><!--/.scroll-Top-->
        </div><!-- /.container-->

    </footer><!-- /.footer-copyright-->
    <!-- footer-copyright end -->


    <script src="{{asset('/js/jquery.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


    <!--bootstrap.min.js-->
    <script src="{{asset('/js/bootstrap.min.js')}}"></script>

    <!-- bootsnav js -->
    <script src="{{asset('/js/bootsnav.js')}}"></script>

    <!-- jquery.filterizr.min.js -->
    <script src="{{asset('/js/jquery.filterizr.min.js')}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

    <!--jquery-ui.min.js-->
    <script src="{{asset('/js/jquery-ui.min.js')}}"></script>

    <!-- counter js -->
    <script src="{{asset('/js/jquery.counterup.min.js')}}"></script>
    <script src="{{asset('/js/waypoints.min.js')}}"></script>

    <!--owl.carousel.js-->
    <script src="{{asset('/js/owl.carousel.min.js')}}"></script>

    <!-- jquery.sticky.js -->
    <script src="{{asset('/js/jquery.sticky.js')}}"></script>

    <!--datepicker.js-->
    <script src="{{asset('/js/datepicker.js')}}"></script>

    <!--Custom JS-->
    <script src="{{asset('/js/custom.js')}}"></script>

    @if(Session::has('user'))
    <script>
        $("#logout").on("click", function() {
            $.ajax({
                url: "{{route('logout')}}",
                type: "POST",
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                success: function(data, status, xhr) {
                    location.reload();
                }
            });
        });
    </script>
    @endif

    @yield('scripts')


</body>

</html>