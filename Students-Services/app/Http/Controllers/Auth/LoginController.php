<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        // Validation des champs d'entrée
        $request->validate([
            'name' => ['required', 'string'],
            'password' => ['required', 'string'],
        ], [
            // Messages d'erreur personnalisés
            'name.required' => 'Le nom est obligatoire.',
            'password.required' => 'Le mot de passe est obligatoire.',
        ]);

        // Récupérer les identifiants
        $credentials = $request->only('name', 'password');

        // Tentative d'authentification avec "name" au lieu d'email
        if (Auth::attempt($credentials)) {
            // Authentification réussie
            $request->session()->regenerate();
            return redirect()->intended('/'); // Redirige vers la page d'accueil
        }

        // Si l'authentification échoue
        return back()
            ->with('error', 'Le nom ou le mot de passe est incorrect.')
            ->onlyInput('name'); // Garde le champ "name" pré-rempli
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/login');
    }
}
