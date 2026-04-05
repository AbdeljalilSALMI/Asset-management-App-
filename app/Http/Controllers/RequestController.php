<?php

namespace App\Http\Controllers;
use App\Models\Request as AssetRequest;
use App\Models\Supplier;
use App\Models\Category;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public function index()
    {
        $requests = AssetRequest::with( 'supplier','category')->get();
        return view('requests', compact('requests'));
    }
    public function create(Supplier $supplier)
    {
        $categories = Category::all();
        return view('create_request', compact('supplier','categories'));
    }

    public function store(Request $request, Supplier $supplier)
    {
        $request->validate([
            'asset_name' => 'required|string|max:255',
            'category_id' => 'required',
        ]);

        // Generate random serial number
        $serial = strtoupper(bin2hex(random_bytes(4))); // Example: 9F2A3C1B

        AssetRequest::create([
            'supplier_id' => $supplier->id,
            'asset_name' => $request->asset_name,
            'category_id' => $request->category_id,
            'serial_number' => $serial,
        ]);

        return redirect()->route('suppliers.index')->with('success', 'Demande envoyée au fournisseur !');
    }
    public function destroy(AssetRequest $request)
    {
        $request->delete();
        return redirect()->route('requests.index')->with('success', 'Demande supprimée avec succès !');
    }
/*
    // For supplier side
    public function index()
    {
        $requests = AssetRequest::where('supplier_id', auth()->id())->get(); 
        return view('requests.index', compact('requests'));
    }

    public function updateStatus(AssetRequest $request, $status)
    {
        $request->update(['status' => $status]);
        return back()->with('success', "Demande $status !");
    }
*/
}
