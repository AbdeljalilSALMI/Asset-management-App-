<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Models\Asset;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories',compact("categories"));
    }
    public function showAssets($id)
    {
        $category = Category::with('assets')->findOrFail($id); 
        $assets = $category->assets; 
        return view('category_assets', compact('category','assets'));
    }
    
    public function create()
    {
        return view('create_category');
    }

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
