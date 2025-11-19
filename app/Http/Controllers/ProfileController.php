<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Illuminate\Validation\Rule;

use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        return view('profil', compact('user'));
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profil.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                Rule::unique('users')->ignore($user->id),
            ],
        ]);

        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->save();

        return redirect()->route('profil')->with('success', 'Profil mis à jour avec succès.');
    }

    public function editPassword()
    {
        return view('profil.password-edit');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        // Validate current password
        if (!Hash::check($request->current_password, $user->password)) {
            return back()->withErrors(['current_password' => 'Le mot de passe actuel est incorrect.']);
        }

        // Validate new password
        $request->validate([
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Update password
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->route('profil')->with('success', 'Mot de passe mis à jour avec succès.');
    }
}
