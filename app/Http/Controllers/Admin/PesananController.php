<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class PesananController extends Controller
{
    public function index()
    {
        $orders = Order::with('user', 'items')->paginate(10);
        return view('admin.pesanan.index', compact('orders'));
    }
}
