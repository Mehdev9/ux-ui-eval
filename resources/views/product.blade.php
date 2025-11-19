@extends('layouts.app')

@section('header_title', 'Nos produits')
@section('header_subtitle', 'Découvrez notre sélection de produits.')
@section('header_height', 'height: 750px;')

@section('content')
    <div class="container mt-5">
        <div class="row mb-4">
            <div class="col-md-12">
                <form action="{{ route('products.index') }}" method="GET">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="text" name="search" class="form-control" placeholder="Rechercher un produit..."
                                value="{{ request('search') }}">
                        </div>
                        <div class="col-md-2">
                            <select name="sort" class="form-control">
                                <option value="">Trier par</option>
                                <option value="price_asc" @if (request('sort') == 'price_asc') selected @endif>Prix croissant
                                </option>
                                <option value="price_desc" @if (request('sort') == 'price_desc') selected @endif>Prix
                                    décroissant</option>
                            </select>
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="min_price" class="form-control" placeholder="Prix min"
                                value="{{ request('min_price') }}">
                        </div>
                        <div class="col-md-2">
                            <input type="number" name="max_price" class="form-control" placeholder="Prix max"
                                value="{{ request('max_price') }}">
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="col-md-6">
                            <h5>Type de produit</h5>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="type[]" value="souris"
                                    id="type_souris" @if (is_array(request('type')) && in_array('souris', request('type'))) checked @endif>
                                <label class="form-check-label" for="type_souris">Souris</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="checkbox" name="type[]" value="clavier"
                                    id="type_clavier" @if (is_array(request('type')) && in_array('clavier', request('type'))) checked @endif>
                                <label class="form-check-label" for="type_clavier">Clavier</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <h5>Marque</h5>
                            @foreach (['hp', 'dell', 'apple', 'huawei', 'lenovo', 'asus', 'acer'] as $brand)
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="brands[]"
                                        value="{{ $brand }}" id="brand_{{ $brand }}"
                                        @if (is_array(request('brands')) && in_array($brand, request('brands'))) checked @endif>
                                    <label class="form-check-label"
                                        for="brand_{{ $brand }}">{{ ucfirst($brand) }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ $product->image_url }}" class="card-img-top" alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                            <p class="card-text"><strong>{{ $product->price }} €</strong></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <a href="{{ route('products.show', $product->id) }}" class="btn btn-primary">Voir plus</a>
                                <form id="add-to-cart-form-{{ $product->id }}"
                                    action="{{ route('cart.add', $product->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    <button type="button" class="btn btn-success"
                                        onclick="addToCart({{ $product->id }})">Ajouter au panier</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="d-flex justify-content-center">
            {{ $products->links('pagination::bootstrap-5') }}
        </div>
    </div>

    <script>
        function addToCart(productId) {

            // Récupérer le token CSRF
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

            // Créer le form data pour envoyer avec la requête
            const formData = new FormData();
            formData.append('_token', csrfToken);

            // Effectuer la requête AJAX pour ajouter au panier
            fetch(`/cart/add/${productId}`, {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Produit ajouté au panier !');
                        updateCartIcon(data.cartCount); // Mise à jour du compteur
                    } else {
                        alert('Erreur lors de l\'ajout au panier');
                    }
                })
                .catch(error => {
                    console.error('Erreur:', error);
                    alert('Une erreur s\'est produite.');
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
