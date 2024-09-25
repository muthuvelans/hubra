<?php
/**
 * Filename: web.php
 * Description: This route file is used url for all pages
 * Date: 25-09-2024
 * Version: 1.0
 */

use App\Http\Controllers\UserController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\DashboardController;




Auth::routes();

use App\Http\Controllers\AuthController;
Route::post('/login', [AuthController::class, 'login'])->name('login');


Route::post('/logout', function () {
    Auth::logout();
    return redirect('/login'); // Redirect to login page after logout
})->name('logout');

Route::get('register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [AuthController::class, 'register']);


// Routes accessible only by admin
Route::middleware(['auth', 'admin'])->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('stores', StoreController::class)->except(['show']);
});

// Routes accessible by authenticated users
Route::middleware(['auth'])->group(function () {
    Route::get('stores/{store}', [StoreController::class, 'show'])->name('stores.show');
});

Route::resource('users', UserController::class);


// Route for Dashboard
Route::get('/home', [DashboardController::class, 'index'])->name('home');

