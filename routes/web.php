<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| ADMIN ROUTES
|--------------------------------------------------------------------------
*/

// Dashboard Admin
Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// Tambah Menu (Admin)
Route::get('/admin/menu/tambah', function () {
    return view('admin.tambah_menu');
});

// New Order (Admin)
Route::get('/admin/order/new', function () {
    return view('admin.new_order');
});


/*
|--------------------------------------------------------------------------
| USER ROUTES
|--------------------------------------------------------------------------
*/

// Dashboard User
Route::get('/', function () {
    return view('user.index');
});

// Profil User
Route::get('/profil', function () {
    return view('profil.profil');
});

// Menu (User)
Route::get('/menu', function () {
    return view('menu.index');
});

// Order (User)
Route::get('/order', function () {
    return view('order.order');
});
