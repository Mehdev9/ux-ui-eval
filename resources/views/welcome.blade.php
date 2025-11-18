@extends('layouts.app')

@section('title', 'Page d\'accueil')

@section('content')
    



    <!-- Carrousel des produits -->
    <div id="produits" class="container py-5">
        <h2 class="text-center mb-4" data-aos="fade-up">Nos produits phares</h2>
        <div id="produitsCarousel" class="carousel slide" data-ride="carousel" data-aos="fade-up">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top" alt="PC Gamer">
                                <div class="card-body">
                                    <h5 class="card-title">PC Gamer XYZ</h5>
                                    <p class="card-text">Un PC performant pour les jeux les plus récents.</p>
                                    <a href="#" class="btn btn-primary">Voir le produit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top"
                                    alt="Clavier Mécanique">
                                <div class="card-body">
                                    <h5 class="card-title">Clavier Mécanique ABC</h5>
                                    <p class="card-text">Un clavier réactif avec des switches rouges pour les gamers.</p>
                                    <a href="#" class="btn btn-primary">Voir le produit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top" alt="Souris Gaming">
                                <div class="card-body">
                                    <h5 class="card-title">Souris Gaming 123</h5>
                                    <p class="card-text">Confort et précision pour vos sessions de jeu intenses.</p>
                                    <a href="#" class="btn btn-primary">Voir le produit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top" alt="PC Bureau">
                                <div class="card-body">
                                    <h5 class="card-title">PC de Bureau ABC</h5>
                                    <p class="card-text">Idéal pour le travail et la productivité à domicile.</p>
                                    <a href="#" class="btn btn-primary">Voir le produit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top" alt="Casque Audio">
                                <div class="card-body">
                                    <h5 class="card-title">Casque Audio Premium</h5>
                                    <p class="card-text">Un son immersif et un confort optimal pour de longues sessions.</p>
                                    <a href="#" class="btn btn-primary">Voir le produit</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top" alt="Ecran 4K">
                                <div class="card-body">
                                    <h5 class="card-title">Écran 4K Ultra HD</h5>
                                    <p class="card-text">Pour des graphismes époustouflants et une expérience visuelle
                                        incroyable.</p>
                                    <a href="#" class="btn btn-primary">Voir le produit</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#produitsCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#produitsCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </div>
    </div>

    <!-- Section À propos -->
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6" data-aos="fade-right">
                <h2>Qui sommes-nous ?</h2>
                <p>Nous sommes une boutique en ligne spécialisée dans la vente de produits informatiques de qualité, tels
                    que des PC, claviers, souris et accessoires. Notre objectif est de vous fournir les meilleurs produits
                    pour améliorer votre expérience numérique.</p>
                <a href="#" class="btn btn-primary">En savoir plus</a>
            </div>
            <div class="col-md-6" data-aos="fade-left">
                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="À propos" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <!-- Section Avis clients -->
    <div class="container py-5">
        <h2 class="text-center mb-4" data-aos="fade-up">Ce que disent nos clients</h2>
        <div class="row">
            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                <div class="card">
                    <div class="card-body">
                        <!-- Image ronde de profil -->
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Profil de Marie Dupont"
                                class="rounded-circle mr-3" width="50" height="50">
                            <div>
                                <h5>- Marie Dupont</h5>
                                <!-- Étoiles de notation -->
                                <div class="star-rating">
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i> <!-- 5 étoiles pleines -->
                                </div>
                            </div>
                        </div>
                        <p>"Excellent service, livraison rapide et produits de qualité. Je recommande vivement cette
                            boutique !"</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                <div class="card">
                    <div class="card-body">
                        <!-- Image ronde de profil -->
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Profil de Jean-Pierre"
                                class="rounded-circle mr-3" width="50" height="50">
                            <div>
                                <h5>- Jean-Pierre</h5>
                                <!-- Étoiles de notation -->
                                <div class="star-rating">
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star-half-alt" style="color: gold;"></i> <!-- 3.5 étoiles -->
                                    <i class="fas fa-star-half-alt" style="color: gold;"></i>
                                </div>
                            </div>
                        </div>
                        <p>"Je suis ravi de mon achat, le PC que j'ai acheté fonctionne parfaitement pour mes sessions de
                            gaming."</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                <div class="card">
                    <div class="card-body">
                        <!-- Image ronde de profil avec l'image fournie -->
                        <div class="d-flex align-items-center mb-3">
                            <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Profil de Claire Martin"
                                class="rounded-circle mr-3" width="50" height="50">
                            <div>
                                <h5>- Claire Martin</h5>
                                <!-- Étoiles de notation -->
                                <div class="star-rating">
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star" style="color: gold;"></i>
                                    <i class="fas fa-star-half-alt" style="color: gold;"></i> <!-- Étoile moitié -->
                                </div>
                            </div>
                        </div>
                        <p>"Le service client est top, très réactif et m'a aidé à choisir le meilleur produit pour mon
                            besoin."</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
