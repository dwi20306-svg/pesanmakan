<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // 2. Dashboard User (/dashboard)
    public function dashboard()
    {
        // Di sini Anda akan mengambil ringkasan data user (misalnya, pesanan terakhir)
        return view('user.dashboard');
    }

    // 3. Menu (/menu)
    public function menu()
    {
        // Di sini Anda akan mengambil semua daftar menu
        return view('menu.index');
    }

    // 5. Order (/order)
    public function order()
    {
        // Di sini Anda akan mengambil riwayat pesanan user
        return view('order.index');
    }
}