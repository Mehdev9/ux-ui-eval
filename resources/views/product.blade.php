@extends('layouts.app')

@section('header_title', 'Nos produits')
@section('header_subtitle', 'Découvrez notre sélection de produits.')

@section('content')
    <div class="container-fluid mt-5">
        <form action="{{ route('products.index') }}" method="GET">
            <div class="row">
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
                                $hardcodedBrands = ['hp', 'dell', 'apple', 'huawei', 'lenovo', 'asus', 'acer', 'samsung'];
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
                                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary me-8">Voir
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
            // Sélectionne l'élément avec la classe .cart-counter
            const cartCountElement = document.querySelector('.cart-counter');
            if (cartCountElement) {
                cartCountElement.innerText = cartCount; // Met à jour le texte avec le nombre d'articles
            } else {
                console.log('L\'élément du compteur de panier n\'a pas été trouvé.');
            }
        }
    </script>
@endsection
