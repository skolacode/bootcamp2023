<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login(Request $request) {
        // Validate user input
        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        // Attempt to log in the user
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            return redirect()->intended('/dashboard'); // Redirect to the intended URL or a default dashboard
        }

        // Authentication failed
        return back()->withErrors(['username' => 'username dan Password tidak sah'])->withInput();
    }


    public function register(Request $request)
    {
        $request->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4', 'confirmed'],
        ]);

        // Handle registration logic
        User::create([
            'username' => $request->username,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration successful. You can now log in.');
    }
}
