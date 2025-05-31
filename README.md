
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


