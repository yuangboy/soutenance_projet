@extends('frontend.layouts.front')
@section('body')
    <div class="row justify-content-center mb-5"> <!-- Ajout de la classe mb-5 pour la marge inférieure -->
        <div class="col-lg-6">
            <div class="card mt-5">
                <div class="card-header text-center">
                    <h4>Contactez-Nous</h4>
                </div>
                <div class="card-body">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p class="text-center">Nous sommes disposés à vous répondre pour toute information supplémentaires</p><br>
                    <p class="text-center font-weight-bold">Contactez-nous aux : 06 679 44 20 / 05 690 33 24</p><br>
                    <p class="text-center font-weight-bold">victoireongatse@gmail.com</p><br>
                </div>
            </div>
        </div>
    </div>
@endsection
