<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee; // Assurez-vous d'importer le modèle Category
use App\Models\Category; // Assurez-vous d'importer le modèle Category

class DepartmentsController extends Controller
{
        public function index()
    {
        $departments = Department::all(); // Récupère tous les départements
        return view('departments', compact('departments'));
    }   
    public function showEmployees($id)
    {
        $department = Department::with('employees')->findOrFail($id); // Récupère le departement avec ses assets
        $employees = $department->employees; // Récupère les emploiyees du departement
        return view('department_employees', compact('department','employees'));
    }
    // Show the form to create a new department
    public function create()
    {
        return view('create_department');
    }

    // Store a new department in the database
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:departments',
        ]);

        Category::create([
            'name'=> $request->name,
        ]);

        return redirect()->route('departments.index')->with('success', 'department ajoutée avec succès !');
    }
    // Show the form to edit an existing departments
    public function edit(Department $department)
    {
        return view('edite_department', compact('department'));
    }

    // Update the category in the database
    public function update(Request $request,Department $department)
    {
        $request->validate([
            'name' => 'required|unique:departments,name,' . $department->id,
        ]);

        $department->update([
            'name' => $request->name,
        ]);

        return redirect()->route('departments.index')->with('success', 'departement mise à jour avec succès !');
    }
    public function destroy(Department $department)
    {
        $department->delete();
        return redirect()->route('departments.index')->with('success', 'departement supprimée avec succès !');
    }
}
