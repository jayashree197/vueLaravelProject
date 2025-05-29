<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Employee;

class CompanyController extends Controller
{
  
    //Display a listing of companies.
    public function index()
    {
        $companies = Company::all();
        return Inertia::render('Admin/Companies/Index', [
            'companies' => $companies,
        ]);
    }

    
    //Show the form for creating a new company.
    public function create()
    {
        return Inertia::render('Admin/Companies/Create');
    }

  
    //Store a newly created company in the database.
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abn' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        Company::create($request->only(['name', 'abn', 'email', 'address']));

        // Correct route for redirect
        return redirect()->route('companies.index')->with('success', 'Company created successfully!');
    }

  
    //Display the specified company. 
    public function show(Company $company)
    {
        // Get employees associated with this company
        $employees = $company->employees;  
        return Inertia::render('Admin/Companies/Show', [
            'company' => $company,
            'employees' => $employees,
        ]);
    }
    

    //Show the form for editing the specified company.
    public function edit(Company $company)
    {
        // Ensure employees are passed to the view
        return Inertia::render('Admin/Companies/Edit', [
            'company' => $company,
            'employees' => $company->employees, // Pass employees
        ]);
    }

  
    // Update the specified company in the database.   
    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'abn' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        $company->update($request->only(['name', 'abn', 'email', 'address']));

        // Correct route for redirect
        return redirect()->route('companies.index')->with('success', 'Company updated successfully!');
    }


    //Remove the specified employee from the company. 
    public function deleteEmployee(Company $company, Employee $employee)
    {
        // Ensure the employee belongs to the company 
        if ($employee->company_id !== $company->id) {
            return abort(404, 'Employee not found');
        }

        // Delete the employee
        $employee->delete();

        // Redirect back with a success message
        return redirect()->route('companies.employees', $company)
            ->with('success', 'Employee deleted successfully!');
    }

   
    //Store a newly created employee in the database and associate with the company. 
    public function createEmployee(Request $request, Company $company)
    {
        // Validate the employee data
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        // Create the employee and associate with the company
        $employee = $company->employees()->create($request->only(['first_name', 'last_name', 'email', 'address']));

        // Redirect back to the employee page with success message
        return redirect()->route('companies.employees', $company)->with('success', 'Employee created successfully!');
    }


    //Display a listing of employees. 
    public function showEmployees(Company $company)
    {
        $employees = $company->employees; 

        return Inertia::render('Admin/Companies/Employees', [
            'company' => $company,
            'employees' => $employees
        ]);
    }

}