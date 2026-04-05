<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Asset;
use App\Models\Employee;
use App\Models\Category;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'totalAssets' => Asset::count(),
            'availableAssets' => Asset::where('status', 'available')->count(),
            'assignedAssets' => Asset::where('status', 'assigned')->count(),
            'maintenanceAssets' => Asset::where('status', 'maintenance')->count(),
            'totalEmployees' => Employee::count(),
            'totalCategories' => Category::count(),
        ]);
    }
}
