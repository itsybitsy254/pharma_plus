# Pharma Plus

![Laravel](https://img.shields.io/badge/Laravel-8DB8E8?style=flat\&logo=laravel\&logoColor=white) ![PHP](https://img.shields.io/badge/PHP-777BB4?style=flat\&logo=php\&logoColor=white) ![TailwindCSS](https://img.shields.io/badge/TailwindCSS-06B6D4?style=flat\&logo=tailwind-css\&logoColor=white)

A full-featured **Pharmacy Management System** built with **Laravel 12**, **Breeze** for authentication, **TailwindCSS** for styling, and **SQLite** for the database.

---

## 🚀 Features

* User authentication & roles (Admin, Cashier)
* Manage Medicines, Categories, Suppliers
* Record and manage Sales
* Stock Alerts for low or expired medicines
* Audit Logs for tracking user actions
* Responsive UI using TailwindCSS

---

## 📂 Project Structure

```
app/
    Http/
        Controllers/
        Middleware/
        Requests/
    Models/
database/
    seeders/
    migrations/
resources/
    views/
routes/
    web.php
.env.example
```

---

## 🛠️ Setup Instructions

Follow these steps to run the project locally:

---

### **1. Clone the repository**

```bash
git clone https://github.com/itsybitsy254/pharma_plus.git
cd pharma_plus
```

---

### **2. Install dependencies**

```bash
composer install
npm install
npm run dev
```

---

### **3. Configure environment**

* Copy `.env.example` to `.env`:

```bash
cp .env.example .env
```

* Generate the application key:

```bash
php artisan key:generate
```

* Use SQLite as the database:

```bash
touch database/database.sqlite
```

* In `.env`, set:

```env
DB_CONNECTION=sqlite
DB_DATABASE=/full/path/to/your/project/database/database.sqlite
```

Replace `/full/path/to/your/project/` with your actual project path.

---

### **4. Run migrations**

```bash
php artisan migrate
```

---

### **5. Seed the database**

The project uses **Faker** to seed dummy data for testing.

```bash
php artisan db:seed
```

> This will create:
>
> * Users (Admin & Cashier)
> * Categories
> * Suppliers
> * Medicines
> * Sales
> * Stock Alerts
> * Audit Logs

---

### **6. Run the development server**

```bash
php artisan serve
```

Visit: `http://127.0.0.1:8000`

---

### **7. Access credentials (from seeder)**

* Admin user: `admin@example.com` / `password`
* Cashier user: `cashier@example.com` / `password`

> You can change these in `Database/Seeders/UserSeeder.php`.

---

### **8. Compile assets (optional)**

For production:

```bash
npm run build
```

---

### **9. Git workflow**

* Stage changes:

```bash
git add .
```

* Commit:

```bash
git commit -m "Your commit message"
```

* Push:

```bash
git push origin main
```

---

## ⚠️ Notes

* Make sure `.env` is **never pushed to GitHub** as it contains sensitive data.
* For SQLite, ensure `database/database.sqlite` is writable.
* Seeders use Faker for demo data, feel free to adjust counts and defaults.

---

### **💻 License**

MIT License
