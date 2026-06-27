<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Iphone;

class CartController extends Controller

{
    public function index()
    {
        $cart = session()->get('cart', []);

        return view('cart.index', compact('cart'));
    }

    public function add($id)
    {
        $iphone = Iphone::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        } else {
            $cart[$id] = [
                'id' => $iphone->id,
                'nama' => $iphone->nama,
                'storage' => $iphone->storage,
                'harga' => $iphone->harga,
                'qty' => 1,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }

    public function remove($id)
    {
        $cart = session()->get('cart', []);

        unset($cart[$id]);

        session()->put('cart', $cart);

        return redirect()->route('cart.index');
    }
}