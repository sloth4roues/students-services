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
    use AuthorizesRequests;

    public function index(Request $request)
    {
        $searchTerm = $request->input('search');
        $sort = $request->input('sort', 'desc');

        if ($searchTerm) {
            $ads = Ads::where('title', 'like', '%' . $searchTerm . '%')
                      ->orderBy('creation_date', $sort)
                      ->get();

            if ($ads->isEmpty()) {
                $ads = Ads::where('title', 'like', $searchTerm . '%')
                          ->orderBy('creation_date', $sort)
                          ->get();
            }
        } else {
            $ads = Ads::orderBy('creation_date', $sort)->get();
        }

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

        $user = auth()->user();
        if ($user->points < 50) {
            return redirect()->route('ads.index')->with('error', 'Vous n\'avez pas assez de points pour poster une annonce.');
        }

        $user->points -= 50;
        $user->save();

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
            $this->authorize('update', $ad);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
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
            $this->authorize('delete', $ad);
        } catch (\Illuminate\Auth\Access\AuthorizationException $e) {
            return redirect()->route('ads.index')->with('error', "Vous n'avez pas la permission, cette annonce ne vous appartient pas !");
        }

        $ad->delete();
        return redirect()->route('ads.index')->with('success', 'Annonce supprimée avec succès !');
    }

    public function accept(Ads $ad)
    {
        $user = auth()->user();

        if ($ad->is_accepted) {
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

        $ad->update([
            'is_accepted' => 1,
            'accepted_by' => $user->id,
        ]);

        return redirect()->route('ads.index')->with('success', 'Annonce acceptée avec succès.');
    }

    public function myAds()
    {
        $user = auth()->user();
        $ads = Ads::where('users_id', $user->id)->orderBy('creation_date', 'desc')->get();
    
        return view('ads.my_ads', compact('ads'));
    }    

    public function acceptedAds()
    {
        $ads = Ads::where('is_accepted', 1)->orderBy('creation_date', 'desc')->paginate(15);
        return view('ads.accepted', compact('ads'));
    }
    
    
    public function showAcceptedAds()
    {
        $ads = Ads::where('accepted_by', auth()->id())->where('is_accepted', 1)->get();
        return view('ads.my_accepted', compact('ads'));
    }
    
}
