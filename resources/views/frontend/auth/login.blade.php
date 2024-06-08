@extends('frontend.layouts.front2')

@section('body')

    <section class="appointment">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            <h2 style="text-align: center; color:#fff; ">Authentification</h2>
                        </div>
                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf


                            <div class="form-group">
                                <label for="password"></label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Entrez votre mail" value="{{old('email')}}">

                                                        @if ($errors->has('email'))
                                    <div class="alert alert-danger">{{ $errors->first('email') }}</div>
                                @endif
                                </div>


                            <div class="form-group">
                                <label for="password"></label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Entrez votre mot de passe" value="{{old('password')}}">

                        </div>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <button type="submit" class="btn btn-dark" style=" background-color: rgb(0, 79, 104);">Se connecter</button>
                                    </div>
                                    <div class="col-lg-6">
                                        <form method="POST" action="#" class="text-center">
                                            @csrf
                                                    <a href="register" class="btn btn-droite">Créer compte</a>
                                                    <style>
                                                        .btn-droite{
                                                            background-color: rgb(0, 79, 104);
                                                            float: right;
                                                            color: #fff !important;
                                                        }
                                                    </style>
                                        </form>
                                    </div>
                                </div>


                            </form>

                    </div>
                </div>
            </div>
        </div>

    </section>
        <br>

    <img src="{{asset('frontend/assets/img/section-img.png')}}" alt="#" style="display: block; margin-left: auto; margin-right: auto;">

    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow rounded bg-dark text-white"> <!-- Ajout de la classe 'bg-dark' pour le fond noir -->

                    <div class="card-body text-center"> <!-- Centrage du contenu -->
                        <form method="POST" action="#" class="text-center">
                            @csrf
                            <div class="col-lg-12 col-12">
                                <!--<div class="get-quote">
                                    <a href="register" class="btn">Créer un compte</a>
                                </div>
                            </div>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <br><br>

@endsection
