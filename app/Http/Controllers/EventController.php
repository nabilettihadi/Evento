<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Afficher le formulaire de création d'événement
    public function create()
    {
        return view('events.create');
    }

    // Enregistrer un nouvel événement
    public function store(Request $request)
    {
        // Validation des données
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'available_seats' => 'required|integer|min:1',
        ]);

        // Récupérer l'ID de l'utilisateur connecté
        $user_id = Auth::id();

        // Créer un nouvel événement avec l'ID de l'utilisateur
        $event = new Event($validatedData);
        $event->user_id = $user_id;
        $event->save();

        // Redirection avec un message de succès
        return redirect()->route('organisateur.dashboard')->with('success', 'Événement créé avec succès.');
    }

    // Afficher le formulaire de modification d'événement
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        return view('events.edit', compact('event'));
    }

    // Mettre à jour un événement
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'available_seats' => 'required|integer|min:1',
        ]);

        $event = Event::findOrFail($id);
        $event->update($validatedData);

        return redirect()->route('organisateur.dashboard')->with('success', 'Événement mis à jour avec succès.');
    }

    // Supprimer un événement
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('organisateur.dashboard')->with('success', 'Événement supprimé avec succès.');
    }

    // Afficher les événements de l'utilisateur connecté
    public function mesEvenements()
    {
        // Récupérer l'utilisateur connecté
        $user = Auth::user();

        // Récupérer les événements de l'organisateur
        $evenements = $user->events;

        return view('organisateur.dashboard', compact('evenements'));
    }

    // Afficher les détails d'un événement
    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }

public function dashboard()
{
    $events = Event::paginate(10);
    return view('dashboard', compact('events'));
}

public function search(Request $request)
{
    $search = $request->get('search');

    $events = Event::where('title', 'like', '%' . $search . '%')->get();

    return view('dashboard', compact('events'));
}

}

