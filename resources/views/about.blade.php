@extends('layouts.app')

@section('title', 'À propos de nous')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">À propos de nous</h1>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <p class="lead text-center mb-5">
                Bienvenue chez Shopera, votre destination de choix pour les produits informatiques et gaming de haute qualité.
            </p>

            <div class="mb-5">
                <h2>Notre Mission</h2>
                <p>
                    Chez Shopera, notre mission est de fournir à nos clients les meilleurs équipements et accessoires pour améliorer leur expérience numérique. Que vous soyez un gamer passionné, un professionnel exigeant ou un utilisateur quotidien, nous nous engageons à vous offrir des produits fiables, performants et innovants.
                </p>
            </div>

            <div class="mb-5">
                <h2>Nos Valeurs</h2>
                <ul>
                    <li><strong>Qualité:</strong> Nous sélectionnons rigoureusement chaque produit pour garantir des performances et une durabilité exceptionnelles.</li>
                    <li><strong>Client d'abord:</strong> Votre satisfaction est notre priorité. Nous offrons un support client réactif et à l'écoute.</li>
                    <li><strong>Innovation:</strong> Nous restons à l'affût des dernières technologies pour vous proposer des produits toujours à la pointe.</li>
                    <li><strong>Transparence:</strong> Nous croyons en une communication claire et honnête avec nos clients.</li>
                </ul>
            </div>

            <div class="text-center mt-5">
                <p>Découvrez notre sélection et rejoignez la communauté Shopera !</p>
                <a href="{{ route('products.index') }}" class="btn btn-primary btn-lg rounded-pill">Voir nos produits</a>
            </div>
        </div>
    </div>
</div>
@endsection
