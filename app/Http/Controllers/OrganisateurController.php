<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;
use Illuminate\Support\Facades\Auth;
class OrganisateurController extends Controller
{

public function index()
{
    // Récupérer l'utilisateur connecté
    $user = Auth::user();

    // Récupérer les événements de l'organisateur
    $evenements = $user->events;

    // Passer les événements à la vue
    return view('organisateur.dashboard', compact('evenements'));
}

public function statistiquesReservations()
{
    // Récupérer l'organisateur actuellement authentifié
    $organizer = Auth::user();

    // Récupérer tous les événements de l'organisateur
    $events = $organizer->events;

    // Initialiser les compteurs de réservations
    $totalReservations = 0;
    $acceptedReservations = 0;
    $pendingReservations = 0;

    // Calculer les statistiques des réservations pour chaque événement
    foreach ($events as $event) {
        $totalReservations += $event->reservations->count();
        $acceptedReservations += $event->reservations()->where('status', 'accepted')->count();
        $pendingReservations += $event->reservations()->where('status', 'pending')->count();
    }

    // Passer les statistiques à la vue
    return view('organisateur.statistiques_reservations', compact('totalReservations', 'acceptedReservations', 'pendingReservations'));
}

}
