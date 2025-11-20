@extends('layouts.app')

@section('title', 'Nous contacter')
@section('header_title', 'Contactez-nous')
@section('header_subtitle', 'Nous sommes là pour vous aider.')

@section('content')
<div class="container-fluid bg-light py-5">
    <div class="container">
        <div class="text-center mb-5" data-aos="fade-up">
            <h1>Contactez-nous</h1>
            <p class="lead text-muted">Une question, une suggestion ou besoin d'assistance ? N'hésitez pas à nous contacter.</p>
        </div>

        <div class="row">
            <!-- Contact Form -->
            <div class="col-lg-7 mb-4" data-aos="fade-right">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-5">
                        <h3 class="card-title mb-4">Envoyer un message</h3>
                        <form action="#" method="POST">
                            @csrf
                            <div class="form-group mb-4">
                                <label for="name">Nom complet</label>
                                <input type="text" class="form-control form-control-lg" id="name" name="name" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="email">Adresse e-mail</label>
                                <input type="email" class="form-control form-control-lg" id="email" name="email" required>
                            </div>
                            <div class="form-group mb-4">
                                <label for="subject">Sujet</label>
                                <input type="text" class="form-control form-control-lg" id="subject" name="subject">
                            </div>
                            <div class="form-group mb-4">
                                <label for="message">Votre message</label>
                                <textarea class="form-control form-control-lg" id="message" name="message" rows="5" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-lg w-100">Envoyer le message</button>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Contact Info -->
            <div class="col-lg-5" data-aos="fade-left">
                <div class="card shadow-lg border-0 h-100">
                    <div class="card-body p-5 d-flex flex-column justify-content-center">
                        <h3 class="card-title mb-4">Nos coordonnées</h3>
                        <ul class="list-unstyled">
                            <li class="d-flex align-items-start mb-4">
                                <i class="fas fa-envelope fa-2x text-primary mr-3 mt-1"></i>
                                <div>
                                    <h5>Email</h5>
                                    <p class="text-muted mb-0">contact@shopera.com</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start mb-4">
                                <i class="fas fa-phone-alt fa-2x text-primary mr-3 mt-1"></i>
                                <div>
                                    <h5>Téléphone</h5>
                                    <p class="text-muted mb-0">+33 1 23 45 67 89</p>
                                </div>
                            </li>
                            <li class="d-flex align-items-start">
                                <i class="fas fa-map-marker-alt fa-2x text-primary mr-3 mt-1"></i>
                                <div>
                                    <h5>Adresse</h5>
                                    <p class="text-muted mb-0">123 Rue de l'e-commerce, 75000 Paris, France</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .form-control-lg {
        border-radius: 0.75rem;
        padding: 1.25rem;
    }
    .card {
        border-radius: 1rem;
    }
</style>
@endsection
