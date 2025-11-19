@extends('layouts.app')

@section('content')
<div class="cart-container py-5">
    <div class="container">
        <h1 class="cart-title text-center mb-4">Mon Panier</h1>

        <!-- Si le panier est vide -->
        @if(session('cart') && count(session('cart')) > 0)
        <div class="cart-items">
            @foreach(session('cart') as $item)
            <div class="cart-item card shadow-sm mb-4" data-aos="fade-up">
                <div class="row no-gutters">
                    <!-- Image du produit -->
                    <div class="col-md-3">
                        <img src="{{ asset('storage/'.$item['image']) }}" alt="{{ $item['name'] }}" class="cart-item-image img-fluid rounded">
                    </div>

                    <!-- Détails du produit -->
                    <div class="col-md-6">
                        <div class="cart-item-details p-3">
                            <h3 class="cart-item-title">{{ $item['name'] }}</h3>
                            <p class="cart-item-price text-muted">{{ number_format($item['price'], 2, ',', ' ') }} €</p>
                            
                            <!-- Formulaire pour mettre à jour la quantité -->
                            <div class="d-flex align-items-center">
                                <label for="quantity-{{ $item['id'] }}" class="mr-2">Quantité:</label>

                                <!-- Compteur de quantité -->
                                <button type="button" class="btn btn-light btn-sm" onclick="updateQuantity({{ $item['id'] }}, -1)">-</button>
                                <input type="number" id="quantity-{{ $item['id'] }}" name="quantity" value="{{ $item['quantity'] }}" min="1" max="99" class="form-control w-25 mx-2" style="font-size: 1rem;" onchange="updateQuantity({{ $item['id'] }}, this.value)">
                                <button type="button" class="btn btn-light btn-sm" onclick="updateQuantity({{ $item['id'] }}, 1)">+</button>
                            </div>
                        </div>
                    </div>

                    <!-- Actions (Supprimer) -->
                    <div class="col-md-3 text-center d-flex justify-content-center align-items-center">
                        <a href="{{ route('cart.remove', $item['id']) }}" class="btn btn-danger btn-sm btn-rounded">Supprimer</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <!-- Total et bouton de commande -->
        <div class="cart-total d-flex justify-content-between align-items-center mt-4">
            <h2 class="text-dark">Total: {{ number_format($total, 2, ',', ' ') }} €</h2>
            <a href="#" class="btn btn-success btn-lg btn-rounded shadow-sm">Procéder au paiement</a>
        </div>

        @else
        <p class="text-center text-muted">Votre panier est vide. Ajoutez des produits pour commencer vos achats !</p>
        @endif
    </div>
</div>
@endsection

@section('styles')
    <style>
        .cart-container {
            background-color: #f8f9fa;
            padding-top: 40px;
        }

        .cart-title {
            font-size: 2rem;
            font-weight: bold;
        }

        .cart-item {
            border-radius: 20px; /* Augmentation de l'arrondi */
            overflow: hidden;
            transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
        }

        .cart-item:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.1); /* Ombre plus grande */
        }

        .cart-item-details {
            padding: 20px;
        }

        .cart-item-title {
            font-size: 1.5rem;
            font-weight: bold;
        }

        .cart-item-price {
            font-size: 1.2rem;
        }

        .cart-item-image {
            border-radius: 20px; /* Assure que l'image a aussi un arrondi plus grand */
        }

        .cart-total {
            background-color: #fff;
            padding: 15px;
            border-radius: 15px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .form-control {
            border-radius: 10px;
            padding: 12px;
            font-size: 1rem;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        .form-control:focus {
            border-color: #3498db;
            box-shadow: 0 0 10px rgba(52, 152, 219, 0.3);
        }

        .btn-warning {
            background-color: #f39c12;
            border-color: #f39c12;
        }

        .btn-warning:hover {
            background-color: #e67e22;
            border-color: #e67e22;
        }

        .btn-danger {
            background-color: #e74c3c;
            border-color: #e74c3c;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            border-color: #c0392b;
        }

        .btn-success {
            background-color: #2ecc71;
            border-color: #2ecc71;
        }

        .btn-success:hover {
            background-color: #27ae60;
            border-color: #27ae60;
        }
    </style>
@endsection

@section('scripts')
   @section('scripts')
   <script>
    // Définir la fonction updateQuantity globalement avant toute utilisation
    window.updateQuantity = function(productId, quantity) {
        // S'assurer que la quantité est un entier valide (>= 1)
        quantity = parseInt(quantity);
        if (isNaN(quantity) || quantity < 1) quantity = 1;

        // Envoi de la requête AJAX pour mettre à jour la quantité
        fetch(`/cart/update/${productId}`, {
            method: 'POST',
            body: JSON.stringify({
                _token: '{{ csrf_token() }}', // CSRF token pour la sécurité
                quantity: quantity
            }),
            headers: {
                'Content-Type': 'application/json'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Mettre à jour la quantité dans le champ input
                const quantityInput = document.getElementById(`quantity-${productId}`);
                quantityInput.value = data.newQuantity;

                // Mettre à jour le total du panier
                document.querySelector('.cart-total h2').innerText = `Total: ${data.newTotal} €`;
            } else {
                alert('Erreur lors de la mise à jour de la quantité');
            }
        })
        .catch(error => {
            alert('Une erreur s\'est produite lors de la mise à jour de la quantité');
        });
    }

    document.addEventListener('DOMContentLoaded', function() {
        // Ajout des événements sur les inputs de quantité
        const quantityInputs = document.querySelectorAll('input[name="quantity"]');
        
        quantityInputs.forEach(input => {
            input.addEventListener('change', function() {
                const productId = this.id.replace('quantity-', ''); // Récupère l'ID du produit
                let quantity = parseInt(this.value); // La quantité saisie

                if (isNaN(quantity) || quantity < 1) {
                    // Si la quantité n'est pas valide, remettre la valeur à 1
                    this.value = 1;
                    quantity = 1;
                }

                updateQuantity(productId, quantity);
            });
        });

        // Ajout des événements sur les boutons + et -
        const incrementButtons = document.querySelectorAll('.btn-light');
        incrementButtons.forEach(button => {
            button.addEventListener('click', function() {
                const quantityInput = this.parentElement.querySelector('input');
                const productId = quantityInput.id.replace('quantity-', ''); // Récupère l'ID produit
                let quantity = parseInt(quantityInput.value);

                // On gère l'incrémentation ou la décrémentation en fonction du bouton
                if (this.textContent.trim() === '+') {
                    quantity += 1;
                } else if (this.textContent.trim() === '-') {
                    quantity = Math.max(1, quantity - 1);
                }

                // Met à jour la quantité avec le bon produit
                updateQuantity(productId, quantity);
            });
        });
    });
</script>

@endsection
