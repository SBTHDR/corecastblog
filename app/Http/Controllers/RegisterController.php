<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function create()
    {
        return view('register.create');
    }

    public function store(Request $request)
    {
        $attributes = request()->validate([
            'username' => ['required', 'min:2', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required','min:6', 'max:255'],
        ]);

        User::create($attributes);

        return redirect('/')->with('success', 'Registration completed successfully!');
    }
}
