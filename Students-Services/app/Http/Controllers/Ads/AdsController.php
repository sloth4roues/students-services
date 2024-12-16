<?php

namespace App\Http\Controllers\Ads;

use App\Models\User;
use App\Models\Ads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Policies\AdsPolicy;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdsController extends Controller
{
    use AuthorizesRequests; // Ajoute cette ligne

    public function index(Request $request)
    {
        // Récupère le terme de recherche et l'option de tri
        $searchTerm = $request->input('search');
        $sort = $request->input('sort', 'desc'); // 'desc' par défaut, pour les plus récents en premier
        
        // Si un terme de recherche est fourni, filtre les annonces
        if ($searchTerm) {
            // Recherche exacte par titre
            $ads = Ads::where('title', 'like', '%' . $searchTerm . '%')
                      ->orderBy('creation_date', $sort) // Applique le tri
                      ->get();
            
            // Si aucune annonce n'est trouvée, chercher des résultats similaires
            if ($ads->isEmpty()) {
                $ads = Ads::where('title', 'like', $searchTerm . '%')
                          ->orderBy('creation_date', $sort) // Applique le tri
                          ->get();
            }
        } else {
            // Si aucune recherche n'est faite, récupérer toutes les annonces et appliquer le tri
            $ads = Ads::orderBy('creation_date', $sort)->get();
        }
        
        // Retourner la vue avec les résultats de recherche
        return view('ads.index', compact('ads', 'searchTerm', 'sort'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
        ]);
    
        // Vérifie que l'utilisateur a suffisamment de points
        $user = auth()->user();
        if ($user->points < 50) {
            return redirect()->route('ads.index')->with('error', 'Vous n\'avez pas assez de points pour poster une annonce.');
        }
    
        // Déduit 50 points pour poster l'annonce
        $user->points -= 50;
        $user->save();
    
        // Création de l'annonce
        $ad = Ads::create([
            'users_id' => $user->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
        ]);
    
        return redirect()->route('ads.index')->with('success', 'Annonce créée avec succès !');
    }
    
    

    public function show(Ads $ad)
    {
        return view('ads.show', compact('ad'));
    }

    public function edit(Ads $ad)
    {
        try {
            // Vérifie si l'utilisateur est autorisé à modifier l'annonce
            $this->authorize('update', $ad);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // Alert : Si l'utilisateur n'a pas la permission
            return redirect()->route('ads.index')->with('error', "Vous n'avez pas la permission, cette annonce ne vous appartient pas !");
        }
    
        return view('ads.edit', compact('ad'));
    }
    
    public function update(Request $request, Ads $ad)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
        ]);
    
        $ad->update($validated);
    
        return redirect()->route('ads.index')->with('success', 'Annonce mise à jour avec succès !');
    }
    
    public function destroy(Ads $ad)
    {
        try {
            // Vérifie si l'utilisateur est autorisé à supprimer l'annonce
            $this->authorize('delete', $ad);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            // Alert : Si l'utilisateur n'a pas la permission
            return redirect()->route('ads.index')->with('error', "Vous n'avez pas la permission, cette annonce ne vous appartient pas !");
        }
    
        // Si l'utilisateur est autorisé, on supprime l'annonce
        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Annonce supprimée avec succès !');
    }
    public function accept(Ads $ad)
    {
        $user = auth()->user();

        // Vérifie que l'annonce n'a pas déjà été acceptée
        if ($ad->status == 'accepted') {
            return redirect()->route('ads.index')->with('error', 'Cette annonce a déjà été acceptée.');
        }

        // Vérifie que l'utilisateur ne peut pas accepter sa propre annonce
        if ($ad->users_id == $user->id) {
            return redirect()->route('ads.index')->with('error', 'Vous ne pouvez pas accepter votre propre annonce.');
        }

        // Ajouter 50 points à l'utilisateur qui accepte l'annonce
        $user->points += 50;
        $user->save();

        // Retirer 50 points de l'utilisateur qui a posté l'annonce
        $poster = User::find($ad->users_id);
        $poster->points -= 50;
        $poster->save();

        // Marquer l'annonce comme acceptée
        $ad->status = 'accepted';
        $ad->save();

        // Supprimer l'annonce une fois qu'elle est acceptée
        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Annonce acceptée et supprimée avec succès.');
    }
    
    public function myAds()
    {
        $user = auth()->user(); // Récupération de l'utilisateur connecté
        
        // Récupération des annonces appartenant à cet utilisateur
        $ads = Ads::where('users_id', $user->id)->orderBy('creation_date', 'desc')->get();
        
        // Retourne une vue spécifique pour les annonces de l'utilisateur
        return view('ads.my_ads', compact('ads'));
    }
    
    
    
}
