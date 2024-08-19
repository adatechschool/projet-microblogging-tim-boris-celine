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
    return redirect('/dashboard');
});

Route::get('/welcome', function (){
    return view('welcome');
})->name('welcome');

Route::get('/dashboard', [PostController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/wall', function () {
    return view('wall');
})->middleware(['auth', 'verified'])->name('wall');


/* Ajout de la route qui permet d'afficher le mur des users */

Route::get('/wall/{id}', [PostController::class, 'wall'])->middleware(['auth', 'verified'])->name('wall');

Route::get('/posts/{id}', [PostController::class, 'show'])->middleware(['auth', 'verified'])->name('posts');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update'); // Ajout de la route pour la modification du profil
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
