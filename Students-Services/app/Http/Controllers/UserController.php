<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('register', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed|min:6',  
        ]);
        
        // Hashage du mot de passe avant de l'enregistrer
        $requestData = $request->all();
        $requestData['password'] = bcrypt($request->password);
        $requestData['points'] = 0; 
        $requestData['registration_date'] = now(); 

        User::create($requestData);

        return redirect()->route('user.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('register', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'nullable|confirmed|min:6', 
        ]);

        $user = User::findOrFail($id);
        
        if ($request->has('password')) {
            $request->merge(['password' => bcrypt($request->password)]);
        }

        $user->update($request->all());

        return redirect()->route('user.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('user.index')
                ->with('success', 'User deleted successfully.');
        }

        return redirect()->route('user.index')
            ->with('error', 'User not found.');
    }

    public function create()
    {
        return view('register');
    }

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('register', compact('user'));
    }
}
