<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Employee;
use App\Models\Supplier;
use App\Models\Department;

class AuthManager extends Controller
{

   

public function showRegistrationForm()
{
    $departments = Department::all(); // get all departments
    return view('registration', compact('departments'));
}

    /**
     * Handle Login
     */
    public function loginPost(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome Admin!');
            } elseif ($user->role === 'employee') {
                return redirect()->route('employee.dashboard')->with('success', 'Welcome Employee!');
            } elseif ($user->role === 'supplier') {
                return redirect()->route('supplierhandle.index')->with('success', 'Welcome Supplier!');
            }

            return redirect()->route('dashboard')->with('success', 'Login successful');
        }

        return redirect()->route('login')->with('error', 'Invalid credentials');
    }

    /**
     * Handle Registration
     */
    public function registrationPost(Request $request)
    {
        $request->validate([
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6',
        'role' => 'required|in:admin,employee,supplier',
    ]);

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => bcrypt($request->password),
        'role' => $request->role,
    ]);

    if ($request->role === 'employee') {
        Employee::create([
            'user_id' => $user->id,
            'name' => $request->name,
            'function' => $request->function,
            'department_id' => $request->department_id,
        ]);
    } elseif ($request->role === 'supplier') {
        Supplier::create([
            'user_id' => $user->id,
            'company_name' => $request->name,
            'phone' => $request->phone,
        ]);
    }

        if ($user) {
            return redirect()->route('login')->with('success', 'Account created successfully');
        }

        return back()->with('error', 'Something went wrong, please try again');
    }

    /**
     * Handle Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
