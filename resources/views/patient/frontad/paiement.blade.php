<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HGD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{asset('assets/img/patient/dashboard')}}" rel="icon">
  <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .form-container {
            background-color: #ffffff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
        }
        .form-container h2 {
            margin-bottom: 20px;
            color: #333;
        }
        .form-container label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        .form-container input, .form-container textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }
        .form-container input[type="submit"] {
            background-color: #033A03;
            color: white;
            border: none;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .form-container input[type="submit"]:hover {
            background-color: #033A03;
        }
    </style>
    <script>
        function validateNumberInput(event) {
            const key = event.key;
            if (!/^\d$/.test(key)) {
                event.preventDefault();
            }
        }

        function validatePhoneInput(event) {
            const input = event.target;
            const maxLength = 9;
            if (input.value.length >= maxLength && !["Backspace", "ArrowLeft", "ArrowRight", "Delete"].includes(event.key)) {
                event.preventDefault();
            }
            validateNumberInput(event);
        }
    </script>
</head>

<body>

  <!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center">
    <div class="d-flex align-items-center justify-content-between">
      <a href="/patient/dashboard" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logoSoutenace.png')}}" alt="">
        <span class="d-none d-lg-block"><h5 style="color: #0a405f;">Patient</h5></span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <!-- End Notification Icon -->

          <!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->
    <!-- End Messages Nav -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="{{ asset('assets/img/d.JPEG')}}" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2"><div>{{ Auth::user()->name }}</div></span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
                <h6> <div>{{ Auth::user()->name }}</div></h6>
              <span>Information du Profil</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
               <li>
                    <a class="dropdown-item d-flex align-items-center" href="/profile">
                        <i class="bi bi-person"></i>
                        <span>Mon Profile</span>
                    </a>
                </li>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>
            <li>
              <a  href="#">

                <span><form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                    this.closest('form').submit();" class="dropdown-item d-flex align-items-center">
                                <i class="bi bi-box-arrow-right"></i>
                                {{ __('Se déconnecter') }}
                            </x-dropdown-link>
                        </form></span>
              </a>
            </li>
          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->
</header>
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->

    @include('patient.sidebar.sidebar')

  {{-- fin sidebar --}}

  <main id="main" class="main">
    <h1></h1>
    <div class="pagetitle">


    </div>
<div class="form-container">
    <img src="{{ asset('assets/img/logoSoutenace.png')}}" width="50px" height="50px" alt="">
        <h3>Formulaire de paiement de frais de consultation</h3>
        <form action="{{ route('paiements.paye') }}" method="POST">
            @csrf
            <label for="amount">Montant</label>
            <input type="text" id="montant" name="montant" placeholder="Entrez le montant" onkeypress="validateNumberInput(event)" required>

            <label for="phone">Numéro de Téléphone</label>
            <input type="text" id="phone" name="phone" placeholder="Entrez votre numéro de téléphone" onkeypress="validatePhoneInput(event)" required>

            <label for="reason">Raison</label>
            <textarea id="raison" name="raison" rows="4" placeholder="Entrez la raison" required></textarea>

            <input type="submit" value="Valider">
        </form>
    </div>
    <!-- End Page Title -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
 <!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->

  <script src="{{asset('assets/vendor/apexcharts/apexcharts.min.js')}}" defer></script>
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}" defer></script>
  <script src="{{asset('assets/vendor/chart.js/chart.umd.js')}}" defer></script>
  <script src="{{asset('assets/vendor/echarts/echarts.min.js')}}" defer></script>
  <script src="{{asset('assets/vendor/quill/quill.js')}}" defer></script>
  <script src="{{asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{asset('assets/vendor/tinymce/tinymce.min.js')}}" defer></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}" defer></script>

  <!-- Template Main JS File -->
  <script src="{{asset('assets/js/main.js')}}" defer></script>

</body>

</html>
