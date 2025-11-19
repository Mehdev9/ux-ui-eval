@extends('layouts.app')

@section('header_title', 'Mon Profil')
@section('header_subtitle', 'Gérez vos informations personnelles et consultez vos commandes.')
@section('header_height', 'height: 750px;')

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="row">
        <div class="col-lg-4">
            <div class="card mb-4">
                <div class="card-body text-center">
                    <img src="https://mdbcdn.b-cdn.net/img/Photos/new-templates/bootstrap-chat/ava3.webp" alt="avatar"
                        class="rounded-circle img-fluid profile-avatar">
                    <h5 class="my-3 mb-3">{{ $user->name }}</h5>
                    <p class="text-muted mb-1">{{ $user->email }}</p>
                    <p class="text-muted mb-4">Membre depuis le {{ $user->created_at->format('d/m/Y') }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-8 mb-5">
            <div class="card mb-4">
                <div class="card-body py-4">
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Nom complet</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->name }}</p>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <p class="mb-0">Email</p>
                        </div>
                        <div class="col-sm-9">
                            <p class="text-muted mb-0">{{ $user->email }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mb-4">
                <div class="card-header">
                    <h4>Mes Commandes</h4>
                </div>
                <div class="card-body">
                    <p class="text-muted">Vous n'avez aucune commande pour le moment.</p>
                    <!-- Ici, vous pourriez boucler sur les commandes de l'utilisateur -->
                </div>
            </div>
            <div class="d-flex justify-content-start mt-4">
                <a href="{{ route('profil.edit') }}" class="btn btn-primary rounded-pill px-4 me-4">Modifier le profil</a>
                <a href="{{ route('profil.password.edit') }}" class="btn btn-danger rounded-pill px-4">Changer de mot de passe</a>
            </div>
        </div>
    </div>
</div>
@endsection