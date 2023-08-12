<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Camera</title>

    <meta name="description" content="">

    <!--animate.css-->
    <link rel="stylesheet" href="{{asset('css/animate.css')}}" />

    <!--hover.css-->
    <link rel="stylesheet" href="{{asset('/css/hover-min.css')}}">

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

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

</head>

<body>
 <!-- main-menu Start -->
 <header class="top-area" style="position: fixed; z-index: 999; background-color: #4d4e54; height: 77px;">
        <div class="header-area" style="height: 77px; position:fixed; z-index: 999; left: 12%">
            <div class="container" style="max-height: 77px; position: fixed; z-index: 999">
                <div class="row" style="max-width: 76vw; max-height: 77px; margin: 0 auto;">
                    <div class="col-sm-2">
                        <div class="logo">
                            <a href="{{route('home')}}">
                                Perla<span>Somesului</span>
                            </a>
                        </div><!-- /.logo-->
                    </div><!-- /.col-->
                    <div class="col-sm-10" style="height: 77px;">
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
                                    <li>
                                        <a href="{{route('login')}}" class="my-buttons">
                                            <button class="book-btn">Logare
                                            </button>

                                        </a><!--/.project-btn-->
                                    </li>
                                    <li>
                                        <a href="{{route('register')}}" class="my-buttons">
                                            <button class="book-btn">Inregistrare
                                            </button>
                                        </a><!--/.project-btn-->
                                    </li>
                                    @else
                                    <li>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" style="background-color: #00d8ff; border-color: #00d8ff;">
                                                <i class="fa-solid fa-circle-user" style="margin-right: 10px;"></i><span class="caret"></span></button>
                                            <ul class="dropdown-menu" style="position: absolute;">
                                                <li><a href="{{route('account')}}" style="color:black; height:20px; padding-top:0px;">Administrare cont</a>
                                                </li>
                                                @if(Session::get('user')['userType'] == 'admin')
                                                <li><a href="{{route('admin-home')}}" class="my-dropdown-items" style="color:black; height:20px; padding-top:0px;">
                                                        Admin</a>
                                                </li>
                                                @endif
                                                <li><a id='logout' href="{{route('manual-logout')}}" style="color:red; height:20px; padding-top:0px;">Deconectare</a></li>
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

    <img src="{{asset('images/room-bg.jpg')}}" style="position: fixed; top: 0px; z-index: -1; object-fit: fill; filter: brightness(70%);" />

    @php
    use App\Models\Room;
    use App\Models\RoomType;
    use App\Models\Facility;
    use App\Models\SpecialDate;
    use App\Http\Controllers\ClientPagesController;

    $roomtype = RoomType::find($room->id_RoomType);
    @endphp

    @php

    if(Session::has('search')) {
        $search_res = Session::get('search');

        $start = $search_res['check_in'];
        $end = $search_res['check_out'];

        //dd($start);
    }
    @endphp

    <div class="container-fluid" style="margin: 0 auto; background-color: transparent; padding-top: 150px">

        <div class="container mx-auto grid grid-cols-2 md:flex px-4 py-2 font-semibold" style="border-radius: 25px; background-color: #02B884; box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px; text-align:center; opacity: 0.70;">
            <a href="#dotari" class="py-1 px-3" style="color: black"><b>Dotari camere</b></a>
            <span style="color: black"><b> | </b></span>
            <a href="#facilitati" class="py-1 px-3" style="color: black"><b>Facilitati</b></a>
            <span style="color: black"><b> | </b></span>
            <a href="#servicii_masa" class="py-1 px-3" style="color: black"><b>Servicii masa</b></a>
        </div>

        @php
            $specials_stand = SpecialDate::all();
            $is_in_range = false;
            $spec_sel;
        if(Session:: has('search') ){
            foreach($specials_stand as $special) {
                if($special->id_RoomType == $roomtype->id_RoomType) {
                    $dates = ClientPagesController::convert_date($special->dateStart, $special->dateEnd);

                    $startSpec = $dates['start'];
                    $endSpec = $dates['end'];

                    if(ClientPagesController::is_date_in($start, $startSpec, $endSpec) && ClientPagesController::is_date_in($end, $startSpec, $endSpec)) {
                    $price = $special->price * ClientPagesController::calc_days($start, $end);
                    $is_in_range = true;
                    $spec_sel = $special;
                    }else if(ClientPagesController::is_date_in($start, $startSpec, $endSpec)) {
                    $price = $special->price * ClientPagesController::calc_days($start, $endSpec) + $roomtype->price * ClientPagesController::calc_days($endSpec, $end);
                    $is_in_range = true;
                    $spec_sel = $special;
                    }else if(ClientPagesController::is_date_in($end, $startSpec, $endSpec)) {
                    $price = $special->price * ClientPagesController::calc_days($startSpec, $end) + $roomtype->price * ClientPagesController::calc_days($start, $startSpec);
                    $is_in_range = true;
                    $spec_sel = $special;
                    }else if(ClientPagesController::is_date_in($startSpec, $start, $end) && ClientPagesController::is_date_in($endSpec, $start, $end)) {
                    $price = $roomtype->price * ClientPagesController::calc_days($start, $startSpec) + $roomtype->price * ClientPagesController::calc_days($endSpec, $end) + $special->price * ClientPagesController::calc_days($startSpec, $endSpec);
                    $is_in_range = true;
                    $spec_sel = $special;
                    }
                }
            }
        }  
        @endphp

        <div class="row justify-content-center" style="margin: 0 auto; margin-top: 50px; margin-bottom: 50px;">
            <div class="col-md-6 col-lg-6 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h4 class="card-title">{{$roomtype->type}}, {{$room->roomNumber}}</h4>
                                <h6 class="card-subtitle text-muted" style="margin-top: 20px;"><i class="fa-solid fa-location-dot"></i> Valea mare, jud Bistrita-Nasaud</h6>
                            </div>
                            <div class="col-md-6" style="text-align: center">
                                <h5 class="card-title">{{$roomtype->price}} Lei/Noapte, Standard</h5>
                                @if($is_in_range)
                                <h5 class="card-title">{{$spec_sel->price}} Lei/Noapte
                                ({{$spec_sel->dateStart}} -> {{$spec_sel->dateEnd}})</h5>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" style="background-color: #365566;">
                            <div class="item active">
                                <div style="display: flex; justify-content: center; align-items: center;">
                                    <img src="{{asset('/images/' . $room->image)}}" alt="Los Angeles">
                                </div>
                            </div>
                        </div>
                        <!-- Left and right shadows -->
                        <a class="left carousel-control" style="opacity: 0.5;"></a>
                        <a class="right carousel-control" style="opacity: 0.5;"></a>
                    </div>


                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h4 id="dotari" style="margin-top: 50px; margin-bottom: 5px;">Dotari camere</h4>
                            </li>
                            <li class="list-group-item">
                                <p style="margin-top: 15px;">
                                    {{$roomtype->description}}
                                </p>
                                <h4 id="facilitati" style="margin-top: 70px; margin-bottom: 5px;">Facilitati</h4>
                            </li>
                            <li class="list-group-item">
                                <div class="row">

                                    @php
                                    $k = 0;
                                    $facilities = ClientPagesController::get_facilities_for_room($room->id_Room);
                                    @endphp

                                    @foreach ($facilities as $facility)

                                    @php
                                    $fac = Facility::find($facility->id_Facility);
                                    @endphp

                                    <div class="col"><i class="fa-solid fa-check"></i>{{$fac->name}}</div>

                                    @php
                                    $k++;
                                    @endphp

                                    @if($k % 3 == 0)
                                    <div class="w-100"></div>
                                    @endif
                                    @endforeach

                                    <!-- Force next columns to break to new line -->
                                    {{-- <div class="w-100"></div> --}}
                                </div>
                                <h4 id="servicii_masa" style="margin-top: 70px; margin-bottom: 5px;">Servicii masa</h4>
                            </li>
                            <li class="list-group-item">
                                <p style="margin-top: 15px;">
                                    MASA: restaurant propriu, Piazzetta; mic dejun, pranz, cina sistem bufet suedez.<br>
                                    1. Mic dejun - (07:30 - 10:00 bufet) suedez, se serveste incepand cu a doua zi de cazare
                                    si inclusiv in ziua plecarii.
                                    Bauturi incluse: apa, suc, ceai, cafea, cappuccino, ciocolata calda;<br>
                                    2. Demipensiune - (7:30 - 10:00) mic dejun bufet suedez si masa de pranz (13:00 - 15:00)bufet suedez-
                                    se serveste incepand cu a doua zi de cazare si inclusiv in ziua plecarii.
                                    Bauturi incluse: apa, suc, ceai, cafea, cappuccino, ciocolata calda;<br>
                                    3. Pensiune Completa - mic dejun (7:30 - 10:00), masa de pranz (13:00 - 15.00),
                                    cina (19:00 - 21:00) in sistem bufet suedez. In prima zi de cazare se serveste cina,
                                    incepand cu a doua zi de cazare se servesc toate mesele si in ziua plecarii se servesc
                                    doar micul dejun si pranzul.
                                    Bauturi incluse: apa, suc, ceai, cafea, cappuccino, ciocolata calda;<br>
                                    4. All Inclusive - mic dejun (07:30 - 10:00), masa de pranz (13:00 - 15.00) si cina
                                    (19:00 - 21:00), acces la barul de pe piscina si la barul de pe plaja.
                                    In prima zi de cazare se serveste cina, incepand cu a doua zi de cazare
                                    se servesc toate mesele si in ziua plecarii se servesc doar micul dejun si pranzul.<br>
                                    Bauturile incluse: apa, cafea, cappuccino, ciocolata calda, bauturi racoritoare(gama Pepsi).<br>
                                    * Pachetul de bauturi inclus in tipul de masa All Inclusive este disponibil in restaurant
                                    (in intervalul de servire al meselor principale), la barul de pe plaja( program 10:00-19:00)
                                    si la barul de pe piscina( program 10:00-20:00).
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-lg-4 mb-6" style="margin-left: 70px;">
                <div class="card" style="opacity: 0.85;">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            @if(Session::has('search'))
                            <li class="list-group-item" style="text-align: center;">
                                <h4 style="margin-bottom: 5px;">Tarif pentru perioada selectata</h4>
                                <p style="font-size:larger; margin-top: 10px; margin-bottom: 5px; color: #3e4d5d;"><b>{{$start['day']}}.{{$start['month']}}.{{$start['year']}} - {{$end['day']}}.{{$end['month']}}.{{$end['year']}}</b></p>
                            </li>

                            <li class="list-group-item" style="text-align: center;">
                                @php

                                $specials = SpecialDate::all();
                                //dd($specials);
                                $price = 0;
                                $is_in_range = false;

                                foreach($specials as $special) {
                                if($special->id_RoomType == $roomtype->id_RoomType) {
                                $dates = ClientPagesController::convert_date($special->dateStart, $special->dateEnd);

                                $startSpec = $dates['start'];
                                $endSpec = $dates['end'];

                                if(ClientPagesController::is_date_in($start, $startSpec, $endSpec) && ClientPagesController::is_date_in($end, $startSpec, $endSpec)) {
                                $price = $special->price * ClientPagesController::calc_days($start, $end);
                                $is_in_range = true;
                                }else if(ClientPagesController::is_date_in($start, $startSpec, $endSpec)) {
                                $price = $special->price * ClientPagesController::calc_days($start, $endSpec) + $roomtype->price * ClientPagesController::calc_days($endSpec, $end);
                                $is_in_range = true;
                                }else if(ClientPagesController::is_date_in($end, $startSpec, $endSpec)) {
                                $price = $special->price * ClientPagesController::calc_days($startSpec, $end) + $roomtype->price * ClientPagesController::calc_days($start, $startSpec);
                                $is_in_range = true;
                                }else if(ClientPagesController::is_date_in($startSpec, $start, $end) && ClientPagesController::is_date_in($endSpec, $start, $end)) {
                                $price = $roomtype->price * ClientPagesController::calc_days($start, $startSpec) + $roomtype->price * ClientPagesController::calc_days($endSpec, $end) + $special->price * ClientPagesController::calc_days($startSpec, $endSpec);
                                $is_in_range = true;
                                }
                                }
                                }

                                @endphp

                                @if($is_in_range)
                                <p style="font-size:x-large; margin-top: 10px; margin-bottom: 5px; color: #3e4d5d;">{{$price}} Lei</p>
                                @else

                                @php
                                    $price = $roomtype->price * ClientPagesController::calc_days($start, $end);
                                @endphp

                                <p style="font-size:x-large; margin-top: 10px; margin-bottom: 5px; color: #3e4d5d;">{{$price}} Lei</p>
                                @endif
                            </li>

                            @else
                            <li class="list-group-item" style="text-align: center;">
                                <p style="font-size:x-large; margin-top: 10px; margin-bottom: 5px; color: #3e4d5d;">Nu ai setat datele sejurului in pagina <a href="{{route('home')}}" style="font-size:x-large; margin-top: 10px; margin-bottom: 5px; color: #blue;">Acasa</a></p>
                            </li>
                            @endif

                            <li class="list-group-item">
                                <p style="font-size:medium; color: #3e4d5d; margin-top: 20px;"><i class="fa-solid fa-location-dot"></i>&ensp; Valea Mare, jud Bistrita-Nasaud</p>
                                <p style="font-size:medium; color: #3e4d5d;"><i class="fa-solid fa-person"></i><i class="fa-solid fa-person-dress"></i>&ensp;Capacitate: {{$roomtype->capacity}} pers</p>
                                <p style="font-size:medium; color: #3e4d5d;"><i class="fa-solid fa-clock"></i>&ensp; Check-in 7:00 - 12:00</p>
                                <p style="font-size:medium; color: #3e4d5d;"><i class="fa-solid fa-person-swimming"></i>&ensp; Piscina</p>
                                <p style="font-size:medium; color: #3e4d5d;"><i class="fa-solid fa-utensils"></i>&ensp; Restaurant</p>
                            </li>


                            @if(Session::has('search'))
                            <li class="list-group-item" style="display: flex; justify-content: center;">
                                <a href="{{route('checkout')}}">
                                    <div class="btn btn-primary my-book-buttons" id="rezerva" style="color: white; width: 250px; margin-top: 10px;">
                                        Rezerva acum
                                    </div>
                                </a>
                            </li>
                            @endif
                        </ul>
                    </div>
                </div>

                <div class="card" style="background-color: #02B884; margin-top: 70px; opacity: 0.85;">
                    <div class="card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <h5 class="card-title" style="margin-bottom: 5px; color: white;">Contact</h5>
                            </li>
                            <li class="list-group-item" style="padding-left: 0px;">
                                <p style="font-size:medium; margin-top: 10px; margin-bottom: 5px; color: black;"> Ai nevoie de ajutor?</p>
                                <p style="font-size:medium; color: black;"> Contacteaza-ne la:</p>
                                <p style="margin-bottom: 5px; padding-left: 10px; color: white;"><i class="fa-solid fa-phone"></i>&emsp;0735 403 250</p>
                                <p style="margin-bottom: 5px; padding-left: 10px; color: white;"><i class="fa-solid fa-envelope"></i>&emsp;sorinatreitel@yahoo.ro</p>
                            </li>
                        </ul>
                    </div>
                </div>

                <div class="card" style="margin-top: 70px; height:400px;">
                    <div class="card-body" style="padding: 0px; display: flex; justify-content: center;">
                        <iframe style="width: 100%; height: 100%; margin: 0 auto; border-radius: 10px;" src="https://www.google.com/maps/embed?pb=!1m17!1m12!1m3!1d4561.4582683909075!2d24.948108235177255!3d47.46534799024697!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m2!1m1!2zNDfCsDI3JzUwLjgiTiAyNMKwNTYnNTkuOCJF!5e1!3m2!1sen!2sro!4v1686534136756!5m2!1sen!2sro" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>

            @php
                use App\Models\Testimonial;

                $testimonials = Testimonial::all();
            @endphp

            <div class="card" style="background-color: #02B884; margin-top: 70px; opacity: 0.85;">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        @if(Session::has('user'))
                        <li class="list-group-item">
                            <button id="review-modal-button" class="btn my-buttons review-button trigger">Adauga o recenzie!</button>
                            <h5 class="card-title" style="margin-bottom: 5px; color: white;">Recenzii</h5>
                            {{-- <div class="stars">
                                <form action="" style="float: left;">
                                    <input class="star star-5" id="star-5-2" type="radio" name="star" />
                                    <label class="star star-5" for="star-5-2"></label>
                                    <input class="star star-4" id="star-4-2" type="radio" name="star" />
                                    <label class="star star-4" for="star-4-2"></label>
                                    <input class="star star-3" id="star-3-2" type="radio" name="star" />
                                    <label class="star star-3" for="star-3-2"></label>
                                    <input class="star star-2" id="star-2-2" type="radio" name="star" />
                                    <label class="star star-2" for="star-2-2"></label>
                                    <input class="star star-1" id="star-1-2" type="radio" name="star" />
                                    <label class="star star-1" for="star-1-2" style="padding-left: 0px;"></label>
                                </form>
                            </div> --}}
                        </li>
                        @endif

                        @php
                            use App\Models\User;
                        @endphp

                        @foreach ($testimonials as $item)

                        @php
                            $test_user = User::find($item->id_User);
                            $test_roomtype = RoomType::find($item->id_RoomType);
                        @endphp

                        @if($test_roomtype->id_RoomType == $roomtype->id_RoomType)

                        @php
                            $colors = array('1' => '#ff2920',
                                     '2' => '#ff6622',
                                     '3' => '#ff8c21',
                                     '4' => '#ffac20',
                                     '5' => '#ffee77');

                            $actual_color = $colors[$item->rating];
                        @endphp 
                            
                        <li class="list-group-item" style="padding-left: 0px;">
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <img src="{{asset('/images/' . $test_user->profile)}}" class="user-picture">
                                    <h6 class="review-user-name">{{$test_user->name}}</h6>
                                    <h7 class="review-room-info"><i class="fa-solid fa-bed" style="color: #ffffff;"></i>&ensp;{{$test_roomtype->type}}</h7>
                                </div>
                                <div class="col-md-10">
                                    <i class="@if($item->rating >= 1) fa-solid @else fa-regular @endif fa-star fa-sm" style="color: {{$actual_color}}"></i>
                                    <i class="@if($item->rating >= 2) fa-solid @else fa-regular @endif fa-star fa-sm" style="color: {{$actual_color}}"></i>
                                    <i class="@if($item->rating >= 3) fa-solid @else fa-regular @endif fa-star fa-sm" style="color: {{$actual_color}}"></i>
                                    <i class="@if($item->rating >= 4) fa-solid @else fa-regular @endif fa-star fa-sm" style="color: {{$actual_color}}"></i>
                                    <i class="@if($item->rating == 5) fa-solid @else fa-regular @endif fa-star fa-sm" style="color: {{$actual_color}}"></i>
                                    <div class="review-text">
                                        {{$item->content}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif

                        @endforeach

                        @if($roomtype->type == 'Camera Single')
                        <li class="list-group-item" style="padding-left: 0px;">
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <img src="{{asset('images/profile.png')}}" class="user-picture">
                                    <h6 class="review-user-name">Alexandru</h6>
                                    <h7 class="review-room-info"><i class="fa-solid fa-bed" style="color: #ffffff;"></i>&ensp;Camera Single</h7>
                                </div>
                                <div class="col-md-10">
                                    <h6 class="review-date">04 aprilie 2023</h6>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffac20;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffac20;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffac20;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffac20;"></i>
                                    <i class="fa-regular fa-star fa-sm" style="color: #ffac20;"></i>
                                    <div class="review-text">
                                        Experiența noastră la acest hotel de la munte a fost excelentă! Cazarea a fost impecabilă,
                                        cu o cameră spațioasă și o priveliște uimitoare. Personalul a fost amabil și serviciile au
                                        fost de înaltă calitate. Recomand cu căldură acest loc pentru o escapadă relaxantă în mijlocul naturii.
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if($roomtype->type == "Apartament")
                        <li class="list-group-item" style="padding-left: 0px;">
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <img src="{{asset('images/profile-pic-1.jpg')}}" class="user-picture">
                                    <h6 class="review-user-name">Simona</h6>
                                    <h7 class="review-room-info"><i class="fa-solid fa-bed" style="color: #ffffff;"></i>&ensp;Apartament</h7>
                                    <h7 class="review-room-info"><i class="fa-regular fa-calendar" style="color: #ffffff;"></i>&ensp;6 Nopti</h7>
                                </div>
                                <div class="col-md-10">
                                    <h6 class="review-date">20 decembrie 2022</h6>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <div class="review-text">
                                        Am avut o experiență extraordinară la acest hotel de la munte! Cazarea noastră a fost într-o cameră minunată,
                                        cu o priveliște panoramică uimitoare asupra munților înzăpeziți. Camera era spațioasă, confortabilă și elegant decorată,
                                        oferind o atmosferă relaxantă și primitoare.
                                        Tot mobilierul și facilitățile erau de înaltă calitate, iar patul a fost extrem de confortabil,
                                        asigurându-ne un somn odihnitor după o zi plină de aventuri în natură. Baia modernă era dotată cu produse de îngrijire de lux,
                                        iar cada cu hidromasaj ne-a oferit o relaxare revigorantă.
                                        Personalul hotelului a fost extrem de amabil, atent și profesionist, asigurându-se că avem tot ce ne trebuie pentru a ne
                                        simți ca acasă. Ne-au oferit informații utile despre traseele de drumeție și activitățile din zonă,
                                        ajutându-ne să planificăm zilele în munți în mod eficient.
                                        Am fost impresionați și de facilitățile hotelului, cum ar fi restaurantul cu mâncăruri delicioase și diverse,
                                        care au satisfăcut toate gusturile noastre. De asemenea, centrul spa ne-a oferit momente de relaxare și răsfăț,
                                        cu piscină încălzită, saună și servicii de masaj de înaltă calitate.
                                        În ansamblu, această cameră de hotel de la munte a depășit așteptările noastre în toate privințele. Recomand cu
                                        căldură acest loc tuturor celor care doresc să petreacă timp în mijlocul naturii, beneficiind totodată de confort
                                        și servicii impecabile. Cu siguranță ne vom întoarce în viitor pentru a ne bucura din nou de această experiență minunată!
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if($roomtype->type == "Camera Double")
                        <li class="list-group-item" style="padding-left: 0px;">
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <img src="{{asset('images/profile.png')}}" class="user-picture">
                                    <h6 class="review-user-name">Raluca</h6>
                                    <h7 class="review-room-info"><i class="fa-solid fa-bed" style="color: #ffffff;"></i>&ensp;Camera double</h7>
                                </div>
                                <div class="col-md-10">
                                    <h6 class="review-date">17 august 2020</h6>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffac20;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffac20;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffac20;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffac20;"></i>
                                    <i class="fa-regular fa-star fa-sm" style="color: #ffac20;"></i>
                                    <div class="review-text">
                                        Sederea a fost decentă. Camera era confortabilă și avea o priveliște plăcută către munți.
                                        Personalul a fost amabil în general. În ansamblu, a fost o experiență satisfăcătoare pentru o ședere la munte.
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                        @if($roomtype == "Camera Triple")
                        <li class="list-group-item" style="padding-left: 0px;">
                            <div class="row mt-4">
                                <div class="col-md-2">
                                    <img src="{{asset('images/profile-pic-2.jpg')}}" class="user-picture">
                                    <h6 class="review-user-name">Mihai</h6>
                                    <h7 class="review-room-info"><i class="fa-solid fa-bed" style="color: #ffffff;"></i>&ensp;Camera Triple</h7>
                                </div>
                                <div class="col-md-10">
                                    <h6 class="review-date">13 septembrie 2021</h6>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <i class="fa-solid fa-star fa-sm" style="color: #ffee77;"></i>
                                    <div class="review-text">
                                        Cazarea la acest hotel a fost deosebit de plăcută. Cazarea a depășit cu mult așteptările mele.
                                        Camera a fost elegantă, spațioasă și confortabilă, oferind o atmosferă relaxantă și primitoare.
                                        Personalul a fost extrem de amabil și atent la nevoile mele, asigurându-se că am avut o ședere fără cusur.
                                        Facilitățile hotelului au fost excelente, de la restaurantul cu preparate delicioase până la centrul spa relaxant.
                                        Am plecat cu amintiri frumoase și cu dorința de a reveni în viitor.
                                        Recomand cu încredere acest hotel pentru o experiență deosebită de cazare.
                                    </div>
                                </div>
                            </div>
                        </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!--Modal-->

    @php
        $roomtypes = RoomType::all();
    @endphp

    <div class="my-modal-wrapper">
        <div class="my-modal">
            <div class="my-head">
                <a class="my-btn-close trigger" href="#">
                    <i class="fa fa-times" aria-hidden="true"></i>
                </a>
            </div>
            <form method="post" action="{{route('save-testimonial')}}">
                @csrf
            <div class="my-content">
                <div class="row" style="margin-bottom: 90px;">
                    <div class="col-md-6">
                        <label>Alege tipul de camera</label>
                        <select id="selectRoomType" class="form-select color-dropdown" name="type" style="max-width: 200px;" autofocus>
                            @foreach ($roomtypes as $roomtype)
                                <option value="{{$roomtype->id_RoomType}}">{{$roomtype->type}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label>Cum ti s-a parut sederea?</label>
                        <div class="stars">
                            <div class="my-stars-form" style="float: left;">
                                <input class="star star-5" id="star-5-1" type="radio" name="star" value="5"/>
                                <label style="font-size: 16px; margin-bottom: 0px;" class="star star-5" for="star-5-1"></label>
                                <input class="star star-4" id="star-4-1" type="radio" name="star" value="4"/>
                                <label style="font-size: 16px; margin-bottom: 0px;" class="star star-4" for="star-4-1"></label>
                                <input class="star star-3" id="star-3-1" type="radio" name="star" value="3"/>
                                <label style="font-size: 16px; margin-bottom: 0px;" class="star star-3" for="star-3-1"></label>
                                <input class="star star-2" id="star-2-1" type="radio" name="star" value="2"/>
                                <label style="font-size: 16px; margin-bottom: 0px;" class="star star-2" for="star-2-1"></label>
                                <input class="star star-1" id="star-1-1" type="radio" name="star" value="1"/>
                                <label style="font-size: 16px; margin-bottom: 0px;" class="star star-1" for="star-1-1" style="padding-left: 0px;"></label>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <label>Impartaseste-ne experienta ta in cateva cuvinte</label>
                    <textarea type="text" name="content" class="form-control" style="height: 150px; margin-bottom: 20px;"></textarea>
                </div>
                <input id="review-modal-button" type="submit" class="btn my-buttons review-button" value="Salveaza">
            </div>
            </form>
        </div>
    </div>

    <!--Modal-->

</body>

<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>

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

@if(Session::has('search'))
<script>

    $('#rezerva').on('click', function () {

        $.ajax({
            url: "{{route('set-checkout-post')}}",
            type: "POST",
            data: {'_token': "{{csrf_token()}}", 'id': {{$room->id_Room}}, 'price': {{$price}}, 'days': {{ClientPagesController::calc_days($start, $end)}}},
            success: function(data, xhr, status) {
                window.location.href = "{{route('checkout')}}";
            }
        });

    })

</script>
@endif

<script>
    $('#card1').on('click', function() {
        window.location.href = "{{route('home')}}";
    });

    $('#card2').on('click', function() {
        window.location.href = "{{route('home')}}";
    });
</script>

<script>
    $(document).ready(function() {
        $('.trigger').on('click', function() {
            $('.my-modal-wrapper').toggleClass('open');
            $('.page-wrapper').toggleClass('my-blur-it');
            return false;
        });
    });
</script>

</html>