@extends('layouts.app')

@section('title', 'Nous contacter')

@section('content')
<div class="container py-5">
    <h1 class="text-center mb-4">Nous contacter</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <p class="text-center lead mb-5">
                Une question, une suggestion ou besoin d'assistance ? N'hésitez pas à nous contacter via le formulaire ci-dessous ou nos coordonnées.
            </p>

            <form action="#" method="POST"> {{-- Replace # with your actual form submission URL --}}
                @csrf {{-- Laravel CSRF token --}}
                <div class="form-group">
                    <label for="name">Nom complet</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Adresse e-mail</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Sujet</label>
                    <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="form-group">
                    <label for="message">Votre message</label>
                    <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary btn-block">Envoyer le message</button>
            </form>

            <div class="mt-5 text-center">
                <h2>Nos coordonnées</h2>
                <p><strong>Email:</strong> contact@shopera.com</p>
                <p><strong>Téléphone:</strong> +33 1 23 45 67 89</p>
                <p><strong>Adresse:</strong> 123 Rue de l'e-commerce, 75000 Paris, France</p>
            </div>
        </div>
    </div>
</div>
@endsection
