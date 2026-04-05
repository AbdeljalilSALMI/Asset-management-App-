<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuppliersController extends Controller
{
     public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers', compact('suppliers'));
    }

    public function create()
    {
        
        return view('create_supplier');
    }

    public function store(Request $request)
    {
    $request->validate([
        'company_name'  => 'required|string|max:255',
        'phone' => 'nullable|string|max:20',
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    // 1. Create the User first
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'supplier', // 👈 better than 'employee'
    ]);

    // 2. Create Supplier and link it with user_id
    Supplier::create([
        'company_name' => $request->company_name,
        'phone' => $request->phone,
        'user_id' => $user->id,
    ]);

    return redirect()->route('suppliers.index')
        ->with('success', 'Supplier ajouté avec succès !');
    }

    public function edit(Supplier $supplier)
    {
        return view('edite_supplier', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'company_name'  => 'required|string|max:255',
            //'email' => 'required|email|unique:suppliers,email,' . $supplier->id,
            'phone' => 'nullable|string|max:20',
            'email' => 'required|email|unique:users,email,' . $supplier->user_id,
        'password' => 'nullable|min:6',
        ]);
    $user = $supplier->user;
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }
    $user->save();
        $supplier->update($request->all());

        return redirect()->route('suppliers.index')->with('success', 'Supplier mis à jour !');
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();
        return redirect()->route('suppliers.index')->with('success', 'Supplier supprimé !');
    }
}
