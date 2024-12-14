<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class UserController extends Controller
{

    public function home()
    {
        return view('home');
    }

    /**
     * Display the logged-in user's profile.
     */
    public function profile()
    {
        $user = Auth::user();
        return view('users.profile', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $this->validateUser($request);
        
        $validatedData['password'] = bcrypt($validatedData['password']);

        User::create($validatedData);

        return redirect()->route('user.profile')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        
        $validatedData = $this->validateUser($request, $id);

        if ($request->has('password')) {
            $validatedData['password'] = bcrypt($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('user.profile')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('login')
            ->with('success', 'User deleted successfully.');
    }

    /**
     * Validate user input.
     */
    private function validateUser(Request $request, $userId = null)
    {
        $rules = [
            'name' => 'required|max:255',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($userId),
            ],
            'password' => 'required|confirmed|min:6',
        ];

        $messages = [
            'name.required' => 'Le champ nom est obligatoire.',
            'email.required' => 'Le champ email est obligatoire.',
            'email.email' => 'L\'adresse email doit être valide.',
            'password.required' => 'Le mot de passe est obligatoire.',
            'password.confirmed' => 'Les mots de passe ne correspondent pas.'
        ];

        return $request->validate($rules, $messages);
    }
}
