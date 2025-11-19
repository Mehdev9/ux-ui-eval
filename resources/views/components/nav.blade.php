<nav class="navbar">
    <a href="{{ route('home') }}">
        <img src="assets/img/header-1.jpg" alt="Logo" class="logo rounded-lg">
    </a>

    <!-- Liste des liens centrés -->
    <ul class="nav-links">
        <li><a href="{{ route('home') }}">Accueil</a></li>
        <li><a href="{{ route('products.index') }}">Produits</a></li>
        <li><a href="{{ Auth::check() ? route('profil') : route('login') }}">Profil</a></li>
        <li><a href="#">À propos</a></li>
        <li><a href="#">Nous contacter</a></li>
    </ul>

    <!-- Menu déroulant pour le compte (à droite) -->
    <ul class="nav-account">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle">
                <i class="fas fa-user"></i> Compte <!-- Ajout de l'icône ici -->
            </a>
            <ul class="dropdown-menu">
                @guest
                    <li><a href="{{ route('register') }}">Inscription</a></li>
                    <li><a href="{{ route('login') }}">Connexion</a></li>
                @endguest

                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="btn btn-link">Déconnexion</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </li>

        <!-- Si l'utilisateur est connecté, afficher l'icône panier avec le compteur -->
        @auth
            <li class="cart-icon">
                <a href="{{ route('cart.index') }}" class="cart-link">
                    <i class="fas fa-shopping-cart"></i> <!-- Icône Panier -->
                    <!-- Compteur de produits dans le panier -->
                    <span class="cart-counter">
                        {{ count(session('cart', [])) }}
                    </span>
                </a>
            </li>
        @endauth

    </ul>
</nav>

<style>
    .cart-icon {
        position: relative;
    }

    .cart-counter {
        position: absolute;
        top: -5px;
        right: -5px;
        background-color: #e74c3c; /* Rouge vif pour la bulle */
        color: white;
        font-size: 0.9rem;
        font-weight: bold;
        border-radius: 50%;
        width: 20px; /* Taille de la bulle */
        height: 20px;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 0;
    }
</style>


<script>
    window.addEventListener('cartUpdated', function(event) {
        const cartCount = event.detail.cartCount;
        const cartCountElement = document.querySelector('.cart-counter'); // Sélectionner par classe
        if (cartCountElement) {
            cartCountElement.innerText = cartCount; // Met à jour l'élément avec le nombre d'articles
        }
    });
</script>

