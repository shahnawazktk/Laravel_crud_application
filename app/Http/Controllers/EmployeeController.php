<?php

namespace App\Http\Controllers;

use App\Models\Employee; // Correcting the model name to Employee
use Illuminate\Http\Request;

class EmployeeController extends Controller // Correcting the class name to EmployeeController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees = Employee::all(); // Get all employees
        return view('employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employees.create'); // Show form for creating a new employee
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees',
            'phone' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric|min:0'
        ]);

        Employee::create($request->all()); // Create a new employee record
        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee) // Correcting parameter type to Employee
    {
        return view('employees.show', compact('employee')); // Show specific employee details
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Employee $employee) // Correcting parameter type to Employee
    {
        return view('employees.edit', compact('employee')); // Show form for editing an employee
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Employee $employee) // Correcting parameter type to Employee
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'phone' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric|min:0'
        ]);

        $employee->update($request->all()); // Update employee record
        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee) // Correcting parameter type to Employee
    {
        $employee->delete(); // Delete employee record
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}
