<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Pour faire des requêtes HTTP
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GatewayController extends Controller
{
    // Authentification (Login)
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        // Simuler l'appel à un service externe pour l'authentification
        $response = Http::post(env('AUTH_SERVICE_URL') . '/api/login', $credentials);

        if ($response->successful()) {
            return response()->json($response->json(), 200); // Réponse de connexion réussie
        }

        return response()->json(['error' => 'Authentication failed'], 401); // Échec de la connexion
    }

    // Inscription (Register)
    public function register(Request $request)
    {
        $response = Http::post(env('AUTH_SERVICE_URL') . '/api/register', $request->all());

        if ($response->successful()) {
            return response()->json($response->json(), 201); // Réponse de succès d'inscription
        }

        return response()->json(['error' => 'Registration failed'], 400); // Échec de l'inscription
    }

    // Déconnexion (Logout)
    public function logout(Request $request)
    {
        // Logique pour déconnecter l'utilisateur (ici, une suppression du token)
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    // Récupérer les données utilisateur (depuis le service backend)
    public function getUserData(Request $request)
    {
        $user = Auth::user(); // Récupère l'utilisateur connecté

        return response()->json($user); // Retourne les données utilisateur
    }

    // Mise à jour des données utilisateur
    public function updateUser(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->update($validatedData);

        return response()->json(['message' => 'User updated successfully'], 200);
    }
}
