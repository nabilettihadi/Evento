<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    // Réserver une place pour un événement
    public function reserve(Request $request, $eventId)
    {
        // Vérifier si l'utilisateur est connecté
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté pour réserver une place.');
        }

        // Vérifier si l'événement existe
        $event = Event::findOrFail($eventId);

        // Vérifier si des places sont disponibles
        if ($event->available_seats <= 0) {
            return redirect()->back()->with('error', 'Désolé, il n\'y a plus de places disponibles pour cet événement.');
        }

        // Vérifier si l'utilisateur a déjà réservé une place pour cet événement
        $userId = Auth::id();
        $existingReservation = Reservation::where('user_id', $userId)
                                           ->where('event_id', $eventId)
                                           ->first();

        if ($existingReservation) {
            return redirect()->back()->with('error', 'Vous avez déjà réservé une place pour cet événement.');
        }

        // Créer une nouvelle réservation
        $reservation = new Reservation();
        $reservation->user_id = $userId;
        $reservation->event_id = $eventId;
        $reservation->save();

        // Mettre à jour le nombre de places disponibles pour l'événement
        $event->available_seats--;
        $event->save();

        // Générer un ticket pour la réservation (vous devrez implémenter cette fonctionnalité)

        // Rediriger avec un message de succès
        return redirect()->back()->with('success', 'Votre réservation a été confirmée avec succès.');
    }
}
