<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;

class UserController extends Controller
{
    public function create()
    {
        return view('auth.show');
    }
}
