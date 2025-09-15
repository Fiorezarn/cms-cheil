# Laravel CMS - Content Management System

![Laravel](https://img.shields.io/badge/Laravel-10.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)
![PHP](https://img.shields.io/badge/PHP-8.1+-777BB4?style=for-the-badge&logo=php&logoColor=white)
![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)
![Bootstrap](https://img.shields.io/badge/Bootstrap-5.3-7952B3?style=for-the-badge&logo=bootstrap&logoColor=white)

A modern, secure, and user-friendly Content Management System built with Laravel 10, featuring role-based access control, user management, and a beautiful responsive interface.

## 🎯 Features

### ✨ **Core Features**

- 🔐 **User Authentication** - Secure login/register system
- 👥 **User Management** - Complete CRUD operations for users
- 🛡️ **Role-Based Access Control** - Super User and User Viewer roles
- 📱 **Responsive Design** - Modern UI with Bootstrap 5
- 🎨 **Beautiful Interface** - Gradient designs with smooth animations

### 🔑 **User Roles**

- **Super User**: Full system access, can manage all users
- **User Viewer**: Read-only access, limited permissions
- **Guest**: Can register and login only

### 🚀 **Modern UI/UX**

- Glassmorphism design effects
- Gradient backgrounds and buttons
- Smooth hover animations
- Font Awesome icons
- Mobile-first responsive design

## 🛠️ Tech Stack

- **Backend**: Laravel 10.x
- **Frontend**: Bootstrap 5, Blade Templates
- **Database**: MySQL (PostgreSQL & MongoDB supported)
- **ORM**: Eloquent
- **Authentication**: Laravel Auth
- **Icons**: Font Awesome 6
- **Fonts**: Inter (Google Fonts)

## 📋 Requirements

- PHP 8.1 or higher
- Composer
- Node.js & NPM
- MySQL 8.0+ / PostgreSQL / MongoDB
- Laravel 10.x

## 🚀 Installation

### 1. Clone & Setup Project

```bash
# Create new Laravel project
composer create-project laravel/laravel cms-project "10.*"
cd cms-project

# Or clone this repository
git clone <repository-url>
cd laravel-cms
```

### 2. Install Dependencies

```bash
# Install PHP dependencies
composer install

# Install Laravel UI for authentication
composer require laravel/ui

# Setup Bootstrap authentication
php artisan ui bootstrap --auth

# Install Node dependencies
npm install && npm run build
```

### 3. Environment Configuration

```bash
# Copy environment file
cp .env.example .env

# Generate application key
php artisan key:generate
```

Update your `.env` file with database credentials:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=cms_db
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

### 4. Database Setup

```bash
# Create database
mysql -u root -p
CREATE DATABASE cms_db;
exit

# Run migrations and seeders
php artisan migrate
php artisan db:seed
```

### 5. Start Development Server

```bash
php artisan serve
```

Visit: `http://localhost:8000`

## 🔑 Default Login Credentials

After running seeders, you can login with:

- **Email**: `admin@cms.com`
- **Password**: `password`
- **Role**: Super User

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/
│   │   │   └── RegisterController.php
│   │   ├── DashboardController.php
│   │   └── UserController.php
│   └── Middleware/
│       └── SuperUserMiddleware.php
├── Models/
│   ├── User.php
│   └── Role.php
database/
├── migrations/
│   ├── create_users_table.php
│   ├── create_roles_table.php
│   └── create_role_user_table.php
└── seeders/
    ├── RoleSeeder.php
    └── SuperUserSeeder.php
resources/
└── views/
    ├── auth/
    │   ├── login.blade.php
    │   └── register.blade.php
    ├── users/
    │   ├── index.blade.php
    │   ├── create.blade.php
    │   ├── show.blade.php
    │   └── edit.blade.php
    ├── layouts/
    │   └── app.blade.php
    ├── dashboard.blade.php
    └── welcome.blade.php
```

## 📱 Screenshots

### 🏠 Welcome/Login Page

Beautiful gradient login page with glassmorphism effects

### 📊 Dashboard

Clean and modern dashboard with role-based widgets

### 👥 User Management

Complete user management interface for Super Users

## 🎮 Usage Guide

### For Regular Users

1. **Register**: Create new account from welcome page
2. **Login**: Access your dashboard
3. **View Profile**: Check your profile information

### For Super Users

1. **User Management**: Access via navigation menu
2. **Create Users**: Add new users with roles
3. **Edit Users**: Modify user information and roles
4. **Delete Users**: Remove users (except yourself)
5. **Role Assignment**: Assign appropriate roles

## 🔐 Security Features

- ✅ **Password Hashing** - Secure password storage
- ✅ **CSRF Protection** - Form security tokens
- ✅ **SQL Injection Protection** - Eloquent ORM
- ✅ **Role-based Access** - Middleware protection
- ✅ **Input Validation** - Server-side validation
- ✅ **Session Management** - Secure session handling

## 🎨 UI Components

### Color Scheme

- **Primary**: `#667eea` to `#764ba2` (gradient)
- **Success**: `#11998e` to `#38ef7d` (gradient)
- **Warning**: `#f093fb` to `#f5576c` (gradient)
- **Info**: `#4facfe` to `#00f2fe` (gradient)

### Design Elements

- Rounded corners (15px)
- Box shadows with depth
- Smooth transitions (0.3s ease)
- Hover effects with transform
- Gradient backgrounds
- Glassmorphism cards

## 🧪 Database Schema

### Users Table

```sql
- id (Primary Key)
- name (String)
- email (String, Unique)
- password (Hashed)
- is_active (Boolean)
- timestamps
```

### Roles Table

```sql
- id (Primary Key)
- name (String, Unique)
- display_name (String)
- description (Text)
- timestamps
```

### Role_User Pivot Table

```sql
- id (Primary Key)
- user_id (Foreign Key)
- role_id (Foreign Key)
- timestamps
```

## 🚀 API Endpoints

| Method | URI                  | Name          | Action            |
| ------ | -------------------- | ------------- | ----------------- |
| GET    | `/`                  | welcome       | Landing page      |
| GET    | `/dashboard`         | dashboard     | User dashboard    |
| GET    | `/users`             | users.index   | List all users    |
| GET    | `/users/create`      | users.create  | Show create form  |
| POST   | `/users`             | users.store   | Store new user    |
| GET    | `/users/{user}`      | users.show    | Show user details |
| GET    | `/users/{user}/edit` | users.edit    | Show edit form    |
| PUT    | `/users/{user}`      | users.update  | Update user       |
| DELETE | `/users/{user}`      | users.destroy | Delete user       |

## 🔧 Customization

### Adding New Roles

1. Create migration for new role
2. Update `RoleSeeder.php`
3. Add role methods in `User.php` model
4. Update middleware and views

### Styling Customization

- Modify `resources/views/layouts/app.blade.php`
- Update CSS variables in `<style>` section
- Customize gradient colors and effects

### Database Configuration

- **MySQL**: Default configuration
- **PostgreSQL**: Change `DB_CONNECTION=pgsql`
- **MongoDB**: Install Laravel MongoDB package

## 🧪 Testing

```bash
# Run feature tests
php artisan test

# Run specific test
php artisan test --filter UserTest

# Run tests with coverage
php artisan test --coverage
```

## 📝 Contributing

1. Fork the repository
2. Create feature branch (`git checkout -b feature/amazing-feature`)
3. Commit changes (`git commit -m 'Add amazing feature'`)
4. Push to branch (`git push origin feature/amazing-feature`)
5. Open Pull Request

## 🐛 Troubleshooting

### Common Issues

**1. Migration Error**

```bash
php artisan migrate:fresh --seed
```

**2. Permission Denied**

```bash
chmod -R 775 storage bootstrap/cache
```

**3. Missing Dependencies**

```bash
composer install
npm install && npm run build
```

**4. Database Connection**

- Check `.env` database credentials
- Ensure database exists
- Verify MySQL/PostgreSQL service is running

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🤝 Support

For support, email your-email@example.com or create an issue in the repository.

## 🙏 Acknowledgments

- Laravel Framework Team
- Bootstrap Team
- Font Awesome Team
- Google Fonts (Inter)
- Contributors and testers

---

**Made with ❤️ using Laravel 10**

## 🔗 Links

- [Laravel Documentation](https://laravel.com/docs)
- [Bootstrap Documentation](https://getbootstrap.com/docs)
- [Font Awesome Icons](https://fontawesome.com/icons)
- [Google Fonts](https://fonts.google.com)
