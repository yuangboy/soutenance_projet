<!DOCTYPE html>
<html lang="en">
{{-- <x-app-layout>

    </x-app-layout> --}}


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HGDd</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    {{-- {{asset('templates/')}} --}}

    <!-- Favicons -->
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
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
        * Template Name: NiceAdmin
        * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
        * Updated: Apr 20 2024 with Bootstrap v5.3.3
        * Author: BootstrapMade.com
        * License: https://bootstrapmade.com/license/
        ======================================================== -->
</head>

<body>


    <style>
        .monForm {
            display: flex;
            align-items: center;
            margin: 0 auto;
            min-height: 100vh;
            width: 100%;
            max-width: 500px;


        }

        .card-title {
            text-align: center;
            animation: animTitre 5s ease forwards;
        }

        .form-floating {
            margin-bottom: 5px;
        }

        /* .select{
                padding: 10px;
            } */

        .conteneur {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .conteneur-image {
            width: 50px;
            height: 50px;
        }

        .conteneur-image img {
            width: 100%;
            height: 100%;


        }

        @keyframes animTitre {
            to {
                transform: scale(1);
                color: blue;
                letter-spacing: 10px;

            }

            from {
                color: red;
                transform: scale(0);
                font-weight: 800;

            }
        }
    </style>



    <div class="monForm">

        <div class="card">
            <div class="card-body">

                <div class="conteneur">
                    <div class="conteneur-image">
                        <img src="{{ asset('frontend/assets/img/logoSoutenace.png') }}" alt="">
                    </div>
                    <h5 class="card-title">Etat civil</h5>
                </div>

                <!-- Floating Labels Form -->
                <form class="row g-3" action="{{ route('update.patient',$personne->id,'update') }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="nom" type="text" class="form-control" id="floatingName"
                                placeholder="Your Name" value="{{$personne->nom}}">
                            <label for="floatingName"></label>
                        </div>
                        <div class="form-floating">
                            <input name="prenom" type="text" class="form-control" id="floatingName"
                                placeholder="Your Name" value="{{$personne->prenom}}">
                            <label for="floatingName"></label>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="daten" type="date" class="form-control" id="floatingEmail"
                                placeholder="Date de Naissance" value="{{$personne->dateNaiss}}">
                            <label for="floatingEmail"></label>
                        </div>
                        <div class="form-floating select">
                            <input name="genre" type="text" class="form-control" id="floatingEmail"
                                placeholder="Your Email" value="{{$personne->genre}}">
                            <label for="floatingEmail"></label>
                        </div>
                        <div class="form-floating select">
                            <input name="profession" type="text" class="form-control" id="floatingEmail"
                                placeholder="Your Email" value="{{$personne->profession}}">
                            <label for="floatingEmail"></label>
                        </div>
                        <div class="form-floating select">
                            <input name="nationalite" type="text" class="form-control" id="floatingEmail"
                                placeholder="Nationalite" value="{{$personne->nationalite}}">
                            <label for="floatingEmail"></label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Ville"
                                name="ville" value="{{$personne->ville}}">
                            <label for="floatingPassword"></label>
                        </div>
                        <div class="form-floating">

                            <input type="text" class="form-control" id="floatingPassword" placeholder="Telephone"
                                name="tel" value="{{$personne->tel}}">
                            <label for="floatingPassword"></label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword"
                                placeholder="Situation matrimoniale" name="sitmatrimoniale" value="{{$personne->sitmatrimoniale}}">
                            <label for="floatingPassword"></label>
                        </div>
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Adresse"
                                name="adresse" value="{{$personne->adresse}}">
                            <label for="floatingPassword"></label>
                        </div>


                    </div>

                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="email" type="email" class="form-control" id="floatingEmail"
                                placeholder="Your Email" value="{{$personne->email}}">
                            <label for="floatingEmail"></label>
                        </div>
                    </div>



                    {{-- <div class="col-12">
                        <div class="form-floating">
                          <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                          <label for="floatingTextarea">Address</label>
                        </div>
                      </div> --}}



                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Validre</button>
                        <button type="reset" class="btn btn-secondary">Annuler</button>

                    </div>
                </form><!-- End floating Labels Form -->


            </div>

            <form action="{{route('delete.patient',$personne->id,'delete')}}" method="POST">
                @csrf
                @method('delete')
                <button style="width:100%; margin:10px auto" type="submit" class="btn btn-primary">supprimer</button>
            </form>






            <!-- Vendor JS Files -->
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
