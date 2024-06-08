<!DOCTYPE html>
<html lang="en">
{{-- <x-app-layout>

    </x-app-layout> --}}


<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>HGD</title>
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
                <form class="row g-3" action="{{ route('registre.patient') }}" method="POST">
                    @csrf
                    {{-- <div>
                        <label for="">Matricule</label>
                    <input type="text" name="matricule">
                    </div> --}}
                    <br>
                    <div class="col-md-12">
                        <div class="form-floating select">
                            <input name="image" type="text" class="form-control" id="image"
                                placeholder="Votre image">
                            <label for="text">Image</label>
                        </div>
                        @if ($errors->has('image'))
                        <li>{{$errors->first('image')}}</li>
                         @endif
                        <div class="form-floating">
                            <input name="name" type="text" class="form-control" id="floatingName"
                                placeholder="Your Name" value="{{ $form1Data['name'] ?? '' }}" readonly>
                            <label for="floatingName">saisir le nom</label>
                        </div>
                            @if ($errors->has('name'))
                                    <li>{{$errors->first('name')}}</li>
                            @endif

                        <div class="form-floating">
                            <input name="prenom" type="text" class="form-control" id="floatingName"
                                placeholder="Votre prénom">
                            <label for="floatingName">saisir le prenom</label>
                        </div>
                        @if ($errors->has('prenom'))
                        <li>{{$errors->first('prenom')}}</li>
                @endif
                    </div>

                    <div class="col-md-6">
                        <div class="form-floating">
                            <input name="dateNaiss" type="date" class="form-control" id="floatingEmail"
                                placeholder="Date de Naissance">
                            <label for="floatingEmail">Date de Naissance</label>
                        </div>
                        @if ($errors->has('dateNaiss'))
                        <li>{{$errors->first('dateNaiss')}}</li>
                         @endif
                        {{-- <div class="form-floating select">
                            <input name="genre" type="text" class="form-control" id="floatingEmail"
                                placeholder="Your Email">
                            <label for="floatingEmail">Sexe</label>
                        </div> --}}

                        <div class="form-floating mb-3">
                            <select class="form-select" id="floatingSelect" aria-label="Floating label select example"
                                name="genre">
                                {{-- <option selected="">Genre</option> --}}
                                <option value="masculin">Masculin</option>
                                <option value="feminin">Feminin</option>
                            </select>
                            <label for="floatingSelect">Selectionner votre genre</label>
                        </div>
                        @if ($errors->has('genre'))
                        <li>{{$errors->first('genre')}}</li>
                         @endif
                         <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Telephone"
                                name="tel">
                            <label for="floatingPassword">Telephone</label>
                        </div>
                        @if ($errors->has('tel'))
                        <li>{{$errors->first('tel')}}</li>
                         @endif
                        <div class="form-floating select">
                            <input name="profession" type="text" class="form-control" id="floatingEmail"
                                placeholder="Votre profession">
                            <label for="floatingEmail">Profession</label>
                        </div>
                        @if ($errors->has('profession'))
                        <li>{{$errors->first('profession')}}</li>
                         @endif
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Adresse"
                                name="adresse">
                            <label for="floatingPassword">Adresse</label>
                        </div>
                        @if ($errors->has('adresse'))
                        <li>{{$errors->first('adresse')}}</li>
                         @endif
                        <div class="form-floating mb-3">
                            <select id="selectNationalite" class="form-select" aria-label="Floating label select example" name="nationalite">
                                {{-- <option selected="">Genre</option> --}}
                            </select>
                            <label for="floatingSelect">Selectionner votre nationnalite</label>
                        </div>
                        @if ($errors->has('nationalite'))
                        <li>{{$errors->first('nationalite')}}</li>
                         @endif
                    </div><br><br>
                    <div class="col-md-6">
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="floatingPassword" placeholder="Ville"
                                    name="ville">
                                <label for="floatingPassword">Ville</label>
                            </div>
                            @if ($errors->has('ville'))
                            <li>{{$errors->first('ville')}}</li>
                             @endif
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword" placeholder="Lieu de Naissance"
                                name="lieuNaiss">
                            <label for="floatingPassword">Lieu de Naissance</label>
                        </div>
                        @if ($errors->has('lieuNaiss'))
                        <li>{{$errors->first('lieuNaiss')}}</li>
                         @endif
                        <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword"
                                placeholder="Situation matrimoniale" name="sitmatrimoniale">
                            <label for="floatingPassword">Situation Matrimoniale</label>
                        </div>
                        @if ($errors->has('sitmatrimoniale'))
                        <li>{{$errors->first('sitmatrimoniale')}}</li>
                         @endif

                        {{-- <div class="form-floating">
                            <input type="text" class="form-control" id="floatingPassword"
                                placeholder="Lieu de Naissance" name="lieuNaiss">
                            <label for="floatingPassword">Lieu de Naissance</label>
                        </div> --}}
                    </div>
                    <div class="col-md-12">
                        <div class="form-floating">
                            <input name="email" type="email" class="form-control" id="floatingEmail"
                                placeholder="Your Email" value="{{ $form1Data['email'] ?? '' }}" readonly>
                            <label for="floatingEmail">Your Email</label>
                        </div>
                        @if ($errors->has('email'))
                        <li>{{$errors->first('email')}}</li>
                         @endif
                    </div>



                    {{-- <div class="col-12">
                        <div class="form-floating">
                          <textarea class="form-control" placeholder="Address" id="floatingTextarea" style="height: 100px;"></textarea>
                          <label for="floatingTextarea">Address</label>
                        </div>
                      </div> --}}



                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                        <button type="reset" class="btn btn-secondary">Annuler</button>
                    </div>
                </form><!-- End floating Labels Form -->

            </div>






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


            <script>

                let nationalites=[
                    { code: 'AD', name: 'Andorra' },
  { code: 'AE', name: 'United Arab Emirates' },
  { code: 'AF', name: 'Afghanistan' },
  { code: 'AG', name: 'Antigua and Barbuda' },
  { code: 'AI', name: 'Anguilla' },
  { code: 'AL', name: 'Albania' },
  { code: 'AM', name: 'Armenia' },
  { code: 'AO', name: 'Angola' },
  { code: 'AQ', name: 'Antarctica' },
  { code: 'AR', name: 'Argentina' },
  { code: 'AS', name: 'American Samoa' },
  { code: 'AT', name: 'Austria' },
  { code: 'AU', name: 'Australia' },
  { code: 'AW', name: 'Aruba' },
  { code: 'AX', name: 'Åland Islands' },
  { code: 'AZ', name: 'Azerbaijan' },
  { code: 'BA', name: 'Bosnia and Herzegovina' },
  { code: 'BB', name: 'Barbados' },
  { code: 'BD', name: 'Bangladesh' },
  { code: 'BE', name: 'Belgium' },
  { code: 'BF', name: 'Burkina Faso' },
  { code: 'BG', name: 'Bulgaria' },
  { code: 'BH', name: 'Bahrain' },
  { code: 'BI', name: 'Burundi' },
  { code: 'BJ', name: 'Benin' },
  { code: 'BL', name: 'Saint Barthélemy' },
  { code: 'BM', name: 'Bermuda' },
  { code: 'BN', name: 'Brunei Darussalam' },
  { code: 'BO', name: 'Bolivia, Plurinational State of' },
  { code: 'BQ', name: 'Bonaire, Sint Eustatius and Saba' },
  { code: 'BR', name: 'Brazil' },
  { code: 'BS', name: 'Bahamas' },
  { code: 'BT', name: 'Bhutan' },
  { code: 'BV', name: 'Bouvet Island' },
  { code: 'BW', name: 'Botswana' },
  { code: 'BY', name: 'Belarus' },
  { code: 'BZ', name: 'Belize' },
  { code: 'CA', name: 'Canada' },
  { code: 'CC', name: 'Cocos (Keeling) Islands' },
  { code: 'CD', name: 'Congo, Democratic Republic of the' },
  { code: 'CF', name: 'Central African Republic' },
  { code: 'CG', name: 'Congo' },
  { code: 'CH', name: 'Switzerland' },
  { code: 'CI', name: "Côte d'Ivoire" },
  { code: 'CK', name: 'Cook Islands' },
  { code: 'CL', name: 'Chile' },
  { code: 'CM', name: 'Cameroon' },
  { code: 'CN', name: 'China' },
  { code: 'CO', name: 'Colombia' },
  { code: 'CR', name: 'Costa Rica' },
  { code: 'CU', name: 'Cuba' },
  { code: 'CV', name: 'Cabo Verde' },
  { code: 'CW', name: 'Curaçao' },
  { code: 'CX', name: 'Christmas Island' },
  { code: 'CY', name: 'Cyprus' },
  { code: 'CZ', name: 'Czechia' },
  { code: 'DE', name: 'Germany' },
  { code: 'DJ', name: 'Djibouti' },
  { code: 'DK', name: 'Denmark' },
  { code: 'DM', name: 'Dominica' },
  { code: 'DO', name: 'Dominican Republic' },
  { code: 'DZ', name: 'Algeria' },
  { code: 'EC', name: 'Ecuador' },
  { code: 'EE', name: 'Estonia' },
  { code: 'EG', name: 'Egypt' },
  { code: 'EH', name: 'Western Sahara' },
  { code: 'ER', name: 'Eritrea' },
  { code: 'ES', name: 'Spain' },
  { code: 'ET', name: 'Ethiopia' },
  { code: 'FI', name: 'Finland' },
  { code: 'FJ', name: 'Fiji' },
  { code: 'FK', name: 'Falkland Islands (Malvinas)' },
  { code: 'FM', name: 'Micronesia, Federated States of' },
  { code: 'FO', name: 'Faroe Islands' },
  { code: 'FR', name: 'France' },
  { code: 'GA', name: 'Gabon' },
  {
    code: 'GB',
    name: 'United Kingdom of Great Britain and Northern Ireland'
  },
  { code: 'GD', name: 'Grenada' },
  { code: 'GE', name: 'Georgia' },
  { code: 'GF', name: 'French Guiana' },
  { code: 'GG', name: 'Guernsey' },
  { code: 'GH', name: 'Ghana' },
  { code: 'GI', name: 'Gibraltar' },
  { code: 'GL', name: 'Greenland' },
  { code: 'GM', name: 'Gambia' },
  { code: 'GN', name: 'Guinea' },
  { code: 'GP', name: 'Guadeloupe' },
  { code: 'GQ', name: 'Equatorial Guinea' },
  { code: 'GR', name: 'Greece' },
  { code: 'GS', name: 'South Georgia and the South Sandwich Islands' },
  { code: 'GT', name: 'Guatemala' },
  { code: 'GU', name: 'Guam' },
  { code: 'GW', name: 'Guinea-Bissau' },
  { code: 'GY', name: 'Guyana' },
  { code: 'HK', name: 'Hong Kong' },
  { code: 'HM', name: 'Heard Island and McDonald Islands' },
  { code: 'HN', name: 'Honduras' },
  { code: 'HR', name: 'Croatia' },
  { code: 'HT', name: 'Haiti' },
  { code: 'HU', name: 'Hungary' },

                ];

                const select=document.getElementById('selectNationalite');

                nationalites.forEach(nationalite => {
                    const option=document.createElement('option');
                    option.value=nationalite.name;
                    option.innerText=nationalite.name;
                    select.appendChild(option);
                });


            </script>

</body>





</html>
