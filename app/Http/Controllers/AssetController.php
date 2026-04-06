<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Asset; 
use App\Models\Category;
use App\Models\Maintenance; 

class AssetController extends Controller
{
      public function index()
    {
        $assets = Asset::with('category')->get(); 
        return view('assets', compact('assets'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create_asset', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'serial_number' => 'required|unique:assets',
            'category_id' => 'required',
        ]);

        Asset::create($request->all());

        return redirect()->route('assets.index')->with('success', 'Asset ajouté avec succès !');
    }

    public function edit(Asset $asset)
    {
        $categories = Category::all();
        return view('edite_asset', compact('asset', 'categories'));
    }

    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'name' => 'required',
            'serial_number' => 'required|unique:assets,serial_number,' . $asset->id,
            'category_id' => 'required',
        ]);

        $asset->update($request->all());

        
    if ($request->status === 'maintenance') {
        Maintenance::create([
            'asset_id' => $asset->id,
            'date' => now(),
            'technician_id' => $request->technician_id ?? null, 
            'description' => $request->description ?? 'Maintenance scheduled',
            'cost' => $request->cost ?? 0
        ]);
    }

        return redirect()->route('assets.index')->with('success', 'Asset mis à jour !');
    }

    public function destroy(Asset $asset)
    {
        $asset->delete();
        return redirect()->route('assets.index')->with('success', 'Asset supprimé !');
    }
}
