<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\logoutController;
use App\Http\Controllers\ProfileController;
use Illuminate\Auth\Events\Logout;
use Illuminate\Support\Facades\Route;

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

# The landing  page which covers both the Login and Registration process.
Route::get('/', function () {
    return view('welcome');
});

# Then proceeds to the user's dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

# For setting up or editing the user's Profile portal
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

# The admin middleware and probably the direction routes all fixed into a middleware prefixxer to add as a means of security against hackers.
Route::middleware(['auth', 'admin'])->name('admin.')->prefix('admin')->group(function() {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    Route::resource('/categories', [CategoryController::class]);
    Route::resource('/menus', [MenuController::class]);
    Route::resource('/tables', [TableController::class]);
    Route::resource('/reservations', [ReservationController::class]);
});

require __DIR__.'/auth.php';
