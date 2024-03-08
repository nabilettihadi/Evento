<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function reserve(Request $request, $eventId)
    {
        // Valider la requête
        $request->validate([
            'user_id' => 'required', // Ajoutez les autres règles de validation si nécessaire
        ]);

        // Créer la réservation
        $reservation = new Reservation();
        $reservation->user_id = $request->user_id;
        $reservation->event_id = $eventId;
        $reservation->status = 'pending'; // Statut initial : en attente de validation par l'organisateur
        $reservation->ticket = null; // Le ticket sera généré une fois la réservation confirmée
        // Enregistrer la réservation
        $reservation->save();

        // Rediriger l'utilisateur vers une page de confirmation ou une autre action
        return redirect()->back()->with('success', 'Votre réservation a été enregistrée avec succès.');
    }

    public function generateTicket($reservationId)
    {
        // Trouver la réservation
        $reservation = Reservation::findOrFail($reservationId);

        // Générer le ticket (vous devez implémenter cette fonctionnalité en fonction de vos besoins)

        // Mettre à jour le statut de la réservation une fois le ticket généré
        $reservation->status = 'confirmed';
        $reservation->ticket = 'XXXXXXXXX'; // Exemple de numéro de ticket généré

        // Enregistrer les modifications
        $reservation->save();

        // Rediriger l'utilisateur vers une page où il peut télécharger ou visualiser son ticket
        return redirect()->route('ticket.download', $reservation->id)->with('success', 'Votre ticket a été généré avec succès.');
    }
}
