<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Iphone;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index()
    {
        $iphones = Iphone::latest()->get();

        return view('catalog.index', compact('iphones'));
    }
}