<!-- ======= Header ======= -->
 @extends('frontend.layouts.front')
@section('body')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->

 <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle"><br>
      <h1 style="text-align: center">Disponibilité du Praticien</h1>

    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
             <br><br><br>
              <!-- Table with stripped rows -->
              <div>
              </div><!-- End Search Bar -->
              <table class="table">


                <thead>
                  <tr >
                    <th>
                      Heure
                    </th>
                    <th>Date</th>
                    <th>Rendez-vous</th>

                  </tr>
                </thead>

            </div>
                <tbody>


                    @foreach ($rendezvous as $rdv)


                    <tr class="ligne">
                        <td>{{$rdv->heure}}</td>
                        <td>{{$rdv->date}}</td>
                        <td class="rdv"><a href="#">Prendre rendez-vous</a></td>
                        <style>

                            .rdv{
                                background-color: #140B50 !important;
                                text-align: center;
                                width: 225px;
                                transition: .2s;

                                border-radius: 5px;
                            }.rdv a{color: #fff;
                               transition: .2s ease;
                            }
                            .rdv a:hover {color: #fff;
                            color: red !important;
                            opacity: 0.5;
                            }.rdv:active{
                                padding: 20px !important;
                            }
                        </style>
                       </tr>
                       @endforeach



                </tbody>

                <tr>
                    {{-- <div class="vide" colspan="1" class="text-center">
                        <img src="{{ asset('assets/img/vide.svg') }}" alt="Aucune donnée disponible">
                    </div>
                    <style>
                        .vide{max-width: 100px; height: 100px; margin: 0 auto}
                       .vide img{width: 100%; height: 100%;}
                    </style> --}}
                </tr>


              </table>
              <!-- End Table with stripped rows -->



            </div>
          </div>

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
@endsection







