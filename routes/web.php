<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Admin\MenuController;
use App\Http\Controllers\user\MenuUserController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\user\UserChatController;
use App\Http\Controllers\user\CartController;
use App\Http\Controllers\user\DashboardController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\user\ProfileController;

// LOGIN
Route::get('/', [AuthController::class, 'showLogin'])->name('login');
Route::post('/', [AuthController::class, 'login']);

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// Dashboard Admin
Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])
    ->name('admin.dashboard');

Route::get('/tambah_menu', [MenuController::class, 'create']);
Route::post('/tambah_menu', [MenuController::class, 'store']);

// Chat User (Admin)
    Route::get('/admin/chat', [ChatController::class, 'index']);
    Route::get('/admin/chat/{user}', [ChatController::class, 'show']);
    Route::post('/admin/chat/{user}', [ChatController::class, 'send']);

// Kelola User (Admin)
Route::get('/admin/users', [UserController::class, 'index'])
    ->name('admin.users.index');

Route::get('/admin/users/{user}', [UserController::class, 'show'])
    ->name('admin.users.show');

Route::patch('/admin/users/{user}/toggle', [UserController::class, 'toggleStatus'])
    ->name('admin.users.toggle');

Route::get('/neworder/new_order', [OrderController::class, 'index'])
    ->name('admin.neworder');




/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/

// Dashboard User
Route::get('/dashboard', [\App\Http\Controllers\User\DashboardController::class, 'index'])
    ->name('user.dashboard');

// Profil User
Route::get('/profil', function () {
    return view('profil.profil');
})->name('user.profil');
    Route::put('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

// Menu (User)
Route::get('/menu', [MenuUserController::class, 'index']);

// Order (User)
Route::post('/cart/add/{menu}', [CartController::class, 'add'])->name('cart.add');
Route::get('/order', [CartController::class, 'index'])->name('order.index');
Route::post('/cart/remove/{menu}', [CartController::class, 'remove'])->name('cart.remove');

// Chat User
    Route::get('/chat', [UserChatController::class, 'index']);
    Route::post('/chat', [UserChatController::class, 'send']);

Route::post('/checkout', [CheckoutController::class, 'store'])
    ->name('checkout');

