<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    // Afficher le formulaire de création d'événement
    public function create()
    {
        $categories = Category::all();
        return view('events.create', ['categories' => $categories]);
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
            'category_id' => 'required|integer', 
            'available_seats' => 'required|integer|min:1',
            'reservation_type' => 'required|in:automatic,manual',
        ]);
        
        
        $user_id = Auth::id();

        $event = new Event([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'date' => $validatedData['date'],
            'location' => $validatedData['location'],
            'category_id' => $validatedData['category_id'], 
            'available_seats' => $validatedData['available_seats'],
            'user_id' => $user_id,
            'reservation_type' => $validatedData['reservation_type'],
        ]);

        $event->save();

        // Redirection avec un message de succès
        return redirect()->route('organisateur.dashboard')->with('success', 'Événement créé avec succès.');
    }

    // Afficher le formulaire de modification d'événement
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('events.edit', compact('event', 'categories'));
    }

    // Mettre à jour un événement
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string|max:255',
            'category_id' => 'required|string|max:255',
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
    $categories = Category::all();
    $events = Event::where('validated', 1)->paginate(10);
    return view('dashboard', compact('events','categories'));
}

public function search(Request $request)
{
    $search = $request->get('search');
    $categories = Category::all();
    $events = Event::where('title', 'like', '%' . $search . '%')
                    ->where('validated', 1)
                    ->get();

    return view('dashboard', compact('events', 'categories'));
}

public function eventsByCategory(Request $request, $categoryId)
{   
    $categories = Category::all();
    
    // Récupérer les événements de la catégorie spécifiée qui sont validés
    $events = Event::whereHas('category', function ($query) use ($categoryId) {
            $query->where('id', $categoryId);
        })
        ->where('validated', 1)
        ->paginate(10);

    // Vous pouvez également récupérer la catégorie pour affichage dans votre vue si nécessaire
    $category = Category::findOrFail($categoryId);

    return view('dashboard', compact('events', 'category', 'categories'));
}

public function showReservationForm($eventId)
{
    // Récupérer les détails de l'événement pour l'affichage sur la page de réservation
    $event = Event::findOrFail($eventId);

    // Charger la vue de la page de réservation avec les détails de l'événement
    return view('events.reserve', compact('event'));
}

}
