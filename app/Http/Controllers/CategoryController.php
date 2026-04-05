<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Models\Asset;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all(); // Récupère toutes les catégories
        return view('categories',compact("categories"));
    }
    public function showAssets($id)
    {
        $category = Category::with('assets')->findOrFail($id); // Récupère la catégorie avec ses assets
        $assets = $category->assets; // Récupère les assets de la catégorie
        return view('category_assets', compact('category','assets'));
    }
    // Show the form to create a new category
    public function create()
    {
        return view('create_category');
    }

    // Store a new category in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories',
        ]);

        Category::create([
            'name'=> $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie ajoutée avec succès !');
    }
    // Show the form to edit an existing category
    public function edit(Category $category)
    {
        return view('edite_category', compact('category'));
    }

    // Update the category in the database
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|unique:categories,name,' . $category->id,
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return redirect()->route('categories.index')->with('success', 'Catégorie mise à jour avec succès !');
    }

    // Delete the category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Catégorie supprimée avec succès !');
    }
}
