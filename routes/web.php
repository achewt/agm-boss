<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DesignationController;

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
    // Home
    Route::get('/', function () {
        return view('admin.index');
    })->name('home');

    // User Routes
    Route::get('/users', [UserController::class, 'index'])->name('view-users');
    Route::get('/create-user', [UserController::class, 'create'])->name('create-user');
    Route::post('/create-user', [UserController::class, 'store'])->name('save-user');
    Route::get('/edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
    Route::get('/delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');
    
    // Change Password
    Route::get('/change-password', [UserController::class, 'viewChangePassword'])->name('view-change-password');
    Route::post('/change-password', [UserController::class, 'changePassword'])->name('change-password');
    
    // Role Routes
    Route::get('/roles', [RoleController::class, 'index'])->name('view-roles');
    Route::get('/create-role', [RoleController::class, 'create'])->name('create-role');
    Route::post('/create-role', [RoleController::class, 'store'])->name('save-role');
    Route::get('/edit-role/{id}', [RoleController::class, 'edit'])->name('edit-role');
    Route::get('/delete-role/{id}', [RoleController::class, 'destroy'])->name('delete-role');
    
    // City Routes
    Route::get('/cities', [CityController::class, 'index'])->name('view-cities');
    Route::get('/create-city', [CityController::class, 'create'])->name('create-city');
    Route::post('/create-city', [CityController::class, 'store'])->name('save-city');
    Route::get('/edit-city/{id}', [CityController::class, 'edit'])->name('edit-city');
    Route::get('/delete-city/{id}', [CityController::class, 'destroy'])->name('delete-city');

    // Department Routes
    Route::get('/departments', [DepartmentController::class, 'index'])->name('view-departments');
    Route::get('/create-department', [DepartmentController::class, 'create'])->name('create-department');
    Route::post('/create-department', [DepartmentController::class, 'store'])->name('save-department');
    Route::get('/edit-department/{id}', [DepartmentController::class, 'edit'])->name('edit-department');
    Route::get('/delete-department/{id}', [DepartmentController::class, 'destroy'])->name('delete-department');

    // Designation Routes
    Route::get('/designations', [DesignationController::class, 'index'])->name('view-designations');
    Route::get('/create-designation', [DesignationController::class, 'create'])->name('create-designation');
    Route::post('/create-designation', [DesignationController::class, 'store'])->name('save-designation');
    Route::get('/edit-designation/{id}', [DesignationController::class, 'edit'])->name('edit-designation');
    Route::get('/delete-designation/{id}', [DesignationController::class, 'destroy'])->name('delete-designation');
});
