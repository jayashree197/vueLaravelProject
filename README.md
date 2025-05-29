Laravel/Vue Project

Overview
This is a Laravel and Vue.js project developed to meet the requirements for the Code Test. The application provides an admin dashboard where users can manage companies and employees. It includes features like:

User authentication: Login and logout functionality.

Dashboard: Displays company and employee statistics.

Company Management: List, create, and edit companies.

Employee Management: Create, delete employees, and manage their relationship with companies.

Features
1. Login Screen:

Users can log in using Laravel's built-in authentication system.

After successful login, users are redirected to the admin dashboard.

2. Admin Dashboard:

Displays the total number of companies and employees in the database.

The dashboard gives an overview of key statistics.

3. Company Management:

View the list of all companies.

Create new companies with relevant information (e.g., Name, ABN, Email, Address).

Edit company details after selection from the list.

After editing a company, you can add employees linked to the company.

4. Employee Management:

Employees are listed under each company.

You can create a new employee and link them to a specific company.

You can delete employees completely from the database.

The employee deletion will remove the record from the system (not just unlink the employee).

Tech Stack
Backend: Laravel 9.x

Frontend: Vue.js 3.x

UI Framework: Tailwind CSS , Bootstrap

Authentication: Laravel Breez

Database: MySQL 

How It Works
Login Flow:

Upon opening the app, users will be prompted to log in via the Login Screen.

Once authenticated, the app redirects the user to the Admin Dashboard.

Admin Dashboard:

Displays statistics on the total number of companies and employees.

The user can access company management and employee management features from the dashboard.

Managing Companies:

Users can go to the Companies Page to view, create, and edit company records.

After editing a company, users can manage employees associated with the company.

Managing Employees:

The user can access the Employee List from the company edit page.

From the employee list, users can create new employees and delete existing ones.





