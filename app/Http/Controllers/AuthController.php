<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    // Affiche le formulaire de connexion
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Affiche le formulaire d'inscription
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    // Gère la connexion de l'utilisateur
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('/'); // Redirige vers la page d'accueil ou autre page
        }

        return back()->withErrors([
            'email' => 'Les informations de connexion sont incorrectes.',
        ]);
    }

    // Gère l'inscription de l'utilisateur
    public function register(Request $request)
    {
        // Validation des données d'inscription
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Créer l'utilisateur
        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
        ]);

        // Connexion après inscription
        Auth::login($user);

        return redirect()->route('home'); // Rediriger vers la page d'accueil ou autre page
    }

    // Déconnexion
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
