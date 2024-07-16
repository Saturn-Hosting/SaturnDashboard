<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);
Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function () {
    Route::get('/app', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/projects/create', function () {
        return view('projects.create');
    })->name('projects.create');

    Route::get('/projects/{slug}/show', function () {
        return view('projects.show');
    })->name('projects.show');
});
