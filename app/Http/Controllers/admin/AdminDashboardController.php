<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;

class AdminDashboardController extends Controller
{
public function index()
{
    $newOrder = OrderItem::where('status', 'pending')->count();
    $totalOrder = OrderItem::count();
    $waitingList = OrderItem::where('status', 'proses')->count();

    $orders = OrderItem::selectRaw('user_id, COUNT(*) as total, MAX(created_at) as last_order')
        ->with('user')
        ->groupBy('user_id')
        ->orderByDesc('last_order')
        ->get();

    return view('admin.dashboard', compact(
        'newOrder',
        'totalOrder',
        'waitingList',
        'orders'
    ));
}
}
