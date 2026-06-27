<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Iphone;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $iphones = Iphone::all();
        return view('admin.produk.index', compact('iphones'));
    }
}
