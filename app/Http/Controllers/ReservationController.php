<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Dompdf\Dompdf;
use Dompdf\Options;

class ReservationController extends Controller
{
    public function reserve(Request $request, $eventId)
    {
        // Valider la requête
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Récupérer l'utilisateur authentifié
        $user = Auth::user();

        // Récupérer l'événement
        $event = Event::findOrFail($eventId);

        // Vérifier si le nombre de places disponibles est suffisant
        if ($event->available_seats < $request->quantity) {
            return redirect()->back()->with('error', 'Le nombre de places demandées dépasse le nombre de places disponibles.');
        }

        // Créer les réservations
        for ($i = 0; $i < $request->quantity; $i++) {
            $reservation = new Reservation();
            $reservation->user_id = $user->id;
            $reservation->event_id = $eventId;
            $reservation->status = $event->reservation_type === 'automatic' ? 'accepted' : 'pending';
            $reservation->save();
        }

        // Mettre à jour le nombre de places disponibles
        $event->available_seats -= $request->quantity;
        $event->save();

        // Rediriger l'utilisateur vers une page de confirmation
        return redirect()->back()->with('success', 'Votre réservation a été enregistrée avec succès.');
    }


    public function generateTicket($reservationId)
    {
        // Trouver la réservation
        $reservation = Reservation::findOrFail($reservationId);

        // Créer une nouvelle instance Dompdf avec des options par défaut
        $dompdf = new Dompdf();

        // Optionnel : configurez les options du PDF (par exemple, taille du papier, orientation, etc.)
        $options = new Options();
        $options->set('defaultFont', 'Helvetica');
        // $options->set('isPhpEnabled', true); // Si vous avez besoin d'exécuter du code PHP dans votre vue PDF
        $dompdf->setOptions($options);

        // Récupérez le contenu de la vue pour le PDF
        $pdfContent = view('reservation.ticket', compact('reservation'))->render();

        // Chargez le contenu HTML dans Dompdf
        $dompdf->loadHtml($pdfContent);

        // Rendre le PDF
        $dompdf->render();

        // Générez le nom de fichier du PDF
        $fileName = 'ticket_' . $reservationId . '.pdf';

        // Enregistrer le PDF sur le serveur
        $dompdf->stream($fileName);
    }
    public function acceptReservation($reservationId)
{
    // Trouver la réservation par son ID
    $reservation = Reservation::findOrFail($reservationId);

    // Modifier le statut de la réservation en "accepted"
    $reservation->status = 'accepted';
    $reservation->save();

    // Redirection avec un message de succès
    return redirect()->back()->with('success', 'La réservation a été acceptée avec succès.');
}

public function showTicket($reservationId)
{
    // Trouver la réservation par son ID
    $reservation = Reservation::findOrFail($reservationId);

    // Vérifier si l'utilisateur connecté est le propriétaire de la réservation
    if ($reservation->user_id !== auth()->id()) {
        return redirect()->back()->with('error', 'Vous n\'êtes pas autorisé à accéder à ce ticket.');
    }

    // Vérifier si la réservation est confirmée
    if ($reservation->status !== 'accepted') {
        return redirect()->back()->with('error', 'Ce ticket n\'est pas encore confirmé.');
    }

    // Afficher le ticket de réservation
    return view('reservations.ticket', compact('reservation'));
}

    // public function showEventReservations($eventId)
    // {
    //     // Récupérer l'événement
    //     $event = Event::findOrFail($eventId);

    //     // Vérifier si l'utilisateur est autorisé à voir les réservations de cet événement (par exemple, vérifier s'il est l'organisateur)
    //     if (Auth::user()->id !== $event->user_id) {
    //         return redirect()->route('home')->with('error', 'Vous n\'êtes pas autorisé à voir ces réservations.');
    //     }

    //     // Récupérer les réservations liées à cet événement
    //     $reservations = $event->reservations;

    //     return view('reservations.event_reservations', compact('event', 'reservations'));
    // }
    public function reservationsOfOrganizer()
{
    // Récupérer l'ID de l'organisateur connecté
    $organizerId = Auth::id();

    // Récupérer tous les événements créés par l'organisateur connecté
    $events = Event::where('user_id', $organizerId)->get();

    // Initialiser un tableau pour stocker toutes les réservations
    $reservations = [];

    // Parcourir chaque événement et récupérer ses réservations
    foreach ($events as $event) {
        // Récupérer les réservations liées à cet événement
        $eventReservations = $event->reservations()->where('status', 'pending')->get();

        // Ajouter les réservations au tableau des réservations
        foreach ($eventReservations as $reservation) {
            $reservations[] = [
                'id' => $reservation->id,
                'event_title' => $event->title,
                'event_date' => $event->date,
                'event_location' => $event->location,
                'user_name' => $reservation->user->name,
                'status' => $reservation->status,
            ];
        }
    }

    // Retourner les réservations
    return view('reservations.event_reservations', compact('reservations'));
}
}
