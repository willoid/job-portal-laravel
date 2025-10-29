# Job Portal - Laravel Application

A modern job portal web application built with Laravel, featuring job listings, user authentication, and application management. This project demonstrates proficiency in full-stack development using industry-standard technologies and best practices.

## 🚀 Live Demo

[View Live Site](https://willyc37.sg-host.com)

## 📋 Features

- **Public Job Browsing**: Visitors can browse all job listings without registration
- **User Authentication**: Secure registration and login system using Laravel Breeze
- **Protected Features**: Registered users can view full job details and apply to positions
- **Responsive Design**: Mobile-friendly interface using Tailwind CSS
- **Database Seeders**: Pre-populated sample data for demonstration
- **SEO Friendly**: Public content accessible for search engine indexing

## 🛠️ Technologies Used

### Backend
- **Laravel 10.x** - PHP web application framework
- **PHP 8.2** - Server-side programming language
- **MySQL** - Relational database management system
- **Eloquent ORM** - Database abstraction layer
- **Laravel Breeze** - Authentication scaffolding

### Frontend
- **Blade Templates** - Laravel's templating engine
- **Tailwind CSS** - Utility-first CSS framework
- **Vite** - Next-generation frontend build tool
- **Alpine.js** - Lightweight JavaScript framework

### Development Tools
- **Composer** - PHP dependency management
- **NPM** - Node package manager
- **Git** - Version control
- **Artisan CLI** - Laravel's command-line interface

### Deployment & Hosting
- **SiteGround** - Shared hosting environment
- **SSH** - Secure server access and deployment
- **SSL Certificate** - Secure HTTPS connection

## 📁 Project Structure

```
job-portal/
├── app/
│   ├── Http/
│   │   ├── Controllers/      # Application controllers
│   │   └── Middleware/        # HTTP middleware
│   └── Models/                # Eloquent models
├── database/
│   ├── migrations/            # Database migrations
│   └── seeders/              # Database seeders
├── resources/
│   ├── views/                # Blade templates
│   ├── css/                  # Stylesheets
│   └── js/                   # JavaScript files
├── routes/
│   └── web.php               # Web routes
├── public/                   # Publicly accessible files
└── .env.example             # Environment configuration template
```

## 💻 Installation

### Prerequisites
- PHP >= 8.2
- Composer
- MySQL
- Node.js & NPM

### Local Development Setup

1. **Clone the repository**
   ```bash
   git clone https://github.com/yourusername/job-portal.git
   cd job-portal
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node dependencies**
   ```bash
   npm install
   ```

4. **Environment configuration**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Configure database**

   Update `.env` file with your database credentials:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=your_database_name
   DB_USERNAME=your_database_user
   DB_PASSWORD=your_database_password
   ```

6. **Run migrations and seeders**
   ```bash
   php artisan migrate --seed
   ```

7. **Build frontend assets**
   ```bash
   npm run dev
   ```

8. **Start development server**
   ```bash
   php artisan serve
   ```

   Visit `http://localhost:8000` in your browser


## 🗄️ Database Schema

### Key Tables
- `users` - User accounts and authentication
- `job_offers` - Job listings with details
- `applications` - Job applications from users
- `companies` - Company information
- `categories` - Job categories

## 🔒 Security Features

- **CSRF Protection** - Cross-site request forgery prevention
- **SQL Injection Prevention** - Eloquent ORM and prepared statements
- **XSS Protection** - Blade template escaping
- **Password Hashing** - Bcrypt encryption for passwords
- **Environment Variables** - Sensitive data kept in `.env` file
- **HTTPS** - SSL certificate for encrypted connections

## 📈 Performance Optimizations

- **Route Caching** - Optimized route registration
- **View Caching** - Compiled Blade templates
- **Config Caching** - Cached configuration files
- **Autoloader Optimization** - Optimized Composer autoloading
- **Asset Bundling** - Vite for optimized CSS/JS delivery



## 📝 Code Standards

- **PSR-12** - PHP coding standards
- **Laravel Best Practices** - Following Laravel conventions
- **Clean Code Principles** - Maintainable and readable code
- **MVC Architecture** - Separation of concerns


---

*This project was developed to demonstrate proficiency in modern web development technologies and deployment practices. Feel free to explore the code and reach out with any questions.*
