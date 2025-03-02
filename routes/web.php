<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdController;

// Login y Logout
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');//Muestra el login
Route::post('/login', [AuthController::class, 'login']);//Gestiona el login
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');//Cierra la sesion

// Registro de usuario
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');//Muestra el formulario de registro
Route::post('/register', [AuthController::class, 'register']);//Gestiona el registro

// Página de inicio (Protegida)
Route::get('/home', function () {//Pasa el usuario validando el inicio
    return view('index', ['user' => Auth::user()]);
})->name('home')->middleware('auth');//Se comprueba el usuario para que solo dichos usuario puedan acceder al inicio

// Grupo de rutas para anuncios protegidos
Route::middleware('auth')->group(function () {
    Route::get('/my-ads', [AdController::class, 'index'])->name('my-ads');
    Route::get('/new', [AdController::class, 'create'])->name('new-ad');
    Route::post('/new', [AdController::class, 'store'])->name('new-ad.store');
    Route::get('/edit-ad/{id}', [AdController::class, 'edit'])->name('edit-ad');
    Route::put('/update-ad/{id}', [AdController::class, 'update'])->name('update-ad');
    Route::delete('/delete-ad/{id}', [AdController::class, 'destroy'])->name('delete-ad');
});
