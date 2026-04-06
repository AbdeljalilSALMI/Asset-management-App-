<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Department;
use App\Models\Employee; 
use App\Models\Category; 

class DepartmentsController extends Controller
{
        public function index()
    {
        $departments = Department::all(); 
        return view('departments', compact('departments'));
    }   
    public function showEmployees($id)
    {
        $department = Department::with('employees')->findOrFail($id); 
        $employees = $department->employees;
        return view('department_employees', compact('department','employees'));
    }
    
    public function create()
    {
        return view('create_department');
    }

   
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
    
    public function edit(Department $department)
    {
        return view('edite_department', compact('department'));
    }

    
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
