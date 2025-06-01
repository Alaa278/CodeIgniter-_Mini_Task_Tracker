#  Task Tracker (CodeIgniter 3.1.10)
Task Tracker is a simple web-based task management system built with CodeIgniter 3.1.10. It allows users to create, assign, and manage tasks. Admins can view overall task statistics and manage all tasks.

## 1. Features
- User login and session management
- Role-based redirection (Admin / User)
- Admin dashboard with task stats
- Task CRUD (Create, Read, Update, Delete)
- Task filtering and pagination
- JSON API for tasks
- Bootstrap 5 UI
- CSRF protection & form validation
- Modular views (header/footer/layout separated)
- Seeded database with test users and tasks

## 2. Requirements
- PHP 5.6+ (PHP 7.4+ recommended)
- MySQL
- Apache
- Local dev server like XAMPP / WAMP / MAMP

## 3. ⚙Setup Instructions
### 1. Clone or Copy the Project
Place the project inside your local server root directory.

## 4. Configure Database
- Open phpMyAdmin
- Create a new database called `task_tracker`
- Import the provided `database.sql` file
or open your browser and go to the this link (http://localhost/task-tracker/index.php/install) to create the database tables with with dummy data:

## 5. User Roles
The following default users are created as part of the initial (dummy) data:

### 1. **Admin**
   - **Username:** `admin`
   - **Password:** `admin123`

### 2. **User**
   - **Example Username:** `alaa`
   - **Password:** `alaa123`

### 6. Configure CodeIgniter

**Edit `application/config/config.php`:**

```php
$config['base_url'] = 'http://localhost/task-tracker/';

$db['default'] = array(
  'hostname' => 'localhost',
  'username' => 'root',
  'password' => '',
  'database' => 'task_tracker',
  'dbdriver' => 'mysqli',
);


## 7. 🔗 URLs

### **1. Login Page**  
[http://localhost/task-tracker/index.php/auth/login](http://localhost/task-tracker/index.php/auth/login)

### **2. Admin Dashboard**  
[http://localhost/task-tracker/index.php/dashboard](http://localhost/task-tracker/index.php/dashboard)

### **3. Tasks List**  
[http://localhost/task-tracker/index.php/tasks](http://localhost/task-tracker/index.php/tasks)

### **4. JSON API Endpoint**  
[http://localhost/task-tracker/index.php/api/overdue_tasks](http://localhost/task-tracker/index.php/api/overdue_tasks)

### **5. JSON API (filterable by assigned_to)**  
[http://localhost/task-tracker/index.php/api/overdue_tasks?assigned_to=2](http://localhost/task-tracker/index.php/api/overdue_tasks?assigned_to=2)


