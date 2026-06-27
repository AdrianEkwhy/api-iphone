<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Iphone;
use App\Models\Order;
use App\Models\User;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalProducts = Iphone::count();
        $totalOrders = Order::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalRevenue = Order::sum('total');

        return view('admin.dashboard', compact(
            'totalProducts',
            'totalOrders',
            'totalUsers',
            'totalRevenue'
        ));
    }
}