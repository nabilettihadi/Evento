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
}
