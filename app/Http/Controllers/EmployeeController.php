<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Company;
use App\Http\Requests\StoreEmployeeRequest;
use App\Http\Requests\UpdateEmployeeRequest;

class EmployeeController extends Controller
{
    public function index()
    {
        $companies = Company::all();
        $employees = Employee::with('company')->latest()->paginate(10);

        return view('employees.index', compact('companies', 'employees'));
    }

    public function store(StoreEmployeeRequest $request)
    {
        Employee::create($request->validated());

        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $employee = Employee::with('company')->findOrFail($id);
        return view('employees.show', compact('employee'));
    }

    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        $companies = Company::all();

        return view('employees.edit', compact('employee', 'companies'));
    }

    public function update(UpdateEmployeeRequest $request, $id)
    {
        $employee = Employee::findOrFail($id);
        $employee->update($request->validated());

        return redirect()
            ->route('employees.index')
            ->with('success', 'Employee updated successfully');
    }

    public function destroy($id)
    {
        Employee::findOrFail($id)->delete();

        return response()->json(['success' => true]);
    }

    public function list()
    {
        $employees = Employee::with('company')->latest()->paginate(10);
        return view('employees.table', compact('employees'))->render();
    }
}
