<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\AdminController;
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

// Routes accessibles sans authentification
Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard',  [EventController::class, 'dashboard'])->name('dashboard');
});

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Routes pour les organisateurs
    Route::prefix('organisateur')->group(function () {
        Route::get('/dashboard', [OrganisateurController::class, 'index'])->name('organisateur.dashboard');
    });


// Routes pour les événements
Route::prefix('events')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/', [EventController::class, 'store'])->name('events.store');
    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('/search', [EventController::class, 'search'])->name('search.events');
    Route::get('/category/{categoryId}', [EventController::class, 'eventsByCategory'])->name('events.category');

});

// Routes pour l'administration
Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');

    // Routes pour les catégories
    Route::prefix('categories')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin.categories.index');
        Route::get('/create', [AdminController::class, 'create'])->name('admin.categories.create');
        Route::post('/', [AdminController::class, 'store'])->name('admin.categories.store');
        Route::get('/{category}/edit', [AdminController::class, 'edit'])->name('admin.categories.edit');
        Route::put('/{category}', [AdminController::class, 'update'])->name('admin.categories.update');
        Route::delete('/{category}', [AdminController::class, 'destroy'])->name('admin.categories.destroy');
    });

    // Route pour gérer les utilisateurs
    Route::get('/users', [AdminController::class, 'manageUsers'])->name('admin.users.index');
});

// Auth routes
require __DIR__.'/auth.php';

