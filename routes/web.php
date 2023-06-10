<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/articles');

Auth::routes();

Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'index'])
                                                                                ->name('admin.dashboard');
Route::get('/admin/users', [App\Http\Controllers\AdminController::class, 'user'])
                                                                            ->name('admin.users');

Route::get('/articles/dashboard', [App\Http\Controllers\HomeController::class, 'index'])
                                                                                    ->name('dashboard');
// article resources (filtered withconstructor middleware)
Route::resource('/articles', ArticleController::class);
// article search route
Route::get('/search', [ArticleController::class, 'search'])
                                                        ->name('articles.search');


Route::middleware('auth')->group(function() {
    // categories resource
    Route::resource('/categories', CategoryController::class)->middleware('role:admin');

    // comments
    Route::post('articles/{article}/comments/create', [CommentController::class, 'store'])
                                                                                        ->name('comments.store');

    Route::get('/comments/{comment}/edit', [CommentController::class, 'edit'])
                                                                    ->name('comments.edit');
    Route::patch('/comments/{comment}', [CommentController::class, 'update'])
                                                                        ->name('comments.update');
    Route::delete('comments/{comment}', [CommentController::class, 'delete'])
                                                                            ->name('comments.delete');
});
