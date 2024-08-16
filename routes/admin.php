<?php

use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MetaController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'admin'], function () {
    Route::group(['middleware' => 'guest'], function () {
        Route::get('login', [LoginController::class, 'login'])->name('admin.login');
        Route::post('login', [LoginController::class, 'authenticate'])->name('admin.login');
    });
    Route::group(['middleware' => 'auth'], function () {
        Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
        Route::get('', [DashboardController::class, 'index'])->name('admin.dashboard');
        Route::get('home', [DashboardController::class, 'home'])->name('admin.home');
        Route::get('about', [DashboardController::class, 'about'])->name('admin.about');
        Route::get('podcast', [DashboardController::class, 'podcast'])->name('admin.podcast');
        Route::put('dashboard/{id}', [DashboardController::class, 'update'])->name('admin.dashboard.update');
        Route::post('others', [DashboardController::class, 'otherStore'])->name('admin.others.store');
        Route::get('others/{id}', [DashboardController::class, 'otherEdit'])->name('admin.others.edit');
        Route::delete('others/{id}', [DashboardController::class, 'otherDestroy'])->name('admin.others.destroy');
        Route::get('enquiries', [DashboardController::class, 'enquiries'])->name('admin.enquiries.index');

        Route::resource('services', ServiceController::class, ['as' => 'admin'])->except(['show']);
        Route::resource('categories', CategoryController::class, ['as' => 'admin'])->except(['show', 'create', 'edit', 'update']);
        Route::put('categories/{id}/status', [CategoryController::class, 'status'])->name('admin.categories.status');
        Route::resource('blogs', BlogController::class, ['as' => 'admin'])->except(['show']);
        Route::put('blogs/{id}/status', [BlogController::class, 'status'])->name('admin.blogs.status');
        Route::resource('testimonials', TestimonialController::class, ['as' => 'admin'])->except(['show']);
        Route::resource('teams', TeamController::class, ['as' => 'admin'])->except(['show']);

        Route::resource('users', UserController::class, ['as' => 'admin'])->except(['show', 'create', 'edit']);
        Route::put('users/{id}/status', [UserController::class, 'status'])->name('admin.users.status');
        Route::resource('meta', MetaController::class, ['as' => 'admin'])->only(['index', 'store']);
        Route::singleton('setting', SettingController::class, ['as' => 'admin']);
    });
});
