<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    // 6. Profil User (/profil)
    public function index()
    {
        // Di sini Anda akan mengambil data profil user yang sedang login
        return view('profil.index');
    }

    // Anda mungkin juga ingin menambahkan metode untuk POST (update) di sini
    // public function update(Request $request)
    // {
    //     // Logika untuk mengupdate data profil
    // }
}