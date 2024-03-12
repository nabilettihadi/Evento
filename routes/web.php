<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrganisateurController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReservationController;
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


// Routes pour l'authentification
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');

    // Reste des routes pour le profil et les organisateurs...
});

// Routes pour les organisateurs
Route::prefix('organisateur')->group(function () {
    Route::get('/dashboard', [OrganisateurController::class, 'index'])->name('organisateur.dashboard');
});
Route::get('/organisateur/statistiques-reservations', [OrganisateurController::class, 'statistiquesReservations'])->name('organisateur.statistiques');

// Routes pour les événements
Route::prefix('events')->middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [EventController::class, 'dashboard'])->name('dashboard');
    Route::get('/create', [EventController::class, 'create'])->name('events.create');
    Route::post('/', [EventController::class, 'store'])->name('events.store');
    Route::get('/{id}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('/{id}', [EventController::class, 'update'])->name('events.update');
    Route::delete('/{event}', [EventController::class, 'destroy'])->name('events.destroy');
    Route::get('/{event}', [EventController::class, 'show'])->name('events.show');
    
    Route::get('/reserve/{eventId}', [EventController::class, 'showReservationForm'])->name('events.reserve.form');
});

Route::post('reservations/{reservationId}/accept', [ReservationController::class, 'acceptReservation'])
    ->name('reservations.accept');
    Route::get('reservations/event', [ReservationController::class, 'reservationsOfOrganizer'])
    ->name('reservations.event');

Route::get('/reservations/{reservationId}/ticket', [ReservationController::class, 'showTicket'])->name('reservations.ticket');

Route::post('events/{event}/reserve', [ReservationController::class, 'reserve'])->name('events.reserve');
Route::get('/search', [EventController::class, 'search'])->name('search.events');
Route::get('/category/{categoryId}', [EventController::class, 'eventsByCategory'])->name('events.category');
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

});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'usersIndex'])->name('admin.users.index');
});
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/events', [AdminController::class, 'pendingEvents'])->name('admin.events.pending');
    Route::put('/admin/events/{id}/approve', [AdminController::class, 'approveEvent'])->name('admin.events.approve');
    Route::put('/admin/events/{id}/reject', [AdminController::class, 'rejectEvent'])->name('admin.events.reject');
});

Route::middleware('auth')->group(function () {
    Route::post('suspend-user/{userId}', [AdminController::class, 'suspendUser'])->name('suspendUser');
    Route::post('/admin/users/unsuspend/{userId}', [AdminController::class, 'unsuspendUser'])->name('unsuspendUser');
});
// Auth routes
require __DIR__.'/auth.php';

