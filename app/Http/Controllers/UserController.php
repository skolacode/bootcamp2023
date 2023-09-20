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
            return redirect()->intended('/');
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

    public function user() {
        $user = Auth::user();

        return view('profile', [ 'username' => $user->username ]);
    }

    public function uploadAvatar(Request $request) {

         // Validate the uploaded file
        $request->validate([
            'avatar' => ['required','image'],
        ]);

        // Generate a unique filename for the image
        $filename = Auth::user()->username. '.jpg';

        // Store the uploaded file in the public/images folder
        $request->file('avatar')->storeAs('public/avatar', $filename);

        return redirect('/');
    }
}
