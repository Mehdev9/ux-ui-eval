@extends('layouts.app')

@section('title', 'À propos de nous')
@section('header_title', 'Notre Histoire')
@section('header_subtitle', 'Découvrez qui nous sommes, notre mission et nos valeurs.')

@section('content')
    <div class="container py-5">
        <div class="row justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up">
                <h1 class="display-4">À propos de Shopera</h1>
                <p class="lead text-muted">
                    Bienvenue chez Shopera, votre destination de choix pour les produits informatiques et gaming de haute
                    qualité.
                </p>
            </div>
        </div>
    </div>

    <!-- Section Mission -->
    <div class="container-fluid bg-light py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade-right">
                    <div class="text-center text-md-start">
                        <i class="fas fa-bullseye fa-4x text-primary mb-3"></i>
                        <h2>Notre Mission</h2>
                        <p>
                            Chez Shopera, notre mission est de fournir à nos clients les meilleurs équipements et accessoires
                            pour améliorer leur expérience numérique. Que vous soyez un gamer passionné, un professionnel
                            exigeant ou un utilisateur quotidien, nous nous engageons à vous offrir des produits fiables,
                            performants et innovants.
                        </p>
                    </div>
                </div>
                <div class="col-md-6 text-center" data-aos="fade-left">
                    <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Notre mission"
                        class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>
    </div>

    <!-- Section Valeurs -->
    <div class="container py-5">
        <div class="row text-center">
            <div class="col-12 mb-5" data-aos="fade-up">
                <h2>Nos Valeurs</h2>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="100">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-check-circle fa-3x text-success mb-3"></i>
                        <h4>Qualité</h4>
                        <p>Nous sélectionnons rigoureusement chaque produit pour garantir des performances et une durabilité
                            exceptionnelles.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="200">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-users fa-3x text-info mb-3"></i>
                        <h4>Client d'abord</h4>
                        <p>Votre satisfaction est notre priorité. Nous offrons un support client réactif et à l'écoute.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="300">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-lightbulb fa-3x text-warning mb-3"></i>
                        <h4>Innovation</h4>
                        <p>Nous restons à l'affût des dernières technologies pour vous proposer des produits toujours à la
                            pointe.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="fade-up" data-aos-delay="400">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <i class="fas fa-handshake fa-3x text-secondary mb-3"></i>
                        <h4>Transparence</h4>
                        <p>Nous croyons en une communication claire et honnête avec nos clients.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Call to Action Section -->
    <div class="container-fluid call-to-action-section text-white text-center py-5"
        style="background-color: #4491e3 !important;" data-aos="zoom-in">
        <h2 class="mb-4">Prêt à découvrir nos produits ?</h2>
        <p class="lead mb-4">Explorez notre vaste sélection et trouvez l'équipement parfait pour vous.</p>
        <a href="{{ route('products.index') }}" class="btn btn-lg rounded-pill"
            style="background-color: white; color: #4491e3;">Commencer vos achats</a>
        <div class="call-to-action-divider"></div>
    </div>

@endsection

@section('styles')
    <style>
        .card:hover {
            transform: translateY(-5px);
            transition: transform 0.2s;
        }
    </style>
@endsection
