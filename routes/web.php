<?php

use App\Models\User;
use App\Models\Product;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthenticateController;

// Route::middleware([''])->group(function () {

// });


Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthenticateController::class, 'login'])->name('login');
    Route::get('/register', [AuthenticateController::class, 'register'])->name('register');

    Route::post('/login', [AuthenticateController::class, 'store'])->name('login');
});
