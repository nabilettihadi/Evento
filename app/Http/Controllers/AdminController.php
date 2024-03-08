<?php

namespace App\Http\Controllers;
use App\Models\Event;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
{
    $totalUsers = User::where('role', 'utilisateur')->count();
    $totalOrganisateurs = User::where('role', 'organisateur')->count();
    $totalEvents = Event::count();
    $totalCategories = Category::count();

    return view('admin.dashboard', compact('totalUsers', 'totalOrganisateurs', 'totalEvents', 'totalCategories'));
}


    // Afficher la liste des catégories et le formulaire d'ajout/modification
    public function index()
    {
        $categories = Category::all();
        $category = null; // Définir $category à null
        return view('admin.categories.index', compact('categories', 'category'));
    }

    // Afficher le formulaire de création d'une nouvelle catégorie
    public function create()
    {
        return view('admin.categories.create');
    }

    // Enregistrer une nouvelle catégorie
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        Category::create($request->only('name'));
        return redirect()->route('admin.categories.index')->with('success', 'La catégorie a été créée avec succès.');
    }

    // Afficher le formulaire de modification d'une catégorie
    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.categories.edit', compact('categories', 'category'));
    }

    // Mettre à jour une catégorie existante
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);

        $category->update($request->only('name'));
        return redirect()->route('admin.categories.index')->with('success', 'La catégorie a été mise à jour avec succès.');
    }

    // Supprimer une catégorie
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'La catégorie a été supprimée avec succès.');
    }
}
