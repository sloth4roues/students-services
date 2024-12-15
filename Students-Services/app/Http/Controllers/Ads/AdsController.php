<?php

namespace App\Http\Controllers\Ads;

use App\Models\User;
use App\Models\Ads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Policies\AdsPolicy;  // Si nécessaire, importez votre policy
use Illuminate\Foundation\Auth\Access\AuthorizesRequests; // Ajoute ceci

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
    
        // Création via Factory
        $ad = Ads::factory()->create([
            'users_id' => auth()->id(), // Utilisateur connecté
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
        // Vérifie si l'utilisateur est autorisé à modifier l'annonce
        $this->authorize('update', $ad);
        
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
        // Vérifie si l'utilisateur est autorisé à supprimer l'annonce
        $this->authorize('delete', $ad);
        
        // Si l'utilisateur est autorisé, on supprime l'annonce
        $ad->delete();
     
        return redirect()->route('ads.index')->with('success', 'Annonce supprimée avec succès !');
    }
    
}
