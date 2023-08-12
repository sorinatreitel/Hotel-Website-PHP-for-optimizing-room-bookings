<!DOCTYPE html>
<html lang="en">

@php
    $user = Session::get('user');
@endphp

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Hotel Admin</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('/css/feather/feather.css')}}">
  {{-- <link rel="stylesheet" href="vendors/ti-icons/css/themify-icons.css"> --}}
  <link rel="stylesheet" href="{{asset('/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="{{asset('/css/vertical-layout-light/style.css')}}">
  <script src="https://kit.fontawesome.com/045d1ece88.js" crossorigin="anonymous"></script>
  <!-- endinject -->
  <link rel="stylesheet" href="{{asset('/css/customcss.css')}}">

  <link rel="stylesheet" href="{{asset('/css/core.css')}}" class="template-customizer-core-css" />
<link rel="stylesheet" href="{{asset('/css/theme-default.css')}}" class="template-customizer-theme-css" />
<link rel="stylesheet" href="{{asset('/css/demo.css')}}" />
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

  @yield('styles')

</head>
<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
      <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo" href="{{route('admin-home')}}">Admin Dashboard</a>
      </div>
      <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
          <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
          <li class="nav-item nav-profile dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
              <h5 style="margin-right: 50px">{{$user['name']}}</h5>
            </a>
            <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
              <a class="dropdown-item" href="{{route('manual-logout')}}">
                <i class="ti-power-off text-primary"></i>
                Deconectare
              </a>
            </div>
          </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
          <span class="icon-menu"></span>
        </button>
      </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_settings-panel.html -->
      
      <!-- partial -->
      <!-- partial:partials/_sidebar.html -->
      <nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item" id='dashboard'>
            <a class="nav-link" href="{{route('admin-home')}}">
              <i class="icon-grid menu-icon"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <li class="nav-item" id='users'>
            <a class="nav-link" href="{{route('admin-users')}}">
              <i class="fa-regular fa-circle-user menu-icon"></i>
              <span class="menu-title">Utilizatori</span>
            </a>
          </li>
          <li class="nav-item" id='rooms'>
            <a class="nav-link" href="{{route('admin-rooms')}}">
                <i class="fa-solid fa-bed menu-icon"></i>
              <span class="menu-title">Camere</span>
            </a>
          </li>
          <li class="nav-item" id='packages'>
            <a class="nav-link" href="{{route('admin-facilities')}}">
                <i class="fa-solid fa-box menu-icon"></i>
              <span class="menu-title">Facilitati Camere</span>
            </a>
          </li>
          <li class="nav-item" id='bookings'>
            <a class="nav-link" href="{{route('admin-bookings')}}">
                <i class="fa-solid fa-check menu-icon"></i>
              <span class="menu-title">Rezervari</span>
            </a>
          </li>
          <li class="nav-item" id='special'>
            <a class="nav-link" href="{{route('admin-specials')}}">
                <i class="fa-solid fa-percent menu-icon"></i>
              <span class="menu-title">Perioade Speciale</span>
            </a>
          </li>
          <li class="nav-item" id='special'>
            <a class="nav-link" href="{{route('home')}}">
                <i class="fa-solid fa-globe menu-icon"></i>
              <span class="menu-title">Spre site</span>
            </a>
          </li>
        </ul>
      </nav>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper" @yield('custom-style-div')>
          <div class="row">
            <div class="col-md-12 grid-margin">
              <div class="row">
                <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                  <h3 class="font-weight-bold">@yield('title')</h3>
                  <h6 class="font-weight-normal mb-0">@yield('subtitle')</h6>
                </div>
              </div>
            </div>
          </div>
          
          @yield('content')
        <!-- content-wrapper ends -->
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright Â© 2021.  Premium <a href="https://www.bootstrapdash.com/" target="_blank">Bootstrap admin template</a> from BootstrapDash. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="ti-heart text-danger ml-1"></i></span>
          </div>
          <div class="d-sm-flex justify-content-center justify-content-sm-between">
            <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Distributed by <a href="https://www.themewagon.com/" target="_blank">Themewagon</a></span> 
          </div>
        </footer> 
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>   
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="{{asset('/js/js/vendor.bundle.base.js')}}"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="{{asset('/js/Chart.min.js')}}"></script>
  <script src="{{asset('/js/datatables.net/jquery.dataTables.js')}}"></script>
  <script src="{{asset('/js/datatables.net-bs4/dataTables.bootstrap4.js')}}"></script>
  <script src="{{asset('/js/dataTables.select.min.js')}}"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="{{asset('/js/off-canvas.js')}}"></script>
  <script src="{{asset('/js/hoverable-collapse.js')}}"></script>
  <script src="{{asset('/js/template.js')}}"></script>
  <script src="{{asset('js/settings.js')}}"></script>
  <script src="{{asset('js/todolist.js')}}"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  {{-- <script src="{{asset('js/dashboard.js')}}"></script> --}}
  <script src="{{asset('js/Chart.roundedBarCharts.js')}}"></script>
  <!-- End custom js for this page-->
  @yield('scripts')

</body>

</html>