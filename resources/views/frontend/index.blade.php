@extends('frontend.layouts.front')
@section('body')

    <!-- Slider Area -->
		<section class="slider">
			<div class="hero-slider">
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('{{ asset('frontend/assets/img/hp1.jpg')}}')">
					<div class="container">
						<div class="row">
							<div class="col-lg-6">
								<div class="text">
									<h1>Prendre <span>Des rendez vous en ligne</span> Via votre mobile <span>!</span></h1>

									<div class="button">
										<a href="/rdv" class="btn">Obtenir un rendez-vous</a>
										<a href="#" class="btn primary">En savoir plus</a>
									</div>
								</div>
							</div>


                    </div>
                    </div>
                </div>

				<!-- End Single Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('{{asset('frontend/assets/img/db2.jpg')}}')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Acceder en toute sécurité <span>à votre dossier médical</span> Via votre mobile <span>!</span></h1>

									<div class="button">
										<a href="/rdv" class="btn">Obtenir un rendez-vous</a>
										<a href="#" class="btn primary">A propos</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- Start End Slider -->
				<!-- Start Single Slider -->
				<div class="single-slider" style="background-image:url('{{ asset('frontend/assets/img/bd.jpg')}}')">
					<div class="container">
						<div class="row">
							<div class="col-lg-7">
								<div class="text">
									<h1>Contacter <span>Son Pratcien</span> Et se faire consulter partout <span>!</span></h1>

									<div class="button">
										<a href="/rdv" class="btn">Obtenir un Rendez-vous</a>
										<a href="#" class="btn primary">Conatcter maintenant</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- End Single Slider -->
			</div>
		</section>
		<!--/ End Slider Area -->

		<!-- Start Schedule Area -->
       <section class="schedule">
			<div class="container">
				<div class="schedule-inner">
					<div class="row">
						<div class="col-lg-4 col-md-6 col-12 ">
							<!-- single-schedule -->
							<div class="single-schedule first">
								<div class="inner">
									<div class="icon">
										<i class="fa fa-ambulance"></i>
									</div>
									<div class="single-content">
										<span>Lorem Amet</span>
										<h4>Emergency Cases</h4>
										<p>Lorem ipsum sit amet consectetur adipiscing elit. Vivamus et erat in lacus convallis sodales.</p>
										<a href="#">LEARN MORE<i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-12">
							<!-- single-schedule -->
							<div class="single-schedule middle">
								<div class="inner">
									<div class="icon">
										<i class="icofont-prescription"></i>
									</div>
									<div class="single-content">
										<span></span>
										<h4>Emplois du temps des praticiens</h4>
										<p>En selectionnant un service et le praticien de votre choix, acceder à son emplois du temps.</p>
										<a href="#">En savoir plus<i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-12 col-12">
							<!-- single-schedule -->
							<div class="single-schedule last">
								<div class="inner">
									<div class="icon">
										<i class="icofont-ui-clock"></i>
									</div>
									<div class="single-content">
										<span></span>
										<h4>Heures d'ouverture</h4>
										<ul class="time-sidual">
											<li class="day">La platforme est active 24h/24h</span></li>
											<li class="day">Vous pouvez à tout moment être informé</span></li>
											<li class="day">de la disponibilité de vos praticiens de santé </span></li>
										</ul>
										<a href="#">En savoir plus<i class="fa fa-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/End Start schedule Area -->

		<!-- Start Feautes -->
        <br><br><br><br>
		<section class="Feautes section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Nous sommes toujours prêt à vous venir en aide en tout lieu.</h2>

							<p>Faites vous consulter et accedez à votre dossier médical en tout lieu!!</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
							<div class="signle-icon">
								<i class="icofont icofont-ambulance-cross"></i>
							</div>
							<h3>Assurance</h3>
							<p>Plus besion de perdre le temps avec les embouteillages et vous n'oublierez plus vos rendez-vous grâce au système de gestion des notifications sur notre application.</p>
						</div>
						<!-- End Single features -->
					</div>
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features">
							<div class="signle-icon">
								<i class="icofont icofont-medical-sign-alt"></i>
							</div>
							<h3></h3>
							<p></p>
						</div>
						<!-- End Single features -->
					</div>
					<div class="col-lg-4 col-12">
						<!-- Start Single features -->
						<div class="single-features last">
							<div class="signle-icon">
								<i class="icofont icofont-stethoscope"></i>
							</div>
							<h3>Traitement medical</h3>
							<p>Vous pouvez obtenir vos ordonances en lingne sans crainte de les egarer.</p>
						</div>
						<!-- End Single features -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Feautes -->

		<!-- Start Fun-facts -->

		<!--/ End Fun-facts -->

		<!-- Start Why choose -->
		<section class="why-choose section" >
			<div class="container">

				<div class="row">
					<div class="col-lg-6 col-12">
						<!-- Start Choose Left -->
						<div class="choose-left">
							<h3>Qui Somme nous?</h3>
							<p>Est une plate fome qui vous permet d'voir des informations sur la disponiblité de vos praticiens de santé depuis chez. </p>
							<p>Vous pouvez prendre à distance un rendez-vous avec votre praticien et aussi vous faire consulter à distance puis acceder à votre dossier médical via votre mobile. </p>

						</div>
						<!-- End Choose Left -->
					</div>
					<div class="col-lg-6 col-12">
						<!-- Start Choose Rights -->
						<div class="choose-right">
							<div class="video-image">
								<!-- Video Animation -->

								<!--/ End Video Animation -->
                                <img src="{{ asset('frontend/assets/img/th.jpg')}}" alt="#">

							</div>
						</div>
						<!-- End Choose Rights -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End Why choose -->

		<!-- Start Call to action -->
		<section class="call-action overlay" data-stellar-background-ratio="0.5">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="content">
							<h2>Plus besion de craindre la perte de vos ordance avec notre système de prescripetion des ordonances en ligne.</h2>
							<p>Avec notre système de gestion de notifications, n'oubliez plus vos rendez-vous grâce à des rappels via des notifications.</p>

						</div>
					</div>
				</div>
			</div>
		</section>
		<!--/ End Call to action -->

		<!-- Start portfolio -->

		<!--/ End portfolio -->

		<!-- Start service -->
		<section class="services section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Nous offrons differents service sur notre application pour améliorer l'état santé </h2>
							<img src="{{ asset('frontend/assets/img/section-img.png')}}" alt="#">
							<p>Quelque services disponible :</p>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-prescription"></i>
							<h4><a href="service-details.html">Traitement Général</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet. </p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-tooth"></i>
							<h4><a href="service-details.html">Dentologie</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet. </p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-heart-alt"></i>
							<h4><a href="service-details.html">Service de Cardiologie</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet. </p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-listening"></i>
							<h4><a href="service-details.html">ORL service</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet. </p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-eye-alt"></i>
							<h4><a href="service-details.html">Trouble visuel</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet. </p>
						</div>
						<!-- End Single Service -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Start Single Service -->
						<div class="single-service">
							<i class="icofont icofont-blood"></i>
							<h4><a href="service-details.html">Transfusion de sang</a></h4>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec luctus dictum eros ut imperdiet. </p>
						</div>
						<!-- End Single Service -->
					</div>
				</div>
			</div>
		</section>
		<!--/ End service -->

		<!-- Pricing Table -->
		<section class="pricing-table section">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Nous vous offrons le meilleur pour un bon suivit de l'évolution de votre santé</h2>
							<img src="{{ asset('frontend/assets/img/section-img.png')}}" alt="#">

						</div>
					</div>
				</div>
				<div class="row">
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
									<i class="icofont icofont-ui-cut"></i>
								</div>
								<h4 class="title">Obtenir un rendez vous pour une intervention chirurgicale</h4>
								<div class="price">

								</div>
							</div>
							<!-- Table List -->

							<div class="table-bottom">
								<a class="btn" href="#">Obtenir un rebdez-vous</a>
							</div>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
									<i class="icofont icofont-tooth"></i>
								</div>
								<h4 class="title">Se programer une consultation avec son dentiste</h4>
							</div>
							<!-- Table List -->

							<div class="table-bottom">
								<a class="btn" href="#">Obtenir un rendez vous</a>
							</div>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
					<!-- Single Table -->
					<div class="col-lg-4 col-md-12 col-12">
						<div class="single-table">
							<!-- Table Head -->
							<div class="table-head">
								<div class="icon">
									<i class="icofont-heart-beat"></i>
								</div>
								<h4 class="title">Trouble du coeur</h4>

							</div>
							<!-- Table List -->
							<
							<div class="table-bottom">
								<a class="btn" href="#">Obtenir un rendez vous</a>
							</div>
							<!-- Table Bottom -->
						</div>
					</div>
					<!-- End Single Table-->
				</div>
			</div>
		</section>
		<!--/ End Pricing Table -->



		<!-- Start Blog Area -->
		<section class="blog section" id="blog">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Plus besion de se rendre à l'hôpital pour obtenir les résultat de ses examens.</h2>
							<img src="{{ asset('frontend/assets/img/section-img.png')}}" alt="#">

						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-news">
							<div class="news-head">
								<img src="{{ asset('frontend/assets/img/blog1.jpg')}}" alt="#">
							</div>
							<div class="news-body">
								<div class="news-content">
									<div class="date">22 Aug, 2020</div>
									<h2><a href="blog-single.html">We have annnocuced our new product.</a></h2>
									<p class="text">Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do eiusmod tempor incididunt sed do incididunt sed.</p>
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-news">
							<div class="news-head">
								<img src="{{ asset('frontend/assets/img/blog2.jpg')}}" alt="#">
							</div>

						</div>
						<!-- End Single Blog -->
					</div>
					<div class="col-lg-4 col-md-6 col-12">
						<!-- Single Blog -->
						<div class="single-news">
							<div class="news-head">
								<img src="{{ asset('frontend/assets/img/blog3.jpg')}}" alt="#">
							</div>
							<div class="news-body">
								<div class="news-content">
									<div class="date">05 Jan, 2020</div>
									<h2><a href="blog-single.html">We provide highly business soliutions.</a></h2>
									<p class="text">Lorem ipsum dolor a sit ameti, consectetur adipisicing elit, sed do eiusmod tempor incididunt sed do incididunt sed.</p>
								</div>
							</div>
						</div>
						<!-- End Single Blog -->
					</div>
				</div>
			</div>
		</section>
		<!-- End Blog Area -->

		<!-- Start clients -->
		<!--<div class="clients overlay">
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-12">
						<div class="owl-carousel clients-slider">
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client1.png')}}" alt="#">
							</div>
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client2.png')}}" alt="#">
							</div>
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client3.png')}}" alt="#">
							</div>
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client4.png')}}" alt="#">
							</div>
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client5.png')}}" alt="#">
							</div>
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client1.png')}}" alt="#">
							</div>
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client2.png')}}" alt="#">
							</div>
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client3.png')}}" alt="#">
							</div>
							<div class="single-clients">
								<img src="{{ asset('frontend/assets/img/client4.png')}}" alt="#">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div> -->
		<!--/Ens clients -->

		<!-- Start Appointment -->
		<section class="appointment">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section-title">
							<h2>Nous sommes toujours prêt à vous aidre</h2>
							<img src="{{ asset('frontend/assets/img/section-img.png')}}" alt="#">

						</div>
					</div>
				</div>

			</div>
		</section>
		<!-- End Appointment -->

		<!-- Start Newsletter Area -->
		<section class="newsletter section">
			<div class="container">
				<div class="row ">
					<div class="col-lg-6  col-12">
						<!-- Start Newsletter Form -->
						<div class="subscribe-text ">
							<h6>Sign up for newsletter</h6>
							<p class="">Cu qui soleat partiendo urbanitas. Eum aperiri indoctum eu,<br> homero alterum.</p>
						</div>
						<!-- End Newsletter Form -->
					</div>
					<div class="col-lg-6  col-12">
						<!-- Start Newsletter Form -->
						<div class="subscribe-form ">
							<form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
								<input name="EMAIL" placeholder="Your email address" class="common-input" onfocus="this.placeholder = ''"
									onblur="this.placeholder = 'Your email address'" required="" type="email">
								<button class="btn">s'inscrire</button>
							</form>
						</div>
						<!-- End Newsletter Form -->
					</div>
				</div>
			</div>
		</section>
		<!-- /End Newsletter Area -->

@endsection
