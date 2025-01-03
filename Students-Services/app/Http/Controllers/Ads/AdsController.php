<?php

namespace App\Http\Controllers\Ads;

use App\Models\User;
use App\Models\Ads;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class AdsController extends Controller
{
   
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $sort = $request->input('sort', 'desc');
        $category = $request->input('category');

        // Base de la requête
        $query = Ads::query();

        // Filtrer par recherche textuelle
        if ($searchTerm) {
            $query->where('title', 'like', '%' . $searchTerm . '%');
        }

        // Filtrer par catégorie
        if ($category) {
            $query->where('category', $category);
        }

        // Appliquer le tri et récupérer toutes les colonnes, y compris la catégorie
        $ads = $query->orderBy('creation_date', $sort)->get();

        return view('ads.index', compact('ads', 'searchTerm', 'sort', 'category'));
    }

    public function create()
    {
        return view('ads.create');
    }

    public function store(Request $request)
    {
        // Afficher la valeur de la catégorie reçue
        \Log::info('Catégorie reçue:', ['category' => $request->input('category')]);
    
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string|max:5000',
            'category' => 'required|in:Prêt de matériel,Cours particulier,Groupe d\'étude,Sorties',
        ]);

        $user = auth()->user();
        if ($user->points < 50) {
            return redirect()->route('ads.index')->with('error', 'Vous n\'avez pas assez de points pour poster une annonce.');
        }

        $user->points -= 50;
        $user->save();

        // Créer l'annonce avec les données validées
        $ad = Ads::create([
            'users_id' => $user->id,
            'title' => $validated['title'],
            'description' => $validated['description'],
            'category' => $validated['category'],
        ]);

        // Vérifier si l'annonce a été créée avec succès
        if ($ad) {
            \Log::info('Annonce créée avec succès:', ['ad' => $ad->toArray()]);
            return redirect()->route('ads.index')->with('success', 'Annonce créée avec succès !');
        } else {
            \Log::error('Échec de la création de l\'annonce');
            return redirect()->route('ads.index')->with('error', 'Une erreur est survenue lors de la création de l\'annonce.');
        }
    }



    public function show(Ads $ad)
    {
        return view('ads.show', compact('ad'));
    }

    public function edit(Ads $ad)
    {
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
        $this->authorize('delete', $ad);
        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Annonce supprimée avec succès !');
    }

    public function accept(Ads $ad)
    {
        $user = auth()->user();

        if ($ad->status == 'accepted') {
            return redirect()->route('ads.index')->with('error', 'Cette annonce a déjà été acceptée.');
        }

        if ($ad->users_id == $user->id) {
            return redirect()->route('ads.index')->with('error', 'Vous ne pouvez pas accepter votre propre annonce.');
        }

        $user->points += 50;
        $user->save();

        $poster = User::find($ad->users_id);
        $poster->points -= 50;
        $poster->save();

        $ad->status = 'accepted';
        $ad->save();
        $ad->delete();

        return redirect()->route('ads.index')->with('success', 'Annonce acceptée et supprimée avec succès.');
    }
}
