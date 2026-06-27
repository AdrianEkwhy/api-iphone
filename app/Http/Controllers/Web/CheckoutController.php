<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);

        $total = collect($cart)->sum(function ($item) {
            return $item['harga'] * $item['qty'];
        });

        return view('checkout.index', compact('cart', 'total'));
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->route('cart.index');
        }

        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'metode_pembayaran' => 'required|string',
        ]);

        $total = collect($cart)->sum(function ($item) {
            return $item['harga'] * $item['qty'];
        });

        $order = Order::create([
            'user_id' => auth()->id(),
            'nama' => $request->nama,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'metode_pembayaran' => $request->metode_pembayaran,
            'total' => $total,
            'status' => 'pending',
        ]);

        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'iphone_id' => $item['id'],
                'nama_produk' => $item['nama'],
                'storage' => $item['storage'],
                'harga' => $item['harga'],
                'qty' => $item['qty'],
                'subtotal' => $item['harga'] * $item['qty'],
            ]);
        }

        session()->forget('cart');

        return redirect()->route('orders.index')
            ->with('success', 'Pesanan berhasil dibuat.');
    }

    public function payment(Order $order)
    {
        return view('checkout.payment', compact('order'));
    }
}