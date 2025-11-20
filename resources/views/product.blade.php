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

        // Mise à jour de l\'icône du panier avec le nouveau nombre d\'articles
function updateCartIcon(cartCount) {
    const cartCountElement = document.querySelector('.cart-counter');
    
    // Si l\'élément de compteur existe
    if (cartCountElement) {
        // Mettre à jour le texte du compteur avec le nombre d\'articles
        cartCountElement.innerText = cartCount;

        // Si le nombre d\'articles est supérieur à 0, afficher la pastille
        if (cartCount > 0) {
            cartCountElement.classList.add('show');  // Afficher la pastille
        } else {
            cartCountElement.classList.remove('show'); // Cacher la pastille si le panier est vide
        }
    } else {
        console.log('L\'élément du compteur de panier n\'a pas été trouvé.');
    }
}

    </script>
@endsection