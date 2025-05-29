Laravel/Vue Project
Overview
This is a Laravel and Vue.js project. The application provides an admin dashboard where users can manage companies and employees. It includes features like:

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

Follow these steps to get the project running on your local machine.
1. Clone the Repository
First, clone the repository using this command 

git clone https://github.com/jayashree197/vueLaravelProject

Navigate into the project folder:
cd vueLaravelProject

2. Switch to the Correct Branch
git checkout  my-new-branch

4. Set Up Backend (Laravel)
Install Dependencies

Make sure you have Composer installed, then run:
composer install

Set Up the Environment
Copy the environment file and edit it:
cp .env.example .env

Open the .env file and add your database credentials.
Generate Key & Migrate Database

Run these commands:
php artisan key:generate
php artisan migrate

4. Set Up Frontend (Vue.js)
Install Frontend Dependencies
Make sure you have Node.js and npm installed. Then run:
npm install
Compile Assets

Run this to compile the frontend assets:
npm run dev

5. Running the Server
Start Backend

Run this to start the Laravel backend:
php artisan serve
The backend will be at http://localhost:8000.

Start Frontend
Run this to start the Vue.js frontend:
npm run dev
The frontend will be at http://localhost:8080.

6. Access the Application
Once both servers are running, you can access the app locally:
Backend: http://localhost:8000
Frontend: http://localhost:8080
Log in using the built-in authentication system.

7. Troubleshooting
If you run into issues, check the following:
Ensure Composer and Node.js are installed.
Make sure your .env file has the correct database settings.
Check for errors when running composer install and npm install






