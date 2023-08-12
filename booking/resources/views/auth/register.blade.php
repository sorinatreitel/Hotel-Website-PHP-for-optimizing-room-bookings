<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{asset('/css/core.css')}}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{asset('/css/theme-default.css')}}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{asset('/css/demo.css')}}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('/css/page-auth.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/style.css')}}" /> 
    <!-- Helpers -->
    <script src="{{asset('/js/helpers.js')}}"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="{{asset('/js/config.js')}}"></script>
  </head>

  <img src="{{asset('images/room-bg.jpg')}}" style="position: fixed; top: 0px; z-index: -1; object-fit: fill; filter: brightness(70%);"/>

  <body>
    <!-- Content -->

    <div class="container-xxl">
      <div class="authentication-wrapper authentication-basic container-p-y">
        <div class="authentication-inner" style="opacity: 0.90">
          <!-- Register Card -->
          <div class="card">
            <div class="card-body">
                <div class="mb-2">
                    <div class="logo" style="text-align: center; margin-bottom: 50px; ">
                        <a href="{{route('home')}}" style="color: black;">
                        Perla<span>Somesului</span>
                        </a>
                    </div>
                </div>

                @if(Session::has('error'))
                <p style="color: red;">{{Session::get('error')}}</p>
                @endif

                <h4 class="mb-2">Bun venit la noi! 🌳⭐🏨 </h4>
                <form id="formAuthentication" class="mb-3" action="{{route('registerPost')}}" method="POST">
                    @csrf
                    <div class="mb-3">
                    <label for="username" class="form-label">Nume complet<span style="color: red"> * </span></label>
                    <input
                        type="text"
                        class="form-control"
                        id="name"
                        name="name"
                        placeholder="Introduceți numele complet"
                        autofocus
                        required
                    />
                    </div>
                    <div class="mb-3">
                    <label for="username" class="form-label">Username<span style="color: red"> * </span></label>
                    <input
                        type="text"
                        class="form-control"
                        id="username"
                        name="username"
                        placeholder="Introduceți username-ul"
                        autofocus
                        required
                    />
                    </div>
                    <div class="mb-3">
                      <label for="username" class="form-label">Numar de telefon<span style="color: red"> * </span></label>
                      <input
                          type="text"
                          class="form-control"
                          id="phone"
                          name="phoneNumber"
                          placeholder="Introduceți numarul de telefon"
                          autofocus
                          required
                      />
                      @if($errors->has('phoneNumber'))
                      <p style="color: red">Nu ati introdus numarul de telefon intr-un format valid!</p>
                      @endif
                      </div>
                    <div class="mb-3">
                    <label for="email" class="form-label">Email<span style="color: red"> * </span></label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="Introduceti adresa de email" required/>
                    @if($errors->has('email'))
                    <p style="color: red">Nu ati introdus adresa de email intr-un format valid!</p>
                    @endif
                    </div>
                    <div class="mb-3 form-password-toggle">
                    <label class="form-label" for="password">Parola<span style="color: red"> * </span></label>
                    <div class="input-group input-group-merge">
                        <input
                        type="password"
                        id="password"
                        class="form-control"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password"
                        required
                        />
                        <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    </div>
                    @if($errors->has('password'))
                    <p style="color: red">Parola trebuie sa aiba minim 6 caractere!</p>
                    @endif
                    </div>

                    <div class="mb-3">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" />
                        <label class="form-check-label" for="terms-conditions">
                        Accept
                        <a href="{{route('terms')}}" target="_blank" @if(Session::has('errmsg')) style="color: red" @endif>termenii si conditiile </a><span style="color: red"> * </span>
                        </label>
                    </div>
                    </div>
                    <button class="btn btn-primary d-grid w-100">Inregistrare</button>
                </form>

              <p class="text-center">
                <span>Ai deja un cont?</span>
                <a href="{{route('login')}}">
                  <span>Logheaza-te</span>
                </a>
              </p>
            </div>
          </div>
          <!-- Register Card -->
        </div>
      </div>
    </div>


    <!-- Core JS -->s
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>