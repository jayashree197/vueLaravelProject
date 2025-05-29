<?php


namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employee;
use Inertia\Inertia;

class AdminController extends Controller
{
    // This method loads the admin dashboard
    public function dashboard()
    {
        // Get the total number of companies in the database
        $companiesCount = Company::count();
        
        // Get the total number of employees in the database
        $employeesCount = Employee::count();

        return Inertia::render('Admin/Dashboard', [ 
            // We send the number of companies and employees as props to the frontend
            'companiesCount' => $companiesCount,
            'employeesCount' => $employeesCount,
        ]);
    }
}
