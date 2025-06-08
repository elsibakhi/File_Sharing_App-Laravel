# Laravel FileShare

A minimal file sharing platform built with Laravel 10. Users can upload files and get a unique download link to share with others securely.

## 🚀 Features

- ✅ Upload files with size/type validation
- ✅ Generate unique shareable download links
- ✅ File expiration (optional)
- ✅ Simple UI for uploading and managing files
- ✅ File download logging (optional)
- ✅ Email notifications (optional, via Mailtrap or other)

## 🧰 Built With

- [Laravel 10](https://laravel.com/)
- MySQL
- Blade (or Inertia if used)
- [Mailtrap](https://mailtrap.io/) (for optional email notifications)

## 📦 Installation

```bash
git clone https://github.com/elsibakhi/laravel-fileshare.git
cd laravel-fileshare

composer install
cp .env.example .env
php artisan key:generate

# Set your DB and mail configuration in .env

php artisan migrate
php artisan serve
