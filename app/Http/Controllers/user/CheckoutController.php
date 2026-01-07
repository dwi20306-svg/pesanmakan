<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CheckoutController extends Controller
{
    public function store()
    {
        $cart = Session::get('cart', []);

        if (empty($cart)) {
            return redirect('/order')->with('error', 'Keranjang kosong');
        }

        foreach ($cart as $item) {

            // AMBIL MENU DARI DATABASE
            $menu = Menu::findOrFail($item['id']);

            OrderItem::create([
                'user_id'   => Auth::id(),
                'menu_id'   => $menu->id,
                'nama_menu' => $menu->nama_menu, // 🔥 FIX UTAMA
                'harga'     => $menu->harga,
                'qty'       => $item['qty'],
                'subtotal'  => $menu->harga * $item['qty'],
                'status'    => 'pending',
            ]);
        }

        // KOSONGKAN CART
        Session::forget('cart');

        return redirect('/dashboard')->with('success', 'Pesanan berhasil dibuat');
    }
}
