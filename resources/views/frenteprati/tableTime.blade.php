<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>HGD</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('assets/img/favicon.png')}}"  rel="icon">
  <link href="{{ asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}"  rel="stylesheet">
  <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.snow.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/quill/quill.bubble.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/remixicon/remixicon.css')}}" rel="stylesheet">
  <link href="{{ asset('assets/vendor/simple-datatables/style.css')}}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet">
  <!-- =======================================================
  * Template Name: NiceAdmin
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Updated: Apr 20 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="/frenteprati" class="logo d-flex align-items-center">
        <img src="{{ asset('assets/img/logoSoutenace.png')}}" alt="">
        <span class="d-none d-lg-block"><h5 style="color: #0a405f;">Praticien</h5></span>
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
            <img src="{{ asset('assets/img/profile-img.jpg')}}" alt="Profile" class="rounded-circle">
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
                    <a class="dropdown-item d-flex align-items-center" href="/userprofil">
                        <i class="bi bi-person"></i>
                        <span>My Profile</span>
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

 @extends("frenteprati.aside.pratiaside")
  <!-- ======= Sidebar ======= -->

  <!-- End Sidebar-->

  <main id="main" class="main">

    <!-- End Page Title -->

    <section class="section faq">
      <div class="row">
        <div class="col-lg-12">

          <div class="card basic">
            <div class="card-body">
              <h5 class="card-title">Definir les horaires de consultation</h5>
                <div class="container">
        <h4>Gérer les horaires</h4>

        @if(session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <a href="{{ route('horaires.create') }}">Créer un nouvel horaire</a>
            <br><br>
        <h4>Horaires</h4>
        <ul>
            @forelse ($horaires as $horaire)
                <li>
                    <p>Début : {{ $horaire->start_time }}</p>
                    <p>Fin : {{ $horaire->end_time }}</p>
                    <p>Disponible : {{ $horaire->is_available ? 'Oui' : 'Non' }}</p>
                    <form action="{{ route('horaires.destroy', $horaire->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Supprimer</button>
                    </form>
                </li>
            @empty
                <li>Aucun horaire défini</li>
            @endforelse
        </ul>
    </div>

            </div>
          </div>

          <!-- F.A.Q Group 1 -->
          <!-- End F.A.Q Group 1 -->

        </div>



      </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>NiceAdmin</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets/vendor/apexcharts/apexcharts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/chart.js/chart.umd.js')}}"></script>
  <script src="{{ asset('assets/vendor/echarts/echarts.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/quill/quill.js')}}"></script>
  <script src="{{ asset('assets/vendor/simple-datatables/simple-datatables.js')}}"></script>
  <script src="{{ asset('assets/vendor/tinymce/tinymce.min.js')}}"></script>
  <script src="{{ asset('assets/vendor/php-email-form/validate.js')}}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('assets/js/main.js')}}"></script>

</body>

</html>
