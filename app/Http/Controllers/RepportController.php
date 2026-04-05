<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Report;
use App\Models\Employee;
use Illuminate\Http\Request;

class RepportController extends Controller
{
        public function index()
    {
        $employee = auth()->user()->employee;

        // Load assets assigned to this employee (assuming relation exists in Employee model)
        $assets = Asset::whereHas('assignments', function ($query) use ($employee) {
            $query->where('employee_id', $employee->id);
        })->get();

        return view('employee_assets', compact('assets'));
    }
    public function create(Asset $asset)
    {
        return view('employee_report', compact('asset'));
    }

    public function store(Request $request, Asset $asset)
    {
        $request->validate([
            'description' => 'required|string|max:1000',
        ]);

        Report::create([
            'asset_id' => $asset->id,
            'employee_id' => auth()->user()->employee->id,
            'description' => $request->description,
        ]);

        return redirect()->route('employee.dashboard')->with('success', 'Issue reported successfully!');
    }
    public function report(){
     $employee = auth()->user()->employee;
     //$employee = Employee::findOrFail($id);
     $reports = Report::where('employee_id', $employee->id)
                        ->with('asset') // eager load asset
                        ->get();
    return view('employee_report_hstry', compact('reports'));
    }
}