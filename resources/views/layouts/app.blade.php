<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Mon Application Laravel')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;700&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <!-- AOS (Animate On Scroll) CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">

    <!-- Font Awesome (pour les icônes) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- CSS -->
    <link rel="stylesheet" href="{{ asset('app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="bg-light">

    <!-- Navigation -->
    @include('components.nav')

    <!-- Header -->
    <header class="header-section" style="background-image: url('{{ asset('assets/img/header-1.jpg') }}'); @yield('header_height')">
        <div class="overlay"></div> <!-- L'overlay sombre -->
        <div class="container-fluid text-center"> <!-- Utilisation de container-fluid pour pleine largeur -->
            <h1 class="display-4 text-white" data-aos="fade-up">@yield('header_title', 'Bienvenue sur Shopera')</h1>
            <p class="lead text-white" data-aos="fade-up" data-aos-delay="300">@yield('header_subtitle', 'Les meilleurs PC, claviers, souris et plus pour votre expérience gaming.')</p>
            @yield('header_button')
        </div>
    </header>
        <!-- Contenu principal -->
        <div class="container">
            @yield('content')
            <!-- Le contenu spécifique à chaque page -->
        </div>
    
        @yield('fullwidth_content')
    
        <!-- Footer -->
    @include('components.footer')

    <!-- jQuery, Bootstrap JS et Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <!-- AOS (Animate On Scroll) JS -->
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <!-- Initialisation AOS -->
    <script>
        AOS.init({
            duration: 1000,  // Durée de l'animation
            once: true,      // L'animation se déclenche une seule fois
            offset: 200      // L'animation commence lorsque l'élément est à 200px du bas de l'écran
        });
    </script>

    <!-- Script spécifique pour la gestion du panier -->
    @yield('scripts')

    <!-- JS App -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- Toast Container -->
<div id="toast-container" class="position-fixed top-0 end-0 mt-3 me-3 w-auto"></div>


<!-- Bootstrap Toast JS -->
<script>
    function showToast(message, type = 'success') {
        // Crée un élément Toast
        const toast = document.createElement('div');
        toast.classList.add('toast', 'fade', 'bg-' + type, 'text-white');
        toast.style = 'min-width: 250px;';

        // Contenu du Toast
        toast.innerHTML = `
            <div class="toast-body">
                ${message}
            </div>
        `;

        // Ajouter le Toast au conteneur
        const toastContainer = document.getElementById('toast-container');
        toastContainer.appendChild(toast);

        // Initialiser le Toast avec l'option 'autohide' et la durée d'affichage
        const toastInstance = new bootstrap.Toast(toast, {
            animation: true,  // Animation d'apparition et de disparition
            delay: 3000,      // Temps avant de disparaître (en ms)
            autohide: true    // Le Toast se cache automatiquement après le délai
        });

        // Afficher le Toast
        toastInstance.show();
    }
</script>


</body>
</html>
