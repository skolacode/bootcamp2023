<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware('guest')->group(function () {

    Route::get('/login', function () {
        return view('login');
    })->name('login');

    Route::get('/register', function () {
        return view('register');
    })->name('register');

    Route::post('/login', [UserController::class, 'login'])->name('auth-login');
    Route::post('/register', [UserController::class, 'register'])->name('auth-register');
});


Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        return view('app');
    })->name('home');

    Route::get('/profile', [UserController::class, 'user'])->name('user');

    Route::post('/upload', [UserController::class, 'uploadAvatar'])->name('upload-avatar');

    Route::get('/logout', function() {
        Auth::logout();
        return redirect('/login');
    })->name('logout');

});