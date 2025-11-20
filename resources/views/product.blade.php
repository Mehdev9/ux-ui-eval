@extends('layouts.app')

@section('header_title', 'Nos produits')
@section('header_subtitle', 'Découvrez notre sélection de produits.')

@section('styles')
<style>
    .category-card-image {
        transition: transform 0.2s;
    }
    .category-card-image:hover {
        transform: translateY(-5px);
    }
    .category-card-image img {
        width: 100px; /* Fixed width */
        height: 100px; /* Fixed height */
        object-fit: cover;
    }

    .compact-carousel .carousel-control-prev,
    .compact-carousel .carousel-control-next {
        width: 2rem;
        height: 2rem;
        background-color: #fff;
        border: 1px solid #dee2e6;
        border-radius: 50%;
        top: 50%;
        transform: translateY(-50%);
        opacity: 1;
        transition: box-shadow 0.2s;
    }
    .compact-carousel .carousel-control-prev {
        left: -2.5rem;
    }
    .compact-carousel .carousel-control-next {
        right: -2.5rem;
    }
    .compact-carousel .carousel-control-prev:hover,
    .compact-carousel .carousel-control-next:hover {
        box-shadow: 0 0.5rem 1rem rgba(0,0,0,.15);
    }
    .compact-carousel .carousel-control-prev-icon,
    .compact-carousel .carousel-control-next-icon {
        background-image: none;
        color: #343a40;
        font-size: 1rem;
        line-height: 1;
    }
    .compact-carousel .carousel-control-prev-icon::before {
        content: '‹';
        font-weight: bold;
    }
    .compact-carousel .carousel-control-next-icon::before {
        content: '›';
        font-weight: bold;
    }
</style>
@endsection
<style>
    /* Effet hover sur les images des types de produits */
.product-img {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

.product-img:hover {
    transform: scale(1.1); /* Agrandit l'image au survol */
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2); /* Ombre subtile autour de l'image */
}

/* Style pour les images sélectionnées (lorsqu'un type est sélectionné) */
.product-select input[type="radio"]:checked + img {
    border: 3px solid #007bff; /* Ajoute une bordure bleue à l'image sélectionnée */
    box-shadow: 0 4px 15px rgba(0, 123, 255, 0.5); /* Ombre plus marquée pour l'image sélectionnée */
}

</style>

@section('content')
@php
    $productTypes = [
        'pc' => 'https://images.unsplash.com/photo-1593642702821-c8da6771f0c6?q=80&w=300&h=300&fit=crop',
        'souris' => 'https://images.unsplash.com/photo-1615663245857-ac93bb7c39e7?q=80&w=300&h=300&fit=crop',
        'clavier' => 'https://images.unsplash.com/photo-1587829741301-dc798b83add3?q=80&w=300&h=300&fit=crop',
        'ecran' => 'https://www.configspc.com/wp-content/uploads/2017/08/ecranrog2.jpg',
        'casque' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?q=80&w=300&h=300&fit=crop',
        'imprimante' => 'https://asset.conrad.com/media10/isa/160267/c1/-/fr/1378374_ZB_05_FB/image.jpg',
    ];
    $typesChunks = array_chunk($productTypes, 6, true);
@endphp

<div class="container-fluid py-4 bg-white border-bottom">
    <div class="container position-relative">
        <h4 class="font-weight-bold mb-4 text-center" data-aos="fade-up">Parcourir par catégorie</h4>
        <div id="categoryCarousel" class="carousel slide compact-carousel" data-ride="carousel" data-interval="false">
            <div class="carousel-inner">
                @foreach($typesChunks as $index => $chunk)
                <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                    <div class="row">
                        @foreach($chunk as $type => $imageUrl)
                        <div class="col-lg-2 col-md-4 col-6">
                            <a href="{{ route('products.index', ['type[]' => $type]) }}" class="category-card-image text-decoration-none text-dark d-block text-center mb-4">
                                <img src="{{ $imageUrl }}" class="img-fluid rounded-circle p-2 border" alt="{{ ucfirst($type) }}">
                                <div class="category-card-title mt-2">
                                    <h6 class="font-weight-bold">{{ ucfirst($type) }}</h6>
                                </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
                @endforeach
            </div>
            @if(count($typesChunks) > 1)
            <a class="carousel-control-prev" href="#categoryCarousel" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#categoryCarousel" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
            @endif
        </div>
    </div>
</div>

    <div class="container-fluid mt-5">
        <form action="{{ route('products.index') }}" method="GET">
            <div class="row">

               <!-- Bouton d'aide -->
<div class="container-fluid text-center">
    <button type="button" class="btn btn-warning mb-3" data-toggle="modal" data-target="#helpModal">
        Besoin d'aide pour trouver un article ?
    </button>
</div>


          <!-- Modal -->
<div class="modal fade p-3" id="helpModal" tabindex="-1" aria-labelledby="helpModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content p-3">
            <div class="card bg-warning text-dark mb-3">
                <div class="card-body">
                    <p><strong>Nous savons que choisir un produit peut être compliqué.</strong></p>
                    <p>Dites-nous ce que vous cherchez, et nous vous guiderons vers les meilleures options !</p>
                    <p>Répondez à quelques questions simples et nous trouverons les produits qui vous conviennent :</p>
                </div>
            </div>

            <form action="{{ route('products.index') }}" method="GET">

                <!-- Sélection par type d'image (première question) -->
                <div class="mb-3">
                    <label class="form-label">Quel type de produit vous intéresse ?</label>
                    <div class="row">
                        <!-- PC -->
                        <div class="col-4 text-center product-select">
                            <label for="type_pc">
                                <input type="radio" name="type" id="type_pc" value="pc" class="d-none">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="PC" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>PC</p>
                            </label>
                        </div>

                        <!-- Souris -->
                        <div class="col-4 text-center product-select">
                            <label for="type_souris">
                                <input type="radio" name="type" id="type_souris" value="souris" class="d-none">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Souris" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Souris</p>
                            </label>
                        </div>

                        <!-- Clavier -->
                        <div class="col-4 text-center product-select">
                            <label for="type_clavier">
                                <input type="radio" name="type" id="type_clavier" value="clavier" class="d-none">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Clavier" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Clavier</p>
                            </label>
                        </div>

                        <!-- Ecran -->
                        <div class="col-4 text-center product-select">
                            <label for="type_ecran">
                                <input type="radio" name="type" id="type_ecran" value="ecran" class="d-none">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Ecran" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Ecran</p>
                            </label>
                        </div>

                        <!-- Casque -->
                        <div class="col-4 text-center product-select">
                            <label for="type_casque">
                                <input type="radio" name="type" id="type_casque" value="casque" class="d-none">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Casque" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Casque</p>
                            </label>
                        </div>

                        <!-- Imprimante -->
                        <div class="col-4 text-center product-select">
                            <label for="type_imprimante">
                                <input type="radio" name="type" id="type_imprimante" value="imprimante" class="d-none">
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Imprimante" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Imprimante</p>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Filtre par prix minimum -->
                <div class="mb-3">
                    <label for="help_min_price" class="form-label">Quel est votre budget minimum ?</label>
                    <input type="number" class="form-control" id="help_min_price" name="min_price"
                           value="{{ request('min_price') }}" placeholder="Par exemple : 100€">
                </div>

                <!-- Filtre par prix maximum -->
                <div class="mb-3">
                    <label for="help_max_price" class="form-label">Et votre budget maximum ?</label>
                    <input type="number" class="form-control" id="help_max_price" name="max_price"
                           value="{{ request('max_price') }}" placeholder="Par exemple : 1000€">
                </div>

                <!-- Filtre par marque -->
                <div class="mb-3">
                    <label for="help_brand" class="form-label">Avez-vous une préférence de marque ?</label>
                    <select class="form-control" id="help_brand" name="brands[]">
                        <option value="">Choisir une marque</option>
                        <option value="hp" @if (is_array(request('brands')) && in_array('hp', request('brands'))) selected @endif>HP</option>
                        <option value="dell" @if (is_array(request('brands')) && in_array('dell', request('brands'))) selected @endif>Dell</option>
                        <option value="apple" @if (is_array(request('brands')) && in_array('apple', request('brands'))) selected @endif>Apple</option>
                        <option value="lenovo" @if (is_array(request('brands')) && in_array('lenovo', request('brands'))) selected @endif>Lenovo</option>
                        <option value="asus" @if (is_array(request('brands')) && in_array('asus', request('brands'))) selected @endif>Asus</option>
                        <option value="acer" @if (is_array(request('brands')) && in_array('acer', request('brands'))) selected @endif>Acer</option>
                    </select>
                </div>

                <!-- Bouton pour soumettre le formulaire -->
                <button type="submit" class="btn btn-primary w-100">Trouver le produit idéal avec vos critères</button>
            </form>
        </div>
    </div>
</div>



<script>
    $(document).ready(function(){
        $('#helpModal').modal('show'); // Ouvre le modal dès que la page est prête
    });
</script>


                {{-- Left Sidebar for Filters --}}
                <div class="col-md-3 pe-4" data-aos="flip-right">

                    <div class="card p-3 mb-4">
                        <h5 class="mb-3">Filtres</h5>

                        {{-- Search --}}
                        <div class="mb-3">
                            <label for="search" class="form-label">Rechercher</label>
                            <input type="text" name="search" class="form-control" placeholder="Nom du produit..."
                                value="{{ request('search') }}">
                        </div>

                        {{-- Sort --}}
                        <div class="mb-3">
                            <label for="sort" class="form-label">Trier par</label>
                            <select name="sort" class="form-control">
                                <option value="">Par défaut</option>
                                <option value="price_asc" @if (request('sort') == 'price_asc') selected @endif>Prix croissant
                                </option>
                                <option value="price_desc" @if (request('sort') == 'price_desc') selected @endif>Prix
                                    décroissant</option>
                            </select>
                        </div>

                        {{-- Price Range --}}
                        <div class="mb-3">
                            <label for="min_price" class="form-label">Prix Min</label>
                            <input type="number" name="min_price" class="form-control" placeholder="Minimum"
                                value="{{ request('min_price') }}">
                        </div>
                        <div class="mb-3">
                            <label for="max_price" class="form-label">Prix Max</label>
                            <input type="number" name="max_price" class="form-control" placeholder="Maximum"
                                value="{{ request('max_price') }}">
                        </div>

                        {{-- Types --}}
                        <h5 class="mt-4">Type de produit</h5>
                        <div class="mb-3">
                            @php
                                $hardcodedTypes = ['pc', 'souris', 'clavier', 'ecran', 'casque', 'imprimante'];
                            @endphp
                            @foreach ($hardcodedTypes as $type)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="type[]"
                                        value="{{ $type }}" id="type_{{ Str::slug($type) }}"
                                        @if (is_array(request('type')) && in_array($type, request('type'))) checked @endif>
                                    <label class="form-check-label" for="type_{{ Str::slug($type) }}">
                                        {{ ucfirst($type) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        {{-- Brands --}}
                        <h5 class="mt-4">Marque</h5>
                        <div class="mb-3">
                            @php
                                $hardcodedBrands = [
                                    'hp',
                                    'dell',
                                    'apple',
                                    'huawei',
                                    'lenovo',
                                    'asus',
                                    'acer',
                                    'samsung',
                                ];
                            @endphp
                            @foreach ($hardcodedBrands as $brand)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="brands[]"
                                        value="{{ $brand }}" id="brand_{{ Str::slug($brand) }}"
                                        @if (is_array(request('brands')) && in_array($brand, request('brands'))) checked @endif>
                                    <label class="form-check-label" for="brand_{{ Str::slug($brand) }}">
                                        {{ ucfirst($brand) }}
                                    </label>
                                </div>
                            @endforeach
                        </div>

                        <button type="submit" class="btn btn-primary w-100 mt-3">Appliquer les filtres</button>
                    </div>
                </div>

                {{-- Right Content Area for Products --}}
                <div class="col-md-9 ps-4">
                    <div class="row">
                        @forelse ($products as $product)
                            <div class="col-md-4">
                                <div class="card mb-5" data-aos="fade-up">
                                    <img src="{{ $product->image_url }}" class="card-img-top"
                                        alt="{{ $product->name }}">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $product->name }}</h5>
                                        <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                                        <p class="card-text"><strong>{{ $product->price }} €</strong></p>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <a href="{{ route('products.show', $product->id) }}"
                                                class="btn btn-primary me-8">Voir
                                                plus</a>
                                            <form id="add-to-cart-form-{{ $product->id }}"
                                                action="{{ route('cart.add', $product->id) }}" method="POST"
                                                class="d-inline">
                                                @csrf
                                                <button type="button" class="btn btn-success"
                                                    onclick="addToCart({{ $product->id }})">Ajouter au panier</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="col-12">
                                <p>Aucun produit trouvé.</p>
                            </div>
                        @endforelse
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        function addToCart(productId) {
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            const formData = new FormData();
            formData.append('_token', csrfToken);

            fetch(`/cart/add/${productId}`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        showToast('Produit ajouté au panier !', 'success');
                        updateCartIcon(data.cartCount);
                    } else {
                        showToast('Erreur lors de l\'ajout au panier', 'danger');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    showToast('Une erreur s\'est produite.', 'danger');
                });
        }

        // Mise à jour de l'icône du panier avec le nouveau nombre d'articles
        function updateCartIcon(cartCount) {
            const cartCountElement = document.querySelector('.cart-counter');

            // Si l'élément de compteur existe
            if (cartCountElement) {
                // Mettre à jour le texte du compteur avec le nombre d'articles
                cartCountElement.innerText = cartCount;

                // Si le nombre d'articles est supérieur à 0, afficher la pastille
                if (cartCount > 0) {
                    cartCountElement.classList.add('show'); // Afficher la pastille
                } else {
                    cartCountElement.classList.remove('show'); // Cacher la pastille si le panier est vide
                }
            } else {
                console.log('L\'élément du compteur de panier n\'a pas été trouvé.');
            }
        }
    </script>
@endsection