@extends('layouts.app')

@section('title', 'Page d\'accueil')

@section('header_title', 'Bienvenue sur Shopera')
@section('header_subtitle', 'Les meilleurs PC, claviers, souris et plus pour votre expérience gaming.')



@section('content')



    <!-- Carrousel des produits -->
    <div id="produits" class="container-fluid py-5" style="background-color: #E3F2FD;">
        <div class="container">
            <h2 class="text-center mb-4" data-aos="fade-up">Nos produits phares</h2>
            <div id="produitsCarousel" class="carousel slide" data-ride="carousel" data-aos="fade-up">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="card">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top"
                                        alt="PC Gamer">
                                    <div class="card-body">
                                        <h5 class="card-title">PC Gamer XYZ</h5>
                                        <p class="card-text">Un PC performant pour les jeux les plus récents.</p>
                                        <a href="{{ route('products.show', ['product' => 1]) }}"
                                            class="btn btn-primary rounded-pill">Voir le produit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="card">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top"
                                        alt="Clavier Mécanique">
                                    <div class="card-body">
                                        <h5 class="card-title">Clavier Mécanique ABC</h5>
                                        <p class="card-text">Un clavier réactif avec des switches rouges pour les gamers.
                                        </p>
                                        <a href="{{ route('products.show', ['product' => 2]) }}"
                                            class="btn btn-primary rounded-pill">Voir le produit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="card">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top"
                                        alt="Souris Gaming">
                                    <div class="card-body">
                                        <h5 class="card-title">Souris Gaming 123</h5>
                                        <p class="card-text">Confort et précision pour vos sessions de jeu intenses.</p>
                                        <a href="{{ route('products.show', ['product' => 3]) }}"
                                            class="btn btn-primary rounded-pill px-4">Voir le produit</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="row">
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                                <div class="card">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top"
                                        alt="PC Bureau">
                                    <div class="card-body">
                                        <h5 class="card-title">PC de Bureau ABC</h5>
                                        <p class="card-text">Idéal pour le travail et la productivité à domicile.</p>
                                        <a href="{{ route('products.show', ['product' => 4]) }}"
                                            class="btn btn-primary rounded-pill px-4">Voir le produit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                                <div class="card">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top"
                                        alt="Casque Audio">
                                    <div class="card-body">
                                        <h5 class="card-title">Casque Audio Premium</h5>
                                        <p class="card-text">Un son immersif et un confort optimal pour de longues
                                            sessions.</p>
                                        <a href="#" class="btn btn-primary rounded-pill">Voir le produit</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4" data-aos="fade-up" data-aos-delay="300">
                                <div class="card">
                                    <img src="{{ asset('assets/img/header-1.jpg') }}" class="card-img-top"
                                        alt="Ecran 4K">
                                    <div class="card-body">
                                        <h5 class="card-title">Écran 4K Ultra HD</h5>
                                        <p class="card-text">Pour des graphismes époustouflants et une expérience visuelle
                                            incroyable.</p>
                                        <a href="#" class="btn btn-primary rounded-pill px-4">Voir le produit</a>
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
    </div>

    <!-- Section À propos -->
    <div id="about-us" class="container-fluid py-5" style="background-color: #E8EEF3;">
        <div class="container">
            <div class="row">
                <div class="col-md-6" data-aos="fade-right">
                    <h2>Qui sommes-nous ?</h2>
                    <p>Nous sommes une boutique en ligne spécialisée dans la vente de produits informatiques de qualité,
                        tels
                        que des PC, claviers, souris et accessoires. Notre objectif est de vous fournir les meilleurs
                        produits
                        pour améliorer votre expérience numérique.</p>
                    <a href="#" class="btn btn-primary rounded-pill px-4">En savoir plus</a>
                </div>
                <div class="col-md-6" data-aos="fade-left">
                    <img src="{{ asset('assets/img/header-1.jpg') }}" alt="À propos" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </div>

    <!-- Section Avis clients -->
    <div class="container-fluid py-5" style="background-color: #E3F2FD;">
        <div class="container">
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
                            <p>"Je suis ravi de mon achat, le PC que j'ai acheté fonctionne parfaitement pour mes sessions
                                de
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
                                        <i class="fas fa-star-half-alt" style="color: gold;"></i>
                                        <!-- Étoile moitié -->
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
    </div>

    <!-- Section Pourquoi nous choisir -->
    <div class="container-fluid py-5" style="background-color: #E8EEF3;">
        <div class="container">
            <h2 class="text-center mb-5" data-aos="fade-up">Pourquoi choisir Shopera ?</h2>
            <div class="row text-center">
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-shipping-fast fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Livraison rapide</h5>
                            <p class="card-text">Recevez vos commandes en un temps record grâce à nos partenaires
                                logistiques.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-headset fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Support client 24/7</h5>
                            <p class="card-text">Notre équipe est disponible à tout moment pour répondre à vos questions.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                    <div class="card h-100">
                        <div class="card-body">
                            <i class="fas fa-award fa-3x text-primary mb-3"></i>
                            <h5 class="card-title">Produits de qualité</h5>
                            <p class="card-text">Nous sélectionnons rigoureusement nos produits pour vous garantir la
                                meilleure qualité.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('fullwidth_content')
    <!-- Section Appel à l'action -->
    <div class="container-fluid call-to-action-section text-white text-center py-5" style="background-color: #4491e3 !important;" data-aos="zoom-in">
        <h2 class="mb-4">Prêt à découvrir nos produits ?</h2>
        <p class="lead mb-4">Explorez notre vaste sélection et trouvez l'équipement parfait pour vous.</p>
        <a href="{{ route('products.index') }}" class="btn btn-lg rounded-pill" style="background-color: white; color: #4491e3;">Commencer vos achats</a>
        <div class="call-to-action-divider"></div>
    </div>
@endsection

