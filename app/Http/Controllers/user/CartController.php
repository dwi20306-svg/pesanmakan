<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // TAMPIL HALAMAN ORDER
    public function index()
    {
        $cart = session()->get('cart', []);
        $total = 0;

        foreach ($cart as $item) {
            $total += $item['harga'] * $item['qty'];
        }

        return view('order.order', compact('cart', 'total'));
    }

    // TAMBAH MENU KE CART
    public function add(Menu $menu)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$menu->id])) {
            $cart[$menu->id]['qty']++;
        } else {
            $cart[$menu->id] = [
                'id'    => $menu->id,
                'nama'  => $menu->nama,
                'harga' => $menu->harga,
                'foto'  => $menu->foto,
                'qty'   => 1,
            ];
        }

        session()->put('cart', $cart);

        return back()->with('success', 'Menu ditambahkan ke pesanan');
    }

    // HAPUS MENU
    public function remove(Menu $menu)
    {
        $cart = session()->get('cart', []);
        unset($cart[$menu->id]);
        session()->put('cart', $cart);

        return back()->with('success', 'Menu dihapus dari pesanan');
    }
}
