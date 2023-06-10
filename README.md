# Simple Blog with Laravel and Bootstrap UI

## Features
- Authentication with laravel/ui package
- Authrization with Policies
- Roles and Permission
- Comments and Replies in Articles

## Installation and Setup
clone this repo `https://github.com/Kaung-Sintc/Simple-blog-with-Laravel-and-Bootstrap-ui.git` or download zip file
##
In your project directory, 
install required dependencies
```
composer install
npm install
```
copy `.env.example` file to `.env` :
```
cp .env.example .env
```
And create database and change your database name in `.env` file run:
```
php artisan migrate
```
To populate data :
```
php artisan db:seed
```
To compile and hot reload, run:
```
npm run dev
```
Start your development server
```
php artisan serve
```

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
