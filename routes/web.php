<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/wall', function () {
    return view('wall');
})->middleware(['auth', 'verified'])->name('wall');

/* Ajout de la route qui permet d'afficher les posts sur le wall */

Route::get('/wall', [PostController::class, 'wall'])->name('wall');

/* Ajout de la route qui permet d'afficher le mur des users */

Route::get('/user/{id}', [PostController::class, 'wallall'])->middleware(['auth', 'verified']);

Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
