<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request) {
        // Validate user input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('/dashboard'); // Redirect to the intended URL or a default dashboard
        }

        // Authentication failed
        return back()->withErrors(['email' => 'Email dan Password tidak sah'])->withInput();
    }
}
