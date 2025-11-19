@extends('layouts.app')

@section('content')
    <!-- Section principale de l'article -->
    <div class="product-detail py-5" data-aos="fade-up">
        <div class="container">
            <div class="row">
                <div class="card shadow-lg p-4" data-aos="zoom-in">

                    <!-- Structure de la carte produit -->
                    <div class="row">
                        <!-- Image du produit -->
                        <div class="col-md-6 mb-4 mb-md-0" data-aos="fade-right">
                            <img src="{{ asset('assets/img/header-1.jpg') }}" alt="{{ $product->name }}" class="img-fluid rounded shadow-lg">
                        </div>

                        <!-- Détails du produit (Texte et Boutons à droite) -->
                        <div class="col-md-6 d-flex flex-column justify-content-between" data-aos="fade-left">
                            <div>
                                <h1 class="display-4 font-weight-bold text-dark">{{ $product->name }}</h1>
                                <p class="h3 text-danger">{{ $product->price }} €</p>
                                <p class="lead text-muted mb-4">{{ $product->description }}</p>
                            </div>

                            <!-- Boutons alignés en bas à droite -->
                            <div class="mt-4 d-flex justify-content-end">
                                <a href="#" class="btn btn-lg btn-success btn-rounded shadow-sm mr-2">Ajouter au panier</a>
                                <a href="{{ route('products.index') }}" class="btn btn-lg btn-secondary btn-rounded shadow-sm">Retour à la liste</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section des articles similaires avec carousel -->
    <div class="similar-products py-5 bg-light" data-aos="fade-up">
        <div class="container">
            <h2 class="text-center mb-4 text-dark">Vous aimerez aussi</h2>
            
            <!-- Carousel des produits similaires -->
            <div id="similarProductsCarousel" class="carousel slide" data-ride="carousel" data-aos="fade-up">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- Produit 1 Similaire -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm h-100">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top" alt="Produit 1 Similaire">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark">Produit 1 Similaire</h5>
                                        <p class="card-text text-danger">29.99 €</p>
                                        <a href="#" class="btn btn-primary btn-rounded">Voir le produit</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Produit 2 Similaire -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm h-100">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top" alt="Produit 2 Similaire">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark">Produit 2 Similaire</h5>
                                        <p class="card-text text-danger">49.99 €</p>
                                        <a href="#" class="btn btn-primary btn-rounded">Voir le produit</a>
                                    </div>
                                </div>
                            </div>

                            <!-- Produit 3 Similaire -->
                            <div class="col-md-4 mb-4">
                                <div class="card shadow-sm h-100">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top" alt="Produit 3 Similaire">
                                    <div class="card-body">
                                        <h5 class="card-title text-dark">Produit 3 Similaire</h5>
                                        <p class="card-text text-danger">39.99 €</p>
                                        <a href="#" class="btn btn-primary btn-rounded">Voir le produit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Contrôles du carousel -->
                <a class="carousel-control-prev" href="#similarProductsCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Précédent</span>
                </a>
                <a class="carousel-control-next" href="#similarProductsCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Suivant</span>
                </a>
            </div>
        </div>
    </div>

    <!-- Section des commentaires -->
    <div class="comments-section py-5" data-aos="fade-up">
        <div class="container">
            <h3 class="text-center mb-4 text-dark">Commentaires</h3>
            <div class="row">
                <!-- Commentaires à gauche -->
                <div class="col-md-6">
                    <div class="comment-item bg-light p-4 rounded-lg shadow-sm mb-3" data-aos="fade-right">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Profil Utilisateur 1" class="rounded-circle mr-3" style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <strong>Utilisateur 1</strong>
                                <div class="stars">
                                    <span class="text-warning">⭐⭐⭐⭐⭐</span>
                                </div>
                            </div>
                        </div>
                        <p>C'est un super produit ! Très satisfait de mon achat.</p>
                        <small class="text-muted">20 Octobre 2025</small>
                    </div>

                    <div class="comment-item bg-light p-4 rounded-lg shadow-sm mb-3" data-aos="fade-left">
                        <div class="d-flex align-items-center">
                            <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Profil Utilisateur 2" class="rounded-circle mr-3 " style="width: 50px; height: 50px; object-fit: cover;">
                            <div>
                                <strong>Utilisateur 2</strong>
                                <div class="stars">
                                    <span class="text-warning">⭐⭐⭐⭐</span>
                                </div>
                            </div>
                        </div>
                        <p>Bon rapport qualité/prix, mais j'aurais aimé plus de couleurs disponibles.</p>
                        <small class="text-muted">18 Octobre 2025</small>
                    </div>
                </div>

                <!-- Commentaire centré -->
                <div class="col-md-6 text-center">
                    <div class="comment-item bg-light p-4 rounded-lg shadow-sm mb-3">
                        <h4>Ajouter un commentaire</h4>
                        <form action="#" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <textarea name="content" class="form-control shadow-sm" rows="4" placeholder="Écrivez votre commentaire..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block btn-rounded shadow-sm">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('styles')
    <style>
        .product-detail {
            background-color: #f8f9fa;
            padding-top: 40px;
        }

        .product-title {
            font-size: 2.8rem;
        }

        .product-price {
            font-size: 1.7rem;
        }

        .similar-products h2 {
            font-size: 2.2rem;
            font-weight: 600;
            color: #333;
        }

        .card {
            border-radius: 15px;
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        }

        .card-body {
            padding: 20px;
        }

        .carousel-inner {
            padding: 10px 0;
        }

        .carousel-control-prev-icon, .carousel-control-next-icon {
            background-color: #3498db;
        }

        .stars {
            font-size: 1.2rem;
        }

        .stars span {
            color: #f39c12; /* Couleur or pour les étoiles */
        }

        .comment-item img {
            width: 50px;
            height: 50px;
            object-fit: cover;
        }

        .comment-item {
            margin-bottom: 20px;
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            font-size: 1.1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.3);
        }
    </style>
@endsection
