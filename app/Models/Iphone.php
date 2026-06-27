<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Iphone extends Model
{
	protected $fillable = ['nama', 'storage', 'harga', 'stok', 'image_url'];
}