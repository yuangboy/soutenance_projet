@extends('frontend.layouts.front')
@section('body')

    <section class="appointment">
        <div class="container mt-5">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-dark text-white">
                            Formulaire Authentification
                        </div>
                        <div class="card-body">
                             @if(session ('status'))
                            <div class="alert alert-success">
                                {{ session ('status') }}
                            </div>
                            @endif

                            <form method="post" action="{{route('update.user',$users->id)}}">
                                @method('put')
                                @csrf
                                 <div class="mb-3">
                                    <label for="sexe">Nom</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $users->name}}">
                                </div>

                                <div class="mb-3">
                                    <label for="nationnalite">Rôle</label>
                                    <input type="text" class="form-control" id="role" name="role"value="{{ $users->role}}">
                                </div>

                                <div class="mb-3">
                                    <label for="email">Status</label>
                                    <input type="text" class="form-control" id="status" name="status"value="{{ $users->status}}">
                                </div>

                               <div class="mb-3">
                                    <label for="classe">Mail</label>
                                    <input type="text" class="form-control" id="email" name="classe"value="{{ $users->email}}" >
                                </div>

                                <div class="mb-3">
                                    <label for="classe">Mot de passe</label>
                                    <input type="text" class="form-control" id="password" name="classe"value="{{ $users->password}}" >
                                </div>

                                <div class="mb-3">
                                    <label for="classe">Confirmer le mot de passe</label>
                                    <input type="text" class="form-control" id="password" name="classe"value="__('Confirm Password')" >
                                </div>


                                <button type="submit" class="btn btn-dark">Modifier</button>
                            </form>


                    </div>
                </div>
            </div>
        </div>

    </section>
        <br>

    <img src="{{asset('frontend/assets/img/section-img.png')}}" alt="#" style="display: block; margin-left: auto; margin-right: auto;">


    <br><br>

@endsection
