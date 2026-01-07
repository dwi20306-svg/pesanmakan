<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\OrderItem;
use App\Models\Message;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        // TOTAL ITEM PESANAN
        $totalOrders = OrderItem::where('user_id', $user->id)->count();

        // PESANAN AKTIF
        $activeOrders = OrderItem::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count();

        // PESAN BELUM DIBACA
        $unreadMessages = Message::where('user_id', $user->id)
            ->where('sender', 'admin')
            ->where('is_read', false)
            ->count();

        // PESANAN TERAKHIR (GROUP BY TANGGAL)
        $lastOrders = OrderItem::select(
                DB::raw('DATE(created_at) as tanggal'),
                DB::raw('SUM(subtotal) as total'),
                'status'
            )
            ->where('user_id', $user->id)
            ->groupBy('tanggal', 'status')
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();

        return view('user.index', compact(
            'user',
            'totalOrders',
            'activeOrders',
            'unreadMessages',
            'lastOrders'
        ));
    }
}
