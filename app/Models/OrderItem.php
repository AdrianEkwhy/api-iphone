<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'iphone_id',
        'nama_produk',
        'storage',
        'harga',
        'qty',
        'subtotal',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public function iphone()
    {
        return $this->belongsTo(Iphone::class);
    }
}