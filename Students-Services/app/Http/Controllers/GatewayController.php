<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Pour faire des requêtes HTTP
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class GatewayController extends Controller
{
    // Authentification
    public function login(Request $request)
    {
        $credentials = $request->only('name', 'password');

        // Simuler l'appel à un service externe pour l'authentification
        $response = Http::post(env('AUTH_SERVICE_URL') . '/api/login', $credentials);

        if ($response->successful()) {
            return response()->json($response->json(), 200); 
        }

        return response()->json(['error' => 'Authentication failed'], 401); 
    }

    // Inscription 
    public function register(Request $request)
    {
        $response = Http::post(env('AUTH_SERVICE_URL') . '/api/register', $request->all());

        if ($response->successful()) {
            return response()->json($response->json(), 201); 
        }

        return response()->json(['error' => 'Registration failed'], 400); 
    }

    // Déconnexion (Logout)
    public function logout(Request $request)
    {
        Auth::logout();
        return response()->json(['message' => 'Logged out successfully'], 200);
    }

    // Récupérer les données utilisateur 
    public function getUserData(Request $request)
    {
        $user = Auth::user(); 

        return response()->json($user);
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
