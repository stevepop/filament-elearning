# Laravel Filament E-Learning Platform (Part 1)

A comprehensive e-learning platform built with Laravel 11 and Filament 3, demonstrating how to create a powerful admin panel for managing courses, students, and instructors.

## Features

### Admin Panel
- Course management with rich content editing
- Student enrollment tracking
- Instructor performance monitoring
- Module organization with drag-and-drop reordering
- File uploads for course materials
- Comprehensive dashboard with key metrics

### Dashboard Widgets
- Total student count
- Active courses
- Revenue tracking
- Recent enrollments
- Instructor performance metrics

## Screenshots

[Include screenshots of key features]

## Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite 3

## Installation

1. Clone the repository
```bash
git clone git@github.com:stevepop/filament-elearning.git
cd filament-elearning

2. Install PHP dependencies
```bash 
composer install
```
3. Install and build frontend assets
```bash
npm install
npm run dev
```
4.  Create a new SQLite database
```bash
touch database/database.sqlite
```
5. Run database migrations
```bash
php artisan migrate
```
6. Seed the database with sample data
```bash
php artisan db:seed
```
7. Start the Laravel development server
```bash
php artisan serve
```
8. Visit `http://localhost:8000/admin` in your browser
9. Log in with the default credentials:
   - Email: `admin@example.com`
   - Password: `password`

