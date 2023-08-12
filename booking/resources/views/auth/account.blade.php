<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">

    <title>Modificări cont</title>

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
</head>

<body>

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
    use App\Models\User;

    $user = Session::get('user');
    @endphp

    <div class="container-fluid" style="margin-top: 70px; opacity: 0.90;">
        <div class="col-md-12">
            <div class="card mb-4">
                <h5 class="card-header">Detaliile profilului</h5>
                <!-- Account -->
                <div class="card-body">
                    <form method="post" action={{route('change-prof-picture')}} id="prof_form" enctype="multipart/form-data">
                        @csrf
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="{{asset('/images/' . $user['profile'])}}" alt="user-avatar" class="d-block rounded" height="100" width="100" id="uploadedAvatar">
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Incarcati o imagine noua</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" onchange="document.getElementById('prof_form').submit()" class="account-file-input" hidden="" name="profile_picture" accept="image/png, image/jpeg">
                            </label>
                            <p class="text-muted mb-0">Doar format JPG sau PNG.</p>
                        </div>
                    </div>
                    </form>
                </div>
                <hr class="my-0">

                <div class="card-body">
                    <form id="formAccountSettings" method="POST" action="{{route('update-client')}}">
                        @csrf
                        <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="firstName" class="form-label">Nume Complet</label>
                                <input class="form-control" type="text" id="firstName" name="name" value="{{$user['name']}}" autofocus="">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email" value="{{$user['email']}}" placeholder="email">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label class="form-label" for="phoneNumber">Numar de telefon</label>
                                <input type="text" id="phoneNumber" name="phoneNumber" class="form-control" value="{{$user['phoneNumber']}}" placeholder="0769 420 696">
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label">Username</label>
                                <input class="form-control" type="text" id="username" name="username" placeholder="username" value="{{$user['username']}}">
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Salveaza modificarile</button>
                        </div>
                        @if(Session::has('message'))
                            <p style="color: green;">Datele au fost modificate cu succes</p>
                        @endif
                    </form>
                </div>
                <!-- /Account -->
            </div>
            <div class="card">
                <h5 class="card-header">Sterge cont</h5>
                <div class="card-body">
                    <div class="mb-3 col-12 mb-0">
                        <div class="alert alert-warning">
                            <h6 class="alert-heading fw-bold mb-1">Sunteti sigur ca doriti sa stergeti acest cont?</h6>
                            <p class="mb-0">O data ce contul dumneavoastra este sters, acesta nu se va mai putea recupera.</p>
                        </div>
                    </div>
                    <form id="formAccountDeactivation" method="POST" action="{{route('del-current-account')}}">
                        @csrf
                        <div class="form-check mb-3">
                            <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation">
                            <label class="form-check-label" for="accountActivation" @if(Session::has('errmsg')) style="color: red" @endif>Confirm stergerea contului</label>
                        </div>
                        <button type="submit" class="btn btn-danger deactivate-account">Sterge cont</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

<script src="{{asset('/js/jquery.js')}}"></script>
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
