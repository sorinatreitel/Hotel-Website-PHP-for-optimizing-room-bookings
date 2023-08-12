<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Vizualizare camere disponibile</title>

    <meta name="description" content="">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/css/ion.rangeSlider.min.css" />

    <!--animate.css-->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" />

    <!--hover.css-->
    <link rel="stylesheet" href="{{asset('/css/hover-min.css')}}">

    <!-- range css-->
    <link rel="stylesheet" href="{{asset('/css/jquery-ui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/datepicker.css')}}">

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.min.css')}}" />

    <!-- bootsnav -->
    <link rel="stylesheet" href="{{asset('/css/bootsnav.css')}}" />

    <!--style.css-->
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" />

    <!--responsive.css-->
    <link rel="stylesheet" href="{{asset('/css/responsive.css')}}" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('css/core.css')}}" class="template-customizer-core-css">
    <link rel="stylesheet" href="{{asset('css/theme-default.css')}}" class="template-customizer-theme-css">
    <link rel="stylesheet" href="{{asset('css/demo.css')}}">

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{asset('css/perfect-scrollbar.css')}}">

    <!-- Page CSS -->
    <script src="https://kit.fontawesome.com/045d1ece88.js" crossorigin="anonymous"></script>

    <!-- Helpers -->
    <script src="{{asset('js/helpers.js')}}"></script>

    <style type="text/css">
        .layout-menu-fixed .layout-navbar-full .layout-menu,
        .layout-page {
            padding-top: 0px !important;
        }

        .content-wrapper {
            padding-bottom: 0px !important;
        }
    </style>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('js/config.js')}}"></script>
    <script src="https://js.stripe.com/v3/"></script>
</head>

@php
use App\Models\Room;
use App\Models\RoomType;
use App\Models\Facility;
use App\Http\Controllers\ClientPagesController;

$rooms = Room::all();
$roomtypes = RoomType::all();
$search_res = Session::get('search');
$k = 0;
@endphp

<body style="background-image: url('{{asset('images/room-bg.jpg')}}'); background-size: cover; background-repeat: no-repeat; background-attachment: fixed; background-position: top;">
    <!-- main-menu Start -->
    <header class="top-area" style="position: relative; background-color: #4d4e54; height: 77px;">
        <div class="header-area" style="height: 77px;">
            <div class="container">
                <div class="row" style="max-width: 76vw; margin: 0 auto;">
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
                                <ul class="nav navbar-nav navbar-right" style="display: inline;">
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
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                                                <i class="fa-solid fa-circle-user" style="margin-right: 10px;"></i><span class="caret"></span></button>
                                            <ul class="dropdown-menu" style="position: absolute;">
                                                <li><a href="{{route('account')}}" style="color:black; height:20px; padding-top:0px;">Administrare cont</a>
                                                </li>
                                                @if(Session::get('user')['userType'] == 'admin')
                                                <li><a href="{{route('admin-home')}}" class="my-dropdown-items" style="color:black; height:20px; padding-top:0px;">
                                                        Admin</a>
                                                </li>
                                                @endif
                                                <li><a id='logout'href="{{route('manual-logout')}}" style="color:red; height:20px; padding-top:0px;">Deconectare</a></li>
                                            </ul>
                                        </div>
                                        <!--button class="book-btn" id="logout"><i class="fa-solid fa-circle-user"></i>
                                            </button-->
                                    </li><!--/.project-btn-->
                                    @endif
                                </ul>
                            </div><!-- /.navbar-collapse -->
                        </div><!-- /.main-menu-->
                    </div><!-- /.col-->
                </div><!-- /.row -->
            </div><!-- /.container-->
        </div><!-- /.header-area -->
    </header><!-- /.top-area-->

    {{-- <img src="{{asset('images/room-bg.jpg')}}" style="position: fixed; top: 0px; z-index: -1; object-fit: fill; filter: brightness(70%);"/> --}}

    <div class="container-fluid">

        <div class="tab-para mb-4" style="background-color: white; opacity: 0.9">
            <div class="row">
                <form method="post" action="{{route('search')}}">
                    @csrf

                    <div class="row">

                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="single-tab-select-box">
                                <h2>check in</h2>
                                <div class="travel-check-icon">
                                    <input type="text" name="check_in" class="form-control" data-toggle="datepicker" value="{{date('m/d/Y')}}">
                                </div><!-- /.travel-check-icon -->
                            </div><!--/.single-tab-select-box-->
                        </div><!--/.col-->

                        <div class="col-lg-2 col-md-3 col-sm-4">
                            <div class="single-tab-select-box">
                                <h2>check out</h2>
                                <div class="travel-check-icon">
                                    @php
                                    $datet = explode("/", date('m/d/Y'));
                                    $datet[1] = intval($datet[1]) + 1;
                                    @endphp
                                    <input type="text" name="check_out" class="form-control" data-toggle="datepicker" value="{{$datet[0] . '/' . $datet[1] . '/'. $datet[2]}}">
                                </div><!-- /.travel-check-icon -->
                            </div><!--/.single-tab-select-box-->
                        </div><!--/.col-->

                        @php
                        $roomtypes = RoomType::all();
                        @endphp

                        <div class="col-lg-3 col-md-2 col-sm-5">
                            <div class="single-tab-select-box">
                                <h2>Tip camera</h2>
                                <select name='type' class="form-control" style="height: 48px">
                                    @foreach ($roomtypes as $roomtype)
                                    <option value="{{$roomtype->id_RoomType}}">{{$roomtype->type}}</option>
                                    @endforeach
                                    <option value="no" selected>Selecteaza tipul</option>
                                </select>
                            </div><!--/.single-tab-select-box-->
                        </div><!--/.col-->

                        <div class="col-lg-4 col-md-1 col-sm-4">
                            <div class="single-tab-select-box" style="text-align: center">
                                <h2>Pret</h2>
                                <div class="travel-filter">
                                    <div class="info_widget">
                                        <div class="price_filter">
                                            <input type="text" id="rangePrimary" name="rangePrimary" value="" />
                                            <p id="priceRangeSelected"></P>
                                        </div><!--/.price-filter-->
                                    </div><!--/.info_widget-->
                                </div><!--/.travel-filter-->
                            </div><!--/.col-->
                        </div>

                    <div class="row">
                        <div class="col-sm-7">
                            <div class="about-btn travel-mrt-0 pull-left">
                                <button class="about-view travel-btn">
                                    cauta
                                </button><!--/.travel-btn-->
                            </div><!--/.about-btn-->
                        </div><!--/.col-->
                    </div><!--/.row-->
                    </div>
                </form>
            </div>
        </div>

        @foreach($rooms as $room)

        @if(ClientPagesController::validate_room_from_search($room->id_Room, $search_res))
        @php
        $roomtype = RoomType::find($room->id_RoomType);
        $k++;
        @endphp

        <div class="card mb-4 my-search-room-card">
            <div class="card-body">
                <div class="row">
                    <div class="mb-3 mt-3 col-md-4">
                        <img class="my-search-room-image" src="{{asset('images/' . $room->image)}}">
                    </div>
                    <div class="mb-3 mt-3 col-md-6">
                        <h4>{{$roomtype->type}}</h4>
                        <h4>Numar camera {{$room->roomNumber}}</h4>
                        <div class="my-search-room-text">
                            <p style="text-align: justify;">
                                {{$roomtype->description}}
                            </p>
                        </div>
                    </div>
                    <div class="mb-3 mt-3 col-md-2 float-bottom-parent">
                        <a href="{{route('room', ['id' => $room->id_Room])}}"><button class="btn btn-primary">Vizualizeaza</button></a>
                        <h5>{{$roomtype->price}} lei/noapte</h5>
                        <div class="my-search-room-text" style="display: block; margin-bottom: 50px;">
                            @php
                            $facilities = ClientPagesController::get_facilities_for_room($room->id_Room);
                            $f = 0;
                            @endphp

                            @foreach ($facilities as $facility)
                            @php
                            $fac = Facility::find($facility->id_Facility);
                            @endphp
                            <p style="margin-bottom: 2px;"><i class="fa-solid fa-check"></i> {{$fac->name}}</p>
                            @php
                            $f++;
                            @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif
        @endforeach

        @if($k == 0)
        <div style="margin: 0 auto; padding: 20px; background-color: white; max-width: 600px; border-radius: 10px; text-align: center">
            <h2>Nu avem camere disponibile!</h2>
        </div>
        @endif
</body>

<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->

    <!--modernizr.min.js-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>

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

<script src="https://cdnjs.cloudflare.com/ajax/libs/ion-rangeslider/2.3.1/js/ion.rangeSlider.min.js"></script>
<script src="https://kit.fontawesome.com/045d1ece88.js" crossorigin="anonymous"></script>

<script>
    $("#rangePrimary").ionRangeSlider({
        type: "double",
        grid: true,
        min: 0,
        max: 1000,
        from: 200,
        to: 800,
        prefix: "RON"
    });
</script>