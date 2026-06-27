<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Iphone;

class ProductController extends Controller
{
    public function show($id)
    {
        $iphone = Iphone::findOrFail($id);

        return view('product.detail', compact('iphone'));
    }
}