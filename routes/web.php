<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/games',[GameController::class, 'index'])->name('games.index');
Route::get('/games/create',[GameController::class, 'create'])->name('games.create');
Route::get('/games/{game}/edit', [GameController::class, 'edit'])->name('games.edit');
Route::delete('/games/{game}',[GameController::class, 'destroy'])->name('games.destroy');
Route::get('/games/{game}',[GameController::class, 'show'])->name('games.show');
Route::post('/games',[GameController::class, 'store'])->name('games.store');
Route::patch('/games/{game}', [GameController::class, 'update'])->name('games.update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::get('/games/create', [GameController::class, 'create'])->name('games.create');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
