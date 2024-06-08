
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>GESTION ELEVErt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Meta Tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="keywords" content="Site keywords here">
		<meta name="description" content="">
		<meta name='copyright' content=''>
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Title -->
        <title>Hopital general de djiri.</title>

		<!-- Favicon -->
        <link rel="icon" href="{{ asset('frontend/assetsimg/favicon.png')}}">

		<!-- Google Fonts -->
		<link href="https://fonts.googleapis.com/css?family=Poppins:200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i&display=swap" rel="stylesheet">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css')}}">
		<!-- Nice Select CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/nice-select.css')}}">
		<!-- Font Awesome CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/font-awesome.min.css')}}">
		<!-- icofont CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/icofont.css')}}">
		<!-- Slicknav -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/slicknav.min.css')}}">
		<!-- Owl Carousel CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/owl-carousel.css')}}">
		<!-- Datepicker CSS -->
		<link rel="stylesheet" href="{{ asset('frontend/assets/css/datepicker.css')}}">
		<!-- Animate CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/animate.min.css')}}">
		<!-- Magnific Popup CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/magnific-popup.css')}}">

		<!-- Medipro CSS -->
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/normalize.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/style.css')}}">
        <link rel="stylesheet" href="{{ asset('frontend/assets/css/responsive.css')}}">

</head>
  <style type="text/css">


.menuss {
    height: 100vh; /* Définir la hauteur du menu à 100% */
    width: 15%; /* Ajustez la largeur du menu selon vos besoins */
    background-color: #070707;
    float: left; /* Ajouter float:left pour que le menu reste sur le côté gauche */
}

.menuss ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
}

.menuss ul li {
    padding: 8px 0;
}

.menuss ul li a {
    display: block;
    text-decoration: none;
    color: #fffdfd;
}

.menuss ul li a:hover {
    color: #f4f3f3;
}

.rigth {
    width: 85%;
   float: right;
}

ul {
    list-style-type: none;
    margin: 0;
    padding: 0;

  }

  /* Style pour les liens principaux */
  li {
    position: relative;
  }

  /* Style pour les liens principaux */
  li a {
    display: block;
    padding: 10px 20px;
    text-decoration: none;
    color: #333;
  }

  /* Style pour les sous-menus */

</style>

  <body>

    <div class="row">
        <header class="header" >
            <!-- Topbar -->
			<div class="topbar">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-5 col-12">
							<!-- Contact -->
                            <h3>espace reservé au profil</3>
						</div>
						<div class="col-lg-6 col-md-7 col-12">
                            <h3>du praticien</h3>
						</div>
					</div>
				</div>
			</div>
			<!-- End Topbar -->
        </header>

         <div class="menuss" style="height: 100vh" >
                   <ul>
                    <li class="main-item">
                                <a href="#">Patientvfvs</a>
                                <ul class="sub-menu">
                                <li><a href="#">Liste de tous les patients</a></li>
                                <li><a href="#">Liste rendez-vous patient</a></li>
                                </ul>
                            </li>
                            <li class="main-item">
                                <a href="#">Rendez-vous</a>
                                <ul class="sub-menu">
                                <li><a href="#">Liste rendez-vous en attente</a></li>
                                <li><a href="#">Liste rendez-anuler</a></li>

                                </ul>
                            </li>
                            <li class="main-item">
                                <a href="#">Docier medical patient</a>
                                <ul class="sub-menu">
                                <li><a href="#">Editer</a></li>
                                <li><a href="#">Consulter</a></li>
                                </ul>
                            </li>
                            <li class="main-item">
                                <a href="#">Emplois du temps</a>
                                <ul class="sub-menu">
                                <li><a href="#">Modifier </a></li>
                                <li><a href="#">Supprimer</a></li>

                                </ul>
                            </li>
                </ul>
        </div>
        <div class="rigth">
            <header class="header" >

			<!-- Header Inner -->
			<div class="header-inner">
				<div class="container">
					<div class="inner">
						<div class="row">
							<div class="col-lg-3 col-md-3 col-12">
								<!-- Start Logo -->
								<div class="logo">
									<a href="index.html"><img src="{{ asset('frontend/assets/img/logoSoutenace.png')}}" alt="#" width="70px"></a>
								</div>
								<!-- End Logo -->
								<!-- Mobile Nav -->
								<div class="mobile-nav"></div>
								<!-- End Mobile Nav -->
							</div>
							<div class="col-lg-7 col-md-9 col-12">
								<!-- Main Menu -->
								<div class="main-menu">
									<nav class="navigation">
										<ul class="nav menu">
											<li class="active"><a href="#">Accieul <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="index.html">Accieul 1</a></li>
												</ul>
											</li>
											<li><a href="#">Patient</a></li>

											<li><a href="#">Services </a></li>

											<li><a href="#">Actualités <i class="icofont-rounded-down"></i></a>
												<ul class="dropdown">
													<li><a href="blog-single.html">Actualité Details</a></li>
												</ul>
											</li>
											<li><a href="contact.html">Contacts</a></li>

										</ul>

									</nav>
								</div>
								<!--/ End Main Menu -->
							</div>

						</div>
					</div>
				</div>
			</div>
			<!--/ End Header Inner -->
		</header>

            </div>

        {{-- Fin service --}}

        {{--users--}}

        {{--endeusers--}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>

