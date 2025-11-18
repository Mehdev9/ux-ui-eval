<nav class="navbar">
    <a href="{{ route('home') }}"> 
        <img src="assets/img/header-1.jpg" alt="Logo" class="logo rounded-lg">
    </a>

    <!-- Liste des liens centrés -->
    <ul class="nav-links">
        <li><a href="{{ route('home') }}">Accueil</a></li>
        <li><a href="{{ route('products.index') }}">Produits</a></li>
        <li><a href="{{ route('detailProduct') }}">Détail</a></li>
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
                    <li><a href="{{ route('profil') }}">Profil</a></li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="logout-form">
                            @csrf
                            <button type="submit" class="btn btn-link">Déconnexion</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </li>
    </ul>
</nav>
