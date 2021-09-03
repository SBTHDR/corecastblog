<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class SessionsController extends Controller
{
    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        $attributes = request()->validate([
           'email' => ['required', 'email'],
           'password' => ['required'],
        ]);

        if (! auth()->attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Provided credentials verification failed!'
            ]);
        }

        session()->regenerate();

        return redirect('/')->with('success', 'Successfully login!');
    }

    public function destroy()
    {
        auth()->logout();

        return redirect('/')->with('success', 'Comeback Soon!');
    }
}
