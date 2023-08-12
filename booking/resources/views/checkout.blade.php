<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Formular rezervare</title>

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

    {{-- <img src="{{asset('images/room-bg.jpg')}}" style="position: fixed; top: 0px; z-index: -1; object-fit: fill; filter: brightness(70%);"/> --}}

    @php
    use App\Models\RoomType;

    $room = Session::get('room');
    $price = Session::get('final_price');
    $days = Session::get('days');
    $search_data = Session::get('search');
    $roomtype = RoomType::find($room->id_RoomType);
    $user = Session::get('user');
    @endphp

    <div class="container-fluid" style="margin-top: 70px; opacity: 0.90;">

        @if(Session::has('res-success'))
        <div class="row">
            <div class="col-12" style="margin: 0 auto; width: 50%; text-align: center; margin-bottom: 40px; background-color: white; border: 3px solid green; border-radius: 10px; padding-top: 10px; padding-bottom: 10px; color: green">
                <h5 style="margin-bottom: 0px; color: green">Rezervarea a fost inregistrata cu succes</h5>
            </div>
        </div>
        @endif

        <div class="col-md-7">
            <div class="card mb-4" style="height: 420px;">
                <h5 class="card-header"><i class="fa-solid fa-suitcase"></i> Detalii rezervare</h5>
                <hr class="my-0">
                <div class="card-body">

                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <div class="row">
                                <div class="col-md-4">
                                    <img src="{{asset('/images/' . $room->image)}}">
                                </div>
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <h4><b>{{$roomtype->type}}, {{$room->roomNumber}}</b></h4>
                                            <h6><i class="fa-solid fa-location-dot"></i> Valea mare, jud Bistrita-Nasaud</h6>
                                        </div>
                                        <div class="col-md-6" style="display: flex; justify-content: center; align-items: center;">
                                            <h4><b>{{$roomtype->price}} lei/noapte</b></h4>
                                        </div>
                                    </div>
                                    <hr class="my-0 mb-4 mt-2">
                                    <div class="row">
                                        <div class="col-md-5">
                                            <h5>Check-in</h5>
                                            <h6 style="color: black;"><b>{{$search_data['check_in']['day']}}-{{$search_data['check_in']['month']}}-{{$search_data['check_in']['year']}}</b></h6>
                                            <h6>Incepand cu 07:00</h6>
                                        </div>
                                        <div class="col-md-1" style="padding: 0;">
                                            <div style="border-left:1px solid #ccd0d5; height:100px"></div>
                                        </div>
                                        <div class="col-md-5">
                                            <h5>Check-out</h5>
                                            <h6 style="color: black;"><b>{{$search_data['check_out']['day']}}-{{$search_data['check_out']['month']}}-{{$search_data['check_out']['year']}}</b></h6>
                                            <h6>Pana la 12:00</h6>
                                        </div>
                                        <h5 class="mt-4" style="color: black; margin-bottom: 0px;"><b>Durata totala: <span style="text-transform: lowercase;">{{$days}} zile</span></b></h5>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="card mb-4" style="height: 230px; @if(Session::has('res-success')) display: none @endif" >
                <h5 class="card-header"><i class="fa-solid fa-wallet"></i></i> Modalitati de plata</h5>
                <hr class="my-0">
                <div class="card-body" style="padding-top: 0px;">
                    <div class="demo-inline-spacing mt-3">
                        <div class="list-group">
                            <label class="list-group-item" style="border: 0px;">
                                <input class="form-check-input me-1" type="radio" id="card_inp" name="choose-payment" checked>
                                Plata cu cardul
                            </label>
                            <label class="list-group-item" style="border: 0px;">
                                <input class="form-check-input me-1" type="radio" id="cash_inp" name="choose-payment">
                                Plata cash la locatie
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-5">
            <div class="card mb-4" style="height: 420px;">
                <h5 class="card-header"><i class="fa-solid fa-circle-info"></i> Detalii de facturare</h5>
                <!-- Billing details -->
                <hr class="my-0">
                <div class="card-body">
                    <form id="formAccountSettings" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Nume intreg @if(!Session::has('res-success'))<i id="name-bouncy" class="fa-solid fa-asterisk fa-bounce fa-sm" style="color: #ff0000;"></i>@endif</label>
                                <input @if(Session::has('res-success')) class="form-control-plaintext" @else class="form-control" @endif type="text" id="card-name" name="fullName" placeholder="****" @if(Session::has('res-success')) value="{{Session::get('full_name')}}" readonly @else value="{{$user['name']}}" @endif required>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Numar Adulti @if(!Session::has('res-success'))<i id="adulti-bouncy" class="fa-solid fa-asterisk fa-bounce fa-sm" style="color: #ff0000;"></i>@endif</label>
                                <input @if(Session::has('res-success')) class="form-control-plaintext" @else class="form-control" @endif type="number" min="0" id="adulti" name="adulti" required @if(Session::has('res-success')) value="{{Session::get('adults')}}" readonly @endif>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail @if(!Session::has('res-success'))<i id="email-bouncy" class="fa-solid fa-asterisk fa-bounce fa-sm" style="color: #ff0000;"></i>@endif</label>
                                <input @if(Session::has('res-success')) class="form-control-plaintext" @else class="form-control" @endif type="text" id="email" name="email" placeholder="****@example.com" required @if(Session::has('res-success')) value="{{Session::get('res_email')}}" readonly @else value="{{$user['email']}}" @endif>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Numar Copii @if(!Session::has('res-success'))<i id="copii-bouncy" class="fa-solid fa-asterisk fa-bounce fa-sm" style="color: #ff0000;"></i>@endif</label>
                                <input @if(Session::has('res-success')) class="form-control-plaintext" @else class="form-control" @endif type="number" min="0" id="copii" name="copii" required @if(Session::has('res-success')) value="{{Session::get('children')}}" readonly @endif>
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Numar de telefon @if(!Session::has('res-success'))<i id="tel-bouncy" class="fa-solid fa-asterisk fa-bounce fa-sm" style="color: #ff0000;"></i>@endif</label>
                                <input type="text" id="phoneNumber" name="phoneNumber" @if(Session::has('res-success')) class="form-control-plaintext" @else class="form-control" @endif placeholder="**** *** ***" value="{{$user['phoneNumber']}}" required @if(Session::has('res-success')) readonly @endif>
                            </div>
                        </div>
                    </form>
                </div>
                @if(Session::has('res-success'))
                <div class="card-body" style="padding-top: 0px">
                    <div class="col-md-12" style="text-align: center;">
                        <h5 style="margin: 0px;"><b>TOTAL REZERVARE:&emsp;{{$price}}&emsp;LEI</b></h5>
                    </div>
                </div>
                @endif
                <!-- /Billing details -->
            </div>

            <div class="card mb-4" id="cash_pay" style="display: none; height: 230px; @if(Session::has('res-success')) display: none @endif">
                <h5 class="card-header"><i class="fa-solid fa-money-bill-wave"></i> Plata cash</h5>
                <hr class="my-0">
                <div class="card-body">
                    <div class="col-md-6">
                        <h5 style="margin: 0px; margin-left: 50px;"><b>TOTAL REZERVARE:</b></h5>
                    </div>
                    <div class="col-md-6">
                        <h5 style="margin: 0px;"><b>{{$price}}&emsp;LEI</b></h5>
                    </div>
                </div>
                <div class="card-body" style="margin: 0 auto;">
                    <div class="row">
                        <button type="submit" id="pay_cash" class="btn btn-danger" style="width: fit-content;">Finalizare rezervare</button>
                    </div>
                </div>
            </div>

            <div class="card mb-4" id="card_pay" @if(Session::has('res-success')) style="display: none" @endif>
                <h5 class="card-header"><i class="fa-solid fa-credit-card"></i> Detalii de plata</h5>
                <hr class="my-0">
                <div class="card-body" style="margin: 0 auto;">
                    <div class="my-credit-card">
                        <div class="card-content">
                            <div class="row">
                                <h5 class="card-label mb-3">Numar card</h5>
                                <h6 id="card-number" class="card-input mb-4">0000 0000 0000 0000</h6>
                            </div>
                            <div class="row">
                                <div class="col-md-9">
                                    <h5 class="card-label mb-3">Data expirare</h5>
                                    <h6 id="card-expiration" class="card-input mb-4">00 / 00</h6>
                                </div>
                                <div class="col-md-3">
                                    <h5 class="card-label">CVC</h5>
                                    <h6 id="card-cvc" class="card-input">000</h6>
                                </div>
                            </div>
                            <div class="row">
                                <h5 class="card-label mb-3">Nume detinator</h5>
                                <h6 id="card-owner" class="card-input mb-4">Nume Prenume</h6>
                            </div>
                        </div>
                        <div class="wave"></div>
                    </div>
                        <div id="card-row" class="row" style="margin: 0 auto; margin-top: 30px;">
                            <div id="card" style="width: 400px; border: 3px solid #00d8ff; padding: 5px; border-radius:10px;"></div>
                        </div>

                        @if(Session::has('stripe_error'))
                        <p style="color: red">Plata nu a putut fi efectuata!</p>
                        @endif
                </div>
                <form method="POST" action="{{route('stripe.store')}}" id="stripe_submit">
                    @csrf
                <hr class="my-0">
                <div class="card-body" style="margin-bottom: 15px;">
                    <div class="col-md-6">
                        <h5 style="margin: 0px; margin-left: 50px;"><b>TOTAL REZERVARE:</b></h5>
                    </div>
                    <div class="col-md-6">
                        <h5 style="margin: 0px;"><b>{{$price}}&ensp;LEI</b></h5>
                    </div>
                </div>
                <input type="hidden" name="stripe_email" value="{{$user['email']}}">
                <input type="hidden" name="price_stripe" value="{{$price}}">
                <hr class="my-0">
                <div class="card-body" style="margin: 0 auto;">
                    <div class="row">
                        <button type="submit" class="btn btn-danger" style="width: fit-content; margin: 0 auto;">Efectueaza plata</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
</body>

<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>

<script>

    @if(Session::has('stripe_success'))

    var month_in = @if($search_data['check_in']['month'] < 10) "0" + @endif "{{$search_data['check_in']['month']}}";
    var month_out = @if($search_data['check_out']['month'] < 10) "0" + @endif "{{$search_data['check_out']['month']}}";

    var checkIn = "{{$search_data['check_in']['year']}}-" + month_in + "-{{$search_data['check_in']['day']}}";
    var checkOut = "{{$search_data['check_out']['year']}}-" + month_out + "-{{$search_data['check_out']['day']}}";

    var adults = "{{Session::get('adults')}}";
    var children = "{{Session::get('children')}}";

    $.ajax({
        url: "{{route('make-reservation')}}",
        type: "POST",
        data: { '_token': "{{csrf_token()}}", 
                'paymentType': "card",
                'fullName': document.getElementById('card-name').value,
                'email': document.getElementById('email').value,
                'checkIn': checkIn,
                'checkOut': checkOut,
                'roomNumber': {{$room->roomNumber}},
                'adults': adults,
                'children': children,
                'id_Room': {{$room->id_Room}},
                'id_User': {{$user['id_User']}}},
        success: function(data, xhr, status) {
            window.location.href = "{{route('clear-reservation-cache')}}";
        }
    });
    @endif


    @if(!Session::has('res-success'))
    var name_bouncy = document.getElementById('name-bouncy');
    var name_input = document.getElementById('card-name');
    var email_bouncy = document.getElementById('email-bouncy');
    var email_input = document.getElementById('email');
    var tel_bouncy = document.getElementById('tel-bouncy');
    var tel_input = document.getElementById('phoneNumber');
    var adulti_bouncy = document.getElementById('adulti-bouncy');
    var adulti_input = document.getElementById('adulti');
    var copii_bouncy = document.getElementById('copii-bouncy');
    var copii_input = document.getElementById('copii');

    window.onload = function() {
        if (name_input.value == "") {
            if (!name_bouncy.classList.contains('fa-bounce')) {
                name_bouncy.classList.add('fa-bounce')
            }
        } else {
            name_bouncy.classList.remove('fa-bounce');
        }

        if (email_input.value == "") {
            if (!email_bouncy.classList.contains('fa-bounce')) {
                email_bouncy.classList.add('fa-bounce')
            }
        } else {
            email_bouncy.classList.remove('fa-bounce');
        }

        if (tel_input.value == "") {
            if (!tel_bouncy.classList.contains('fa-bounce')) {
                tel_bouncy.classList.add('fa-bounce')
            }
        } else {
            tel_bouncy.classList.remove('fa-bounce');
        }

        if (adulti_input.value == "") {
            if (!adulti_bouncy.classList.contains('fa-bounce')) {
                adulti_bouncy.classList.add('fa-bounce')
            }
        } else {
            adulti_bouncy.classList.remove('fa-bounce');
        }

        if (copii_input.value == "") {
            if (!copii_bouncy.classList.contains('fa-bounce')) {
                copii_bouncy.classList.add('fa-bounce')
            }
        } else {
            copii_bouncy.classList.remove('fa-bounce');
        }
    }

    name_input.onkeyup = function(event) {
        if (name_input.value == "") {
            if (!name_bouncy.classList.contains('fa-bounce')) {
                name_bouncy.classList.add('fa-bounce')
            }
        } else {
            name_bouncy.classList.remove('fa-bounce');
        }
    };

    email_input.onkeyup = function(event) {
        if (email_input.value == "") {
            if (!email_bouncy.classList.contains('fa-bounce')) {
                email_bouncy.classList.add('fa-bounce')
            }
        } else {
            email_bouncy.classList.remove('fa-bounce');
        }
    };

    tel_input.onkeyup = function(event) {
        if (tel_input.value == "") {
            if (!tel_bouncy.classList.contains('fa-bounce')) {
                tel_bouncy.classList.add('fa-bounce')
            }
        } else {
            tel_bouncy.classList.remove('fa-bounce');
        }
    };

    adulti_input.onkeyup = function(event) {
        if (adulti_input.value == "") {
            if (!adulti_bouncy.classList.contains('fa-bounce')) {
                adulti_bouncy.classList.add('fa-bounce')
            }
        } else {
            adulti_bouncy.classList.remove('fa-bounce');
        }
    };

    copii_input.onkeyup = function(event) {
        if (copii_input.value == "") {
            if (!copii_bouncy.classList.contains('fa-bounce')) {
                copii_bouncy.classList.add('fa-bounce')
            }
        } else {
            copii_bouncy.classList.remove('fa-bounce');
        }
    };
    @endif
</script>

<script>
    var card_inp = document.getElementById('card_inp');
    var cash_inp = document.getElementById('cash_inp');
    var card_panel = document.getElementById('card_pay');
    var cash_panel = document.getElementById('cash_pay');
    var once = true;

    card_inp.addEventListener('change', function() {
        if (this.checked) {
            card_panel.style.display = "flex";
            cash_panel.style.display = "none";
        } else {
            card_panel.style.display = "none";
            cash_panel.style.display = "flex";
        }
    });

    cash_inp.addEventListener('change', function() {
        if (this.checked) {
            cash_panel.style.display = "flex";
            card_panel.style.display = "none";
        } else {
            cash_panel.style.display = "none";
            card_panel.style.display = "flex";
        }
    });

    $("#pay_cash").on('click', function () {

        var month_in = @if($search_data['check_in']['month'] < 10) "0" + @endif "{{$search_data['check_in']['month']}}";
        var month_out = @if($search_data['check_out']['month'] < 10) "0" + @endif "{{$search_data['check_out']['month']}}";

        var checkIn = "{{$search_data['check_in']['year']}}-" + month_in + "-{{$search_data['check_in']['day']}}";
        var checkOut = "{{$search_data['check_out']['year']}}-" + month_out + "-{{$search_data['check_out']['day']}}";

        var adults = document.getElementById('adulti').value;
        var children = document.getElementById('copii').value;

        if(adults != '' && children != '' && parseInt(adults) + parseInt(children) <= {{$roomtype->capacity + 1}} && once) {
            once = false;
            $.ajax({
                url: "{{route('make-reservation')}}",
                type: "POST",
                data: { '_token': "{{csrf_token()}}", 
                        'paymentType': "cash",
                        'fullName': document.getElementById('card-name').value,
                        'email': document.getElementById('email').value,
                        'checkIn': checkIn,
                        'checkOut': checkOut,
                        'roomNumber': {{$room->roomNumber}},
                        'adults': adults,
                        'children': children,
                        'id_Room': {{$room->id_Room}},
                        'id_User': {{$user['id_User']}}},
                success: function(data, xhr, status) {
                    window.location.href = "{{route('clear-reservation-cache')}}";
                }
            });
        }else if(!once) {
            alert('Rezervarea este in curs de inregistrare');
        }

    });


</script>


<script>
    let stripe = Stripe('{{ env("STRIPE_KEY") }}');
    const elements = stripe.elements();
    const cardElement = elements.create('card', {
        hidePostalCode: true,
        style: {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                },
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a',
            }
        }
    });
    const cardForm = document.getElementById('stripe_submit');
    const cardName = document.getElementById('card-name');
    cardElement.mount('#card');


    cardForm.addEventListener('submit', async (e) => {

        e.preventDefault()

        var adults = document.getElementById('adulti').value;
        var children = document.getElementById('copii').value;

        if(adults != '' && children != '' && parseInt(adults) + parseInt(children) <= {{$roomtype->capacity + 1}} && once) {
            const {
                paymentMethod,
                error
            } = await stripe.createPaymentMethod({
                type: 'card',
                card: cardElement,
                billing_details: {
                    name: cardName.value
                }
            })
            if (error) {
                console.log(error)
                console.log(my_border)
            } else {
                let input = document.createElement('input')
                input.setAttribute('type', 'hidden')
                input.setAttribute('name', 'payment_method')
                input.setAttribute('value', paymentMethod.id)
                cardForm.appendChild(input)

                let ad = document.createElement('input')
                ad.setAttribute('type', 'hidden')
                ad.setAttribute('name', 'adults')
                ad.setAttribute('value', adulti_input.value)
                cardForm.appendChild(ad)

                let ch = document.createElement('input')
                ch.setAttribute('type', 'hidden')
                ch.setAttribute('name', 'children')
                ch.setAttribute('value', copii_input.value)
                cardForm.appendChild(ch)

                cardForm.submit()
            }
        }
    })
</script>
<script src="{{asset('js/event-handler.js')}}"></script>