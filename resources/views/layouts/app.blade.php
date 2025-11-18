<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Mon Application Laravel')</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">

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
</head>
<body class="bg-light font-roboto">

    <!-- Navigation -->
    @include('components.nav')

    <!-- Contenu principal -->
    <div class="container py-5">
        <!-- Le contenu spécifique à chaque page -->
        @yield('content')
    </div>

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

    <!-- JS -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
