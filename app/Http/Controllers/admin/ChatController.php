<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\User;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    // LIST USER + CHAT
    public function index()
    {
        $users = User::whereHas('messages')
            ->withCount([
                'messages as unread_count' => function ($q) {
                    $q->where('sender', 'user')
                      ->where('is_read', false);
                }
            ])
            ->get();

        return view('admin.chat.index', [
            'users' => $users,
            'activeUser' => null,
            'messages' => [],
        ]);
    }

    // BUKA CHAT USER
    public function show($userId)
    {

        $users = User::whereHas('messages')->get();

        $activeUser = User::findOrFail($userId);

        $messages = Message::where('user_id', $userId)
            ->orderBy('created_at', 'asc')
            ->get();

        // tandai pesan user sudah dibaca
        Message::where('user_id', $userId)
            ->where('sender', 'user')
            ->where('is_read', false)
            ->update(['is_read' => true]);

        return view('admin.chat.show', [
            'users' => $users,
            'activeUser' => $activeUser,
            'messages' => $messages,
        ]);
    }

    // KIRIM PESAN ADMIN
    public function send(Request $request, $userId)
    {
        $request->validate([
            'message' => 'required|string'
        ]);

        Message::create([
            'user_id' => $userId,
            'sender'  => 'admin',
            'message' => $request->message,
            'is_read' => true,
        ]);

        return redirect('/admin/chat/'.$userId);
    }
}
