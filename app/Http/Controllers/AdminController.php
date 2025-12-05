<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 1. Dashboard Admin (/admin/dashboard)
    public function dashboard()
    {
        // Di sini Anda akan mengambil data statistik admin dari database
        return view('admin.dashboard'); 
    }

    // 4. New Order Admin (/admin/order/new)
    public function newOrder()
    {
        // Di sini Anda akan mengambil daftar pesanan baru
        return view('admin.new_order');
    }

    // 7. Tambah Menu Admin (/admin/menu/tambah)
    public function tambahMenu()
    {
        // Di sini Anda akan menampilkan formulir untuk menambah menu
        return view('admin.tambah_menu');
    }
}
