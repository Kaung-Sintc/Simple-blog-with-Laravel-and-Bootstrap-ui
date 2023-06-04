<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/articles');

Auth::routes();

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'user'])->name('admin.users');

Route::get('/articles/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');

Route::resource('/articles', ArticleController::class);
Route::resource('/categories', CategoryController::class);

