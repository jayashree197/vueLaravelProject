<<<<<<< HEAD
Laravel & Vue.js Admin Dashboard Project
This is a Laravel and Vue.js-based web application that provides an intuitive admin dashboard for managing companies and employees. The system includes user authentication, statistical dashboards, and CRUD operations for both companies and employees.
________________________________________
Key Features

User Authentication
•   Login and logout functionality using Laravel Breeze.
•   Authenticated users are redirected to the admin dashboard.
Admin Dashboard
•   Displays key statistics:
o   Total number of companies
o   Total number of employees
•   Quick navigation to company and employee management.
Company Management
•   View a list of all registered companies.
•   Create and edit company details:
o   Name, ABN, Email, Address
•   After editing, users can manage employees linked to the company.
 Employee Management
•   List employees under their respective companies.
•   Add new employees and associate them with a company.
•   Delete employees completely from the database (not just unlinking).
________________________________________
Tech Stack

Layer   Technology
Backend Laravel 9.x
Frontend    Vue.js 3.x
UI Framework    Tailwind CSS, Bootstrap
Auth System Laravel Breeze
Database    MySQL
________________________________________
How It Works

1. Login Flow
•   Users are prompted to log in when the app is accessed.
•   Upon successful authentication, users are redirected to the Admin Dashboard.
2. Admin Dashboard
•   Overview of total companies and employees.
•   Navigation to company and employee sections.
3. Managing Companies
•   Navigate to the Companies Page.
•   Create, edit, and update company records.
•   After selecting a company, users can manage associated employees.
4. Managing Employees
•   Access employee list through a selected company.
•   Add or delete employees (deletion is permanent).
________________________________________
Installation Guide

Clone the Repository
git clone https://github.com/jayashree197/vueLaravelProject

cd vueLaravelProject

Switch to the Correct Branch
git checkout my-new-branch
________________________________________
Backend Setup (Laravel)

1. Install PHP Dependencies
Make sure Composer is installed.
composer install

2. Environment Configuration
Copy the .env example and update it:
cp .env.example .env

Update your .env file with MySQL database credentials.

3. Generate App Key & Migrate Database

php artisan key:generate
php artisan migrate
________________________________________
Frontend Setup (Vue.js)

1. Install Node Dependencies
Make sure you have Node.js and npm installed.
npm install

2. Compile Assets
npm run dev
________________________________________
Running the Application

Start Laravel Backend
php artisan serve
URL: http://localhost:8000
Start Vue Frontend

npm run dev
URL: http://localhost:8080
________________________________________
Access the App

•   Visit http://localhost:8080
•   Log in using the built-in Laravel Breeze authentication system.
•   Navigate through the admin dashboard to manage companies and employees.
________________________________________
 Troubleshooting Tips

•   ✅ Ensure Composer and Node.js are correctly installed.
•   ✅ Check .env for correct database settings.
•   ✅ Watch for any errors during composer install or npm install.
•   ✅ Make sure MySQL is running and accessible.


=======
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





>>>>>>> fa8de8a887e3417c33e0141085d77f5f512bd2c8
