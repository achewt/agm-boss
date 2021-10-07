<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Auth::routes(["register" => false]);

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin Routes
Route::middleware(['auth'])->group(function() {
    Route::get('/', function () {
        return view('admin.index');
    })->name('home');

    // User Routes
    Route::get('/users', [UserController::class, 'index'])->name('view-users');
    Route::get('/create-user', [UserController::class, 'create'])->name('create-user');
    Route::post('/create-user', [UserController::class, 'store'])->name('save-user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::post('/edit-user/{id}', [UserController::class, 'update'])->name('update-user');
    Route::get('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');
    // Change Password
    Route::get('/change-password', [UserController::class, 'viewChangePassword'])->name('view-change-password');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('change-password');
    // Role Routes
    Route::get('/roles', [RoleController::class, 'index'])->name('view-roles');
    Route::get('/create-role', [RoleController::class, 'create'])->name('create-role');
    Route::post('/create-role', [RoleController::class, 'store'])->name('save-role');
    Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit-role');
    Route::post('/edit-role/{id}', [RoleController::class, 'update'])->name('update-role');
    Route::get('/delete-role/{id}', [RoleController::class, 'destroy'])->name('delete-role');
    
});
