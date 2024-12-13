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

        return view('register.index', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);
        User::created($request->all());
        return redirect()->route('register.index')
            ->with('success', 'User created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request -> validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'password' => 'required'
        ]);

        $user = User::find($id);
        $user->update($request->all());

        return redirect()->route('register.index')
            ->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('register.index')
            ->with('success', 'User deleted successfully.');
    }

    public function create()
    {
        return view('register.create');
    }

    public function edit(string $id)
    {
        $user = User::find($id);

        return view('register.edit', compact('user'));
    }
}
