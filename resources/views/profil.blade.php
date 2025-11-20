@extends('layouts.app')

@section('header_title', 'Mon Profil')
@section('header_subtitle', 'Gérez vos informations personnelles et consultez vos commandes.')

@section('content')
<div class="container mt-5">
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Card enveloppante avec box-shadow et margin-bottom -->
    <div class="card shadow-lg border-0 mb-5" style="border-radius: 15px; box-shadow: 0 10px 20px rgba(68, 145, 227, 0.3);">
        <div class="card-body">
            <div class="row">
                <!-- Première Card (Avatar et informations utilisateur) avec effet flip -->
                <div class="col-lg-4" data-aos="flip-left">
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

                <!-- Deuxième Card (Informations supplémentaires) avec effet fade-up -->
                <div class="col-lg-8 mb-5" data-aos="fade-up">
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
                    <!-- Card des commandes avec effet fade-up -->
                    <div class="card mb-4" data-aos="fade-up">
                        <div class="card-header">
                            <h4>Mes Commandes</h4>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Vous n'avez aucune commande pour le moment.</p>
                            <!-- Boucle pour afficher les commandes de l'utilisateur -->
                        </div>
                    </div>
                    <!-- Boutons pour modifier le profil ou changer le mot de passe -->
                    <div class="d-flex justify-content-start mt-4">
    <a href="{{ route('profil.edit') }}" class="btn btn-primary rounded-pill px-4" style="margin-right: 20px;">Modifier mon profil</a>
    <a href="{{ route('profil.password.edit') }}" class="btn btn-danger rounded-pill px-4">Changer de mot de passe</a>
</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
