# DOCS

**Document Operation Communication System (DOCS)**

This is a web-based system designed for the **Department of Science and Technology – Region V (DOST-V)** to efficiently manage and track document operations and communication. The system helps in organizing documents, monitoring their status, and facilitating smooth workflow across units.

---

## Features

- Manage documents
- Manage documents 
- Track document timelines and actions
- Assign users to units and positions
- Secure authentication and role management
- User-friendly interface

---

## Installation / Setup

Follow these steps to get the project running locally:

### 1. Clone the Repository
```bash
git clone https://github.com/GeykScript/Dost-V-Docs.git
cd Dost-V-Docs
```

### 2. Create Database
Create a two new database named: 
```bash
 docs_db & docs_db_production
```
Use the docs_db first in the env

### 3. Import Database
-Once you have created the database(s), import the SQL file into the new database

### 4. Configure Environment

Update your .env file with your database name:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=docs_db
```

### 5. Generate Application Key
```bash
php artisan key:generate
```

### 6. Check Installed Packages (Optional)
Check if it exists if not install it
```bash
npm list @fontsource/poppins
npm list tailwindcss
npm list flowbite
npm list apexcharts
composer show livewire/livewire
```

If you have already installed Composer and Npm skip the two installer command

```bash
composer install
composer require blade-ui-kit/blade-heroicons
npm install
npm install tailwindcss @tailwindcss/vite
npm install @fontsource/poppins
npm install apexcharts@3.46.0 --save
npm install flowbite --save
```

### 7. Serve Application

```bash
php artisan serve
npm run dev
```

### Notes

- The system uses TailwindCSS for styling, Poppins font locally, and Livewire for reactive components.
- Ensure Node.js, NPM, and PHP are installed on your system before starting.
- For production deployment, configure proper database credentials and server setup.


### Contributing

Please create a branch, make your changes, and submit a pull request to the development branch.
