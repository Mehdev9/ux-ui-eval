@extends('layouts.app')

@section('content')
<div class="cart-container">
    <h1 class="cart-title">Mon Panier</h1>

    <!-- Si le panier est vide -->
    @if(session('cart') && count(session('cart')) > 0)
    <div class="cart-items">
        @foreach(session('cart') as $item)
        <div class="cart-item">
            <img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-image">
            <div class="cart-item-details">
                <h3 class="cart-item-title">{{ $item['name'] }}</h3>
                <p class="cart-item-price">{{ number_format($item['price'], 2, ',', ' ') }} €</p>
                
                <!-- Formulaire pour mettre à jour la quantité -->
                <form action="{{ route('cart.update', $item['id']) }}" method="POST">
                    @csrf
                    <label for="quantity-{{ $item['id'] }}">Quantité:</label>
                    <input type="number" id="quantity-{{ $item['id'] }}" name="quantity" value="{{ $item['quantity'] }}" min="1" max="99">
                    <button type="submit" class="btn-update">Mettre à jour</button>
                </form>
            </div>
            <div class="cart-item-actions">
                <!-- Lien pour supprimer l'article du panier -->
                <a href="{{ route('cart.remove', $item['id']) }}" class="remove-item">Supprimer</a>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Affichage du total -->
    <div class="cart-total">
        <h2>Total: {{ number_format($total, 2, ',', ' ') }} €</h2>
        <a href="{{ route('checkout') }}" class="checkout-button">Procéder au paiement</a>
    </div>

    @else
    <p>Votre panier est vide. Ajoutez des produits pour commencer vos achats !</p>
    @endif
</div>
@endsection
