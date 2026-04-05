<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Technician;

class MaintenanceController extends Controller
{
    public function index(){
         $Maintenance = Maintenance::with('technician')->get();
         return view('OnMaintenance',compact('Maintenance'));
    }

    public function edit(Maintenance $Maintenance)
    {
        $technicians = Technician::all();
        return view('edite_maintenance', compact('Maintenance', 'technicians'));
    }

    public function update(Request $request, Maintenance $Maintenance)
    {
        $request->validate([
            'technician_id' => 'required',
            'description' => 'required',
            'cost' => 'required|numeric',
        ]);

        $Maintenance->update($request->all());

        return redirect()->route('maintenance.index')->with('success', 'Maintenance record updated successfully!');
    }

    public function destroy(Maintenance $Maintenance)
    {
        $Maintenance->delete();
        return redirect()->route('maintenance.index')->with('success', 'Maintenance record deleted successfully!');
    }
}
