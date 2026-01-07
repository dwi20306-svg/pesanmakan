<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function create()
    {
        return view('admin.tambahmenu.tambah_menu');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'kategori' => 'required',
            'harga' => 'required|numeric',
            'foto' => 'nullable|image|max:2048',
            'status'    => 'nullable',
        ]);

        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('menu', 'public');
        }

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'kategori' => $request->kategori,
            'harga' => $request->harga,
            'deskripsi' => $request->deskripsi,
            'foto' => $fotoPath,
            'is_active' => $request->has('is_active')
        ]);

        return redirect()
    ->back()
    ->with('success', 'Menu berhasil ditambahkan 🎉');
    }
}
