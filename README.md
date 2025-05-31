Laravel & Vue.js Admin Dashboard Project

This project is a Laravel and Vue.js web app for managing companies and employees, with features like user authentication, a statistical dashboard, and CRUD operations.

Key Features:
•	User Authentication: Login/logout using Laravel Breeze.
•	Admin Dashboard: Displays total companies and employees, with quick navigation.
•	Company Management: View, create, edit, and manage company details.
•	Employee Management: List, add, and delete employees linked to companies.

Tech Stack:
•	Backend: Laravel 9.x
•	Frontend: Vue.js 3.x
•	UI: Tailwind CSS, Bootstrap
•	Auth: Laravel Breeze
•	Database: MySQL

How It Works:
1.	Login: Users log in and are redirected to the dashboard.
2.	Dashboard: Displays company/employee stats and links to manage them.
3.	Company Management: Create, edit, and manage companies and employees.
4.	Employee Management: Add/delete employees within companies.

Installation:
1.	Clone the Repo:
git clone https://github.com/jayashree197/vueLaravelProject
cd vueLaravelProject
git checkout my-new-branch
2.	Backend Setup:
o	Install PHP dependencies: composer install
o	Set up .env file and configure MySQL.
o	Generate app key: php artisan key:generate
o	Migrate DB: php artisan migrate
3.	Frontend Setup:
o	Install Node dependencies: npm install
o	Compile assets: npm run dev
4.	Run the App:
o	Start backend: php artisan serve (http://localhost:8000)
o	Start frontend: npm run dev (http://localhost:8080)
Troubleshooting:
•	Ensure Composer and Node.js are installed.
•	Check .env file for database settings.
•	Make sure MySQL is running.

