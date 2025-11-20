@extends('layouts.app')

@section('header_title', 'Nos produits')
@section('header_subtitle', 'Découvrez notre sélection de produits.')

<style>
    .product-img {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .product-img:hover {
        transform: scale(1.1);
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }

    .product-select input[type="radio"]:checked + img {
        border: 3px solid #007bff;
        box-shadow: 0 4px 15px rgba(0, 123, 255, 0.5);
    }
</style>

@section('content')
    <div class="container-fluid mt-5">
        <form action="{{ route('products.index') }}" method="GET">
            <div class="row">

                <!-- Bouton d'aide -->
                <div class="container-fluid text-center">
                    <button type="button" class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#helpModal">
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
                        <div class="col-4 text-center">
                            <label for="type_pc" class="product-select">
                                <input type="radio" name="type" id="type_pc" value="pc" class="d-none" 
                                       @if (request('type') == 'pc') checked @endif>
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="PC" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>PC</p>
                            </label>
                        </div>

                        <!-- Souris -->
                        <div class="col-4 text-center">
                            <label for="type_souris" class="product-select">
                                <input type="radio" name="type" id="type_souris" value="souris" class="d-none" 
                                       @if (request('type') == 'souris') checked @endif>
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Souris" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Souris</p>
                            </label>
                        </div>

                        <!-- Clavier -->
                        <div class="col-4 text-center">
                            <label for="type_clavier" class="product-select">
                                <input type="radio" name="type" id="type_clavier" value="clavier" class="d-none" 
                                       @if (request('type') == 'clavier') checked @endif>
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Clavier" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Clavier</p>
                            </label>
                        </div>

                        <!-- Ecran -->
                        <div class="col-4 text-center">
                            <label for="type_ecran" class="product-select">
                                <input type="radio" name="type" id="type_ecran" value="ecran" class="d-none" 
                                       @if (request('type') == 'ecran') checked @endif>
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Ecran" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Ecran</p>
                            </label>
                        </div>

                        <!-- Casque -->
                        <div class="col-4 text-center">
                            <label for="type_casque" class="product-select">
                                <input type="radio" name="type" id="type_casque" value="casque" class="d-none" 
                                       @if (request('type') == 'casque') checked @endif>
                                <img src="{{ asset('assets/img/header-1.jpg') }}" alt="Casque" class="img-fluid product-img" style="width: 100px; cursor: pointer;">
                                <p>Casque</p>
                            </label>
                        </div>

                        <!-- Imprimante -->
                        <div class="col-4 text-center">
                            <label for="type_imprimante" class="product-select">
                                <input type="radio" name="type" id="type_imprimante" value="imprimante" class="d-none" 
                                       @if (request('type') == 'imprimante') checked @endif>
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
                        {{ $products->links('pagination::bootstrap-5') }}
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
