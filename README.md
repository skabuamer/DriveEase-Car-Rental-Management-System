# DriveEase — Car Rental Management System

A full-stack Car Rental Management System built with Laravel, Inertia.js, Vue.js, Tailwind CSS, and MySQL.

DriveEase allows users to browse available cars, book vehicles for specific rental periods, and manage rental history through a responsive frontend interface. The system also includes a powerful admin dashboard for managing cars, rentals, customers, and overall rental operations.

This project focuses on real-world business workflow implementation including booking management, rental availability validation, role-based authentication, and customer rental tracking.

---

## 🔗 Project Overview

DriveEase is designed to simulate a real-world car rental business workflow with separate admin and customer interfaces.

The application includes:

- Car listing and booking system
- Rental management workflow
- Role-based dashboard access
- Customer management
- Booking availability validation
- Email notification system
- Responsive frontend and admin dashboard

---

# ✨ Key Features

## 🚗 Car Management System

- Add, edit, and delete cars
- Upload and manage car images
- Car availability status management
- Categorize cars by type
- Manage daily rental pricing

---

## 📅 Rental Booking System

- Book cars for specific dates
- Rental date selection
- Automatic total cost calculation
- Booking availability validation
- Prevent overlapping bookings

---

## 👥 Customer Management

- Customer authentication system
- Customer rental history
- Manage customer information
- Booking cancellation system

---

## 🔐 Role-Based Authentication

- Admin and customer roles
- Protected admin dashboard
- Middleware-based route protection
- Secure authentication system

---

## 📊 Admin Dashboard

- Total cars overview
- Available car statistics
- Total rentals overview
- Rental earnings statistics
- Manage rentals and customers

---

## 📧 Email Notification System

- Rental confirmation email to customers
- Admin notification email for new rentals
- Dynamic booking detail emails

---

## 🎨 Modern Responsive UI

- Responsive frontend pages
- Mobile-friendly dashboard
- Clean booking interface
- Modern admin panel layout
- Tailwind CSS based design system

---

# 🛠️ Tech Stack

## Backend

- Laravel

## Frontend

- Inertia.js
- Vue.js
- Tailwind CSS

## Database

- MySQL

## Additional Features

- Laravel Mail System
- Middleware Authentication
- File/Image Upload System

---

# 🧠 Technical Highlights

- Role-based authentication architecture
- Booking availability validation logic
- Relational database design
- Admin/customer workflow separation
- CRUD-based management system
- Date overlap validation system
- Responsive dashboard implementation
- File upload and image handling
- Email notification workflow
- Organized MVC architecture

---

<!-- # 📸 Project Screenshots -->

<!-- > Add screenshots or GIF previews for better presentation. -->

<!-- Recommended screenshots:

- Homepage
- Car Listing Page
- Car Details Page
- Booking System
- Admin Dashboard
- Rental Management
- Customer Dashboard

Example:

```md
![Dashboard Screenshot](./screenshots/dashboard.png) -->

<!-- ```` -->

---

# 🚀 Installation & Setup

## Clone Repository

```bash
git clone https://github.com/your-username/driveease.git
```

---

## Navigate to Project Directory

```bash
cd driveease
```

---

## Install Dependencies

```bash
composer install
```

---

## Create Environment File

```bash
cp .env.example .env
```

---

## Generate Application Key

```bash
php artisan key:generate
```

---

## Configure Database

Update your `.env` file:

```env
DB_DATABASE=your_database_name
DB_USERNAME=your_database_user
DB_PASSWORD=your_database_password
```

---

## Configure Mail Settings

```env
MAIL_MAILER=smtp
MAIL_HOST=
MAIL_PORT=
MAIL_USERNAME=
MAIL_PASSWORD=
MAIL_ENCRYPTION=
MAIL_FROM_ADDRESS=
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Run Migrations

```bash
php artisan migrate
```

---

## Create Storage Link

```bash
php artisan storage:link
```

---

## Start Development Server

```bash
php artisan serve
```

---

# 📂 Project Structure

```bash
app/
resources/
routes/
database/
public/
storage/
```

---

# 🔑 Core Functionalities

## Admin Features

- Manage Cars
- Manage Rentals
- Manage Customers
- Dashboard Analytics

---

## Customer Features

- Browse Cars
- Filter Available Cars
- Book Cars
- View Rental History
- Cancel Upcoming Rentals

---

# 📈 Future Improvements

- Online payment gateway integration
- Advanced booking calendar
- Car reviews & ratings
- Real-time availability system
- Multi-image car gallery
- Advanced analytics dashboard
- AI-powered rental recommendations

---

# 👨‍💻 Developer

## Abu Amer

Frontend-focused Full Stack Developer with experience in:

- Laravel
- Vue.js
- React.js
- Next.js
- Tailwind CSS
- Modern UI/UX Development

---

# 📄 License

This project is built for learning and portfolio purposes.
