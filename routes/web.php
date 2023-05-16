<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UiController;
use App\Http\Controllers\admin\AdminDashboardController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\PostController;
use App\Http\Controllers\admin\ProjectController;
use App\Http\Controllers\admin\SkillController;
use App\Http\Controllers\admin\StudentController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeDislikeController;
use Laravel\Ui\UiCommand;

// UI
Route::get('/', [UiController::class, 'index'])->name('ui.index');
// for posts page
Route::get('/posts', [UiController::class, 'postsPage'])->name('ui.posts');
// for posts searching
Route::get('/posts/search', [UiController::class, 'search'])->name('ui.search');
// for posts searching by categories
Route::get('/posts/search-by-categories/{id}', [UiController::class, 'searchByCategory'])->name('ui.searchByCategory');

// UI Auth
Route::group(['middleware' => 'auth'], function () {
    // for posts detail page
    Route::get('/posts/detail/{id}', [UiController::class, 'detail'])->name('ui.detail');
    // for like
    Route::post('/posts/like/{id}', [LikeDislikeController::class, 'like'])->name('posts.like');
    // for dislike
    Route::post('/posts/dislike/{id}', [LikeDislikeController::class, 'dislike'])->name('posts.dislike');
    // for comment
    Route::post('/posts/comment/{id}', [CommentController::class, 'comment'])->name('posts.comment');
});

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // User
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    // for users edit page
    Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    // for update users
    Route::post('/users/edit/{id}', [UserController::class, 'update'])->name('users.update');
    // for delete users
    Route::post('/users/delete/{id}', [UserController::class, 'delete'])->name('users.delete');

    // Skill
    Route::resource('skills', SkillController::class);

    // Project
    Route::resource('projects', ProjectController::class);

    // Student
    Route::get('/student-count', [StudentController::class, 'index'])->name('students.index');
    // for create students count
    Route::post('/student-count/store', [StudentController::class, 'store'])->name('students.store');
    // for update students count
    Route::post('/student-count/update/{id}', [StudentController::class, 'update'])->name('students.update');

    // Category
    Route::resource('categories', CategoryController::class);

    // Post
    Route::resource('/posts', PostController::class);
    // for show or hide comments
    Route::post('/comments/show-hide/{id}', [PostController::class, 'showHideComments'])->name('comment.showHide');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
