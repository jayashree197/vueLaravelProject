
## Laravel & Vue.js Admin Dashboard Project

This project is a Laravel and Vue.js web app for managing companies and employees, with features like user authentication, a statistical dashboard, and CRUD operations.


### Key Features:
- **User Authentication:** Login/logout using Laravel Breeze
- **Admin Dashboard:** Displays total companies and employees, with quick navigation.
- **Company Management:** View, create, edit, and manage company details.
- **Employee Management:** List, add, and delete employees linked to companies.


### Tech Stack:


- **Backend:** Laravel 9.x
- **Frontend:** Vue.js 3.x
- **UI Framework:** Tailwind CSS, Bootstrap
- **Auth System:** Laravel Breeze
- **Database:** MySQL


### How It Works:

**1. Login Flow:**
- Users log in and are redirected to the admin dashboard.

**2. Admin Dashboard:**
- Displays company and employee statistics with navigation links.

**3. Managing Companies:**
- Add/edit companies, then manage associated employees.

**4. Managing Employees:**
- Add or permanently delete employees under specific companies.



### Installation:

**1. Clone the Repo:**

- git clone https://github.com/jayashree197/vueLaravelProject
- cd vueLaravelProject


**2.	Backend Setup:**

- Install PHP dependencies: composer install
- Set up .env file and configure MySQL.
- Generate app key: php artisan key:generate
- Migrate DB: php artisan migrate


**3.	Frontend Setup:**
- Install Node dependencies: npm install
- Compile assets: npm run dev

**4.	Run the App:**
- **Start backend:** php artisan serve (http://localhost:8000)
- **Start frontend:** npm run dev (http://localhost:8080)

### Troubleshooting:
- Ensure **Composer** and **Node.js** are installed.
- Check **.env** file for database settings.
- Make sure **MySQL** is running.

