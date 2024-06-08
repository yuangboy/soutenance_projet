<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <!-- Favicons -->
     <link rel="stylesheet" href="{{ asset('templates/') }}">
     <link href="{{ asset('templates/assets/img/favicon.png') }}" rel="icon">
     <link href="{{ asset('templates/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

     <!-- Google Fonts -->
     <link href="https://fonts.gstatic.com" rel="preconnect">
     <link
         href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
         rel="stylesheet">

     <!-- Vendor CSS Files -->
     <link href="{{ asset('templates/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
     <link href="{{ asset('templates/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
     <link href="{{ asset('templates/assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
     <link href="{{ asset('templates/assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
     <link href="{{ asset('templates/assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
     <link href="{{ asset('templates/assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
     <link href="{{ asset('templates/assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

     <!-- Template Main CSS File -->
     <link href="{{ asset('templates/assets/css/style.css') }}" rel="stylesheet">
    <title>Document</title>
</head>
<body>

    <header id="header" class="header fixed-top d-flex align-items-center">

        <div class="d-flex align-items-center justify-content-between">
            <a href="index.html" class="logo d-flex align-items-center">
                <img src="{{ asset('templates/assets/img/logo.png') }}" alt="">
                <span class="d-none d-lg-block">NiceAdmin</span>
            </a>
            <i class="bi bi-list toggle-sidebar-btn"></i>
        </div><!-- End Logo -->

        <div class="search-bar">
            <form class="search-form d-flex align-items-center" method="GET">
                <br><br><br><br>
                <input type="text" name="query" placeholder="Search" title="Saisir le nom d'un service"
                    name="search">



                <button type="submit" title="Search"><i class="bi bi-search"></i></button>
            </form>
        </div><!-- End 0Search Bar -->

        <nav class="header-nav ms-auto">
            <ul class="d-flex align-items-center">

                <li class="nav-item d-block d-lg-none">
                    <a class="nav-link nav-icon search-bar-toggle " href="#">
                        <i class="bi bi-search"></i>
                    </a>
                </li><!-- End Search Icon-->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-bell"></i>
                        <span class="badge bg-primary badge-number">4</span>
                    </a><!-- End Notification Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
                        <li class="dropdown-header">
                            You have 4 new notifications
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-exclamation-circle text-warning"></i>
                            <div>
                                <h4>Lorem Ipsum</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>30 min. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-x-circle text-danger"></i>
                            <div>
                                <h4>Atque rerum nesciunt</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>1 hr. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-check-circle text-success"></i>
                            <div>
                                <h4>Sit rerum fuga</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>2 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="notification-item">
                            <i class="bi bi-info-circle text-primary"></i>
                            <div>
                                <h4>Dicta reprehenderit</h4>
                                <p>Quae dolorem earum veritatis oditseno</p>
                                <p>4 hrs. ago</p>
                            </div>
                        </li>

                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li class="dropdown-footer">
                            <a href="#">Show all notifications</a>
                        </li>
                        

                    </ul><!-- End Notification Dropdown Items -->

                </li><!-- End Notification Nav -->

                <li class="nav-item dropdown">

                    <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
                        <i class="bi bi-chat-left-text"></i>
                        <span class="badge bg-success badge-number">3</span>
                    </a><!-- End Messages Icon -->

                    <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow messages">
                        <li class="dropdown-header">
                            You have 3 new messages
                            <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="{{ asset('templates/assets/img/messages-1.jpg') }}" alt=""
                                    class="rounded-circle">
                                <div>
                                    <h4>Maria Hudson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>4 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-2.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>Anna Nelson</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>6 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="message-item">
                            <a href="#">
                                <img src="assets/img/messages-3.jpg" alt="" class="rounded-circle">
                                <div>
                                    <h4>David Muldon</h4>
                                    <p>Velit asperiores et ducimus soluta repudiandae labore officia est ut...</p>
                                    <p>8 hrs. ago</p>
                                </div>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li class="dropdown-footer">
                            <a href="#">Show all messages</a>
                        </li>

                    </ul><!-- End Messages Dropdown Items -->

                </li><!-- End Messages Nav -->



                    <li class="nav-item dropdown pe-3">

                        <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#"
                            data-bs-toggle="dropdown">
                            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                            <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                        </a><!-- End Profile Iamge Icon -->

                        <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                            <li class="dropdown-header">
                                <h6></h6>
                                <span>Web Designer</span>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>

                            <li>




                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-person"></i>
                                <span>My Profile</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="users-profile.html">
                                <i class="bi bi-gear"></i>
                                <span>Account Settings</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="pages-faq.html">
                                <i class="bi bi-question-circle"></i>
                                <span>Need Help?</span>
                            </a>
                        </li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>

                        <li>
                            <a class="dropdown-item d-flex align-items-center" href="{{route('deconnexion.patient')}}">
                                <i class="bi bi-box-arrow-right"></i>
                                <span >Sign out</span>
                            </a>
                        </li>

                    </ul><!-- End Profile Dropdown Items -->
                </li><!-- End Profile Nav -->

            </ul>
        </nav><!-- End Icons Navigation -->

    </header><!-- End Header -->


{{-- header en haut --}}


    @extends('patient.sidebar')

    @section('page-content')

    <aside id="sidebar" class="sidebar">

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Tables</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                    <a href="#" class="active">
                        <i class="bi bi-circle"></i><span>Data Tables</span>
                    </a>
            </li>
        </ul>
        </li><!-- End Tables Nav -->
        </ul>

        <ul class="sidebar-nav" id="sidebar-nav">

            <li class="nav-item">
                <a class="nav-link " data-bs-target="#tables-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-layout-text-window-reverse"></i><span>Service</span><i
                        class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="tables-nav" class="nav-content collapse show" data-bs-parent="#sidebar-nav">

                    <a href="{{route('patient.rdvProgramme')}}" class="active">
                        <i class="bi bi-circle"></i><span>service associé</span>
                    </a>
            </li>
        </ul>
        </li><!-- End Tables Nav -->
        </ul>

    </aside>

    @endsection


    <section class="section">
        <div class="row">
            <div class="col-lg-12">

                <div class="card">



                        <!-- Affichage des résultats de recherche -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th><b>N</b>ame</th>
                                    <th>Description</th>

                                </tr>
                            </thead>
                            <tbody>

                                    <tr>
                                        <td></td>
                                        <td></td>
                                        {{-- <td>Curicó</td>
                              <td>2005/02/11</td>
                              <td>37%</td> --}}
                                    </tr>

                            </tbody>
                        </table>
                        <!-- Affichage de la pagination -->
                        {{-- @if ($searchService->hasPages())
                            {{ $searchService->links() }}
                        @endif --}}



                    <!-- End Table with stripped rows -->

                </div>
            </div>

        </div>
        </div>
    </section>










    {{-- <form action="{{ route('patient.rdvProgramme') }}" method="GET">
        <input type="search" name="search">
        <input type="submit" value="search">
    </form>

    @if ($searchService)
        <!-- Afficher les détails du service -->
        <h2>{{ $searchService->libelle }}</h2>

        <!-- Afficher les praticiens associés -->
        @if ($praticiens && $praticiens->isNotEmpty())
            <h3>Praticiens associés :</h3>
            <ul>
                @foreach ($praticiens as $praticien)
                <li>{{$praticien->mattricule}}</li>
                <li>{{$praticien->specialite}}</li>
                <li>{{$praticien->service_id}}</li>
                <li>{{$praticien->personnes_id}}</li>
                @endforeach
            </ul>
        @else
            <p>Aucun praticien associé à ce service.</p>
        @endif

        <!-- Formulaire de prise de rendez-vous -->
        <form action="" method="post">
            @csrf
            <input type="hidden" name="service_id" value="{{ $searchService->id }}">
            <label for="motif">Motif :</label>
            <input type="text" name="motif" id="motif">
            <label for="date">Date :</label>
            <input type="date" name="date" id="date">
            <label for="heure">Heure :</label>
            <input type="time" name="heure" id="heure">
            <!-- Autres champs du formulaire (si nécessaire) -->
            <button type="submit">Prendre rendez-vous</button>
        </form>
    @else
        <p>Aucun service trouvé.</p>
    @endif --}}



    <script src="{{ asset('templates/assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('templates/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('templates/assets/vendor/chart.js/chart.umd.js') }}"></script>
    <script src="{{ asset('templates/assets/vendor/echarts/echarts.min.js') }}"></script>
    <script src="{{ asset('templates/assets/vendor/quill/quill.js') }}"></script>
    <script src="{{ asset('templates/assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
    <script src="{{ asset('templates/assets/vendor/tinymce/tinymce.min.js') }}"></script>
    <script src="{{ asset('templates/assets/vendor/php-email-form/validate.js') }}"></script>

    <!-- Template Main JS File -->
    <script src="{{ asset('templates/assets/js/main.js') }}"></script>


</body>
</html>
