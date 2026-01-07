<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'user_id',
        'menu_id',
        'nama_menu',
        'harga',
        'qty',
        'subtotal',
        'status',
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}
}
