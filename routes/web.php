<?php

use App\Http\Controllers\FarmsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCotroller;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\TagController;

Route::get('/', function () {
    return view('auth.login');
});

// Route::get('/dashboard', function () {// return view('dashboard');// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


require __DIR__ . '/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::middleware(['auth','role:admin'])->group(function () {
    Route::resource('users', UserCotroller::class);
    Route::post('tags/assign', [TagController::class, 'assign'])->name('tags.assign');
});
Route::middleware('auth')->group(function () {
    Route::resource('farms', FarmsController::class);
});
Route::middleware('auth')->group(function () {
    Route::resource('tags', TagController::class);
});

Route::middleware('auth')->group(function () {
    Route::resource('animals', AnimalsController::class);
});
