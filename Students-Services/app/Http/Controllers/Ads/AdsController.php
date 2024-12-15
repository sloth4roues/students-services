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

    public function index()
    {
        $ads = Ads::all(); // Récupère toutes les annonces
        return view('ads.index', compact('ads')); // Envoie les données à la vue
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
        $ad->delete();
    
        return redirect()->route('ads.index')->with('success', 'Annonce supprimée avec succès !');
    }
    
}
