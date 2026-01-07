<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function index()
    {
        $orders = OrderItem::select(
                'user_id',
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('SUM(subtotal) as total'),
                'status'
            )
            ->with('user')
            ->groupBy('user_id', 'tanggal', 'status')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('admin.neworder.new_order', compact('orders'));
    }
}
