<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminAuthController;

// Public Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/signup', [AuthController::class, 'showSignup'])->name('signup');
Route::post('/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// User Routes (Protected)
Route::get('/feed', [HomeController::class, 'feed'])->name('feed');
Route::get('/explore', [HomeController::class, 'explore'])->name('explore');
Route::get('/upload', [PostController::class, 'showUpload'])->name('upload');
Route::post('/upload', [PostController::class, 'upload']);
Route::get('/profile/{username?}', [UserController::class, 'profile'])->name('profile');
Route::get('/edit-profile', [UserController::class, 'editProfile'])->name('edit.profile');
Route::post('/edit-profile', [UserController::class, 'updateProfile']);
Route::get('/stories', [HomeController::class, 'stories'])->name('stories');
Route::get('/messages', [HomeController::class, 'messages'])->name('messages');
Route::get('/chat/{user}', [HomeController::class, 'chat'])->name('chat');
Route::get('/notifications', [HomeController::class, 'notifications'])->name('notifications');

// Post Actions
Route::post('/post/{id}/like', [PostController::class, 'like'])->name('post.like');
Route::post('/post/{id}/comment', [PostController::class, 'comment'])->name('post.comment');
Route::post('/follow/{user}', [UserController::class, 'follow'])->name('user.follow');

// Admin Authentication Routes
Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

// Admin Panel Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/users', [AdminController::class, 'users'])->name('admin.users');
Route::get('/admin/posts', [AdminController::class, 'posts'])->name('admin.posts');
Route::get('/admin/stories', [AdminController::class, 'stories'])->name('admin.stories');
Route::get('/admin/reports', [AdminController::class, 'reports'])->name('admin.reports');
Route::get('/admin/analytics', [AdminController::class, 'analytics'])->name('admin.analytics');
Route::get('/admin/settings', [AdminController::class, 'settings'])->name('admin.settings');