<?php

use App\Http\Controllers\FarmsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserCotroller;
use App\Http\Controllers\AnimalsController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\MovementController;
use App\Enums\Transaction;
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
    Route::post('tags/assign', [TagController::class, 'assign'])->name('tags.assign');
    Route::resource('users', UserCotroller::class);
});
 Route::get('/getFarmAnimalType/{id}', [FarmsController::class,'getFarmAnimalType'])->name('farm.animalTypes');
Route::middleware('auth')->group(function () {
    Route::resource('farms', FarmsController::class);
});
Route::get('tags/assign', [TagController::class, 'assign'])->name('tags.assign');
Route::middleware('auth')->group(function () {
    Route::resource('tags', TagController::class);
});

Route::middleware('auth')->group(function () {
    Route::get('/getBreeds/{id}',[AnimalsController::class,'getBreedsAndRFID'])->name('animals.getBreeds');
    Route::resource('animals', AnimalsController::class);
});
Route::middleware('auth')->group(function () {
    //Route::get('/animals/{animal}/movements',[MovementController::class,'create'])->name('animals.movements.create');
    Route::get('/movements/{animal}/create', [MovementController::class, 'create'])->name('animal.movements.create');
    Route::get('/movements/{transaction}', [MovementController::class, 'creation'])->name('movement.create');
    Route::resource('movements', MovementController::class);
});
Route::middleware('auth')->group(function () {
    Route::get('/animals/{id}/vaccins',[MovementController::class,'index'])->name('animals.vaccins.index');
    Route::resource('animals.vaccins', MovementController::class);
});
