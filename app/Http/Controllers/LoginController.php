<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

    public function create()
    {
        return view('login.create');
    }

    public function store()
    {
        $attributes = \request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if (auth()->attempt($attributes)) {
            session()->regenerate();
            return redirect('/dashboard')->with('success', 'Welcome back!');
        }

        throw ValidationException::withMessages([
            'error' => 'Your provided credentials could not been verified.'
        ]);

    }

    public function destroy(Request $request)
    {
        auth()->logout();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
