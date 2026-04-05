<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\Assignment;
use App\Models\Department;
use App\Models\Employee;
use App\Models\Asset;

use App\Models\User;

use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        $employees = Employee::with('department')->get(); // Récupère chaque employee avec son departement
        return view('employees', compact('employees'));
    }

    public function create()
    {
        $departments= Department::all();
        return view('create_employee', compact('departments'));
    }

public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'function' => 'required',
        'department_id' => 'required',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6',
    ]);

    //  Create new User 
    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'employee', 
    ]);

    // Create Employee and link user_id
    Employee::create([
        'name' => $request->name,
        'function' => $request->function,
        'department_id' => $request->department_id,
        'user_id' => $user->id,
    ]);

    return redirect()->route('employees.index')->with('success', 'Employé ajouté avec succès !');
}

    public function edit(Employee $employee)
    {
        $departments=Department::all();
        return view('edite_employee', compact('employee', 'departments'));
    }

   public function update(Request $request, Employee $employee)
{
    $request->validate([
        'name' => 'required',
        'function' => 'required',
        'department_id' => 'required',
        'email' => 'required|email|unique:users,email,' . $employee->user_id,
        'password' => 'nullable|min:6',
    ]);

    // update user
    $user = $employee->user;
    $user->name = $request->name;
    $user->email = $request->email;
    if ($request->filled('password')) {
        $user->password = Hash::make($request->password);
    }
    $user->save();

    // update employee
    $employee->update([
        'name' => $request->name,
        'function' => $request->function,
        'department_id' => $request->department_id,
    ]);

    return redirect()->route('employees.index')->with('success', 'Employé mis à jour !');
}

    // Show assign form
    public function assignForm($id)
    {
        $employee = Employee::findOrFail($id);
        $assets = Asset::where('status', 'available')->get(); // only available assets
        // Assets already assigned to this employee (through assignments table)
        $assignedAssets = Assignment::where('employee_id', $employee->id)
                                ->with('asset') // eager load asset
                                ->get();
        return view('assign_asset', compact('employee', 'assets','assignedAssets'));
    }

    //  Handle assignment
    public function assignAsset(Request $request, $id)
    {
        $request->validate([
            'asset_id' => 'required|exists:assets,id',
        ]);

        $employee = Employee::findOrFail($id);
        $asset = Asset::findOrFail($request->asset_id);
        Assignment::Create([
          'asset_id'=>$request->asset_id, 
          'employee_id'=>$employee->id,
           'assigned_date'=>now(),
        ]);
        

        // assign asset to employee
        $asset->status = 'assigned';
        $asset->save();

        return redirect()->route('employees.index')->with('success', 'Asset assigné avec succès !');
    }
    
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'employee supprimé !');
    }
}
