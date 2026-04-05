<?php

namespace App\Http\Controllers;
use App\Models\Report;
use App\Models\Asset;
use App\Models\Maintenance;
use Illuminate\Http\Request;


class ReportsHandleController extends Controller
{
    // Show all reports to the admin
    public function index()
    {
        $reports = Report::with(['asset', 'employee'])->get();
        return view('handleReports', compact('reports'));
    }

    // Accept report → send asset to maintenance
    public function accept($id)
    {
        $report = Report::findOrFail($id);
        $asset = $report->asset;

        // Update asset status
        $asset->status = 'maintenance';
        $asset->save();

        // Add a new maintenance record
        Maintenance::create([
            'asset_id'     => $asset->id,
            'technician_id'=> null, // later assign
            'date'         => now(),
            'description'  => 'Maintenance from report #'.$report->id.': '.$report->description,
            'cost'         => 0,
        ]);

        // Mark report as accepted
        $report->status = 'assigned';
        $report->save();

        return redirect()->route('reports.index')
                         ->with('success', 'Report accepted and asset added to maintenance.');
    }

    // Refuse report
    public function refuse($id)
    {
        $report = Report::findOrFail($id);
        $report->status = 'refused';
        $report->save();

        return redirect()->route('reports.index')
                         ->with('info', 'Report refused.');
    }
}
