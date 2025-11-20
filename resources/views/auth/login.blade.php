@extends('layouts.app')

@section('header_title', 'Connection')
@section('header_subtitle', 'Connectez-vous à votre compte pour continuer.')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card" data-aos="flip-down" style="box-shadow: 0 4px 30px rgba(68, 145, 227, 0.2);">
                <div class="card-header">
                    <h3>Connexion</h3>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email">Adresse e-mail</label>
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block">Se connecter</button>
                        </div>
                    </form>
                    <div class="mt-3 text-center">
                        <p>Pas encore inscrit ? <a href="{{ route('register') }}">Créez un compte</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
