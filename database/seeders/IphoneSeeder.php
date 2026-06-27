<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Iphone;

class IphoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Iphone::create([
            'nama' => 'iPhone 15 Pro',
            'storage' => '256GB',
            'harga' => 16999000,
            'stok' => 10,
        ]);

        Iphone::create([
            'nama' => 'iPhone 15',
            'storage' => '128GB',
            'harga' => 12999000,
            'stok' => 15,
        ]);

        Iphone::create([
            'nama' => 'iPhone 14 Pro',
            'storage' => '512GB',
            'harga' => 14999000,
            'stok' => 8,
        ]);

        Iphone::create([
            'nama' => 'iPhone 14',
            'storage' => '64GB',
            'harga' => 10999000,
            'stok' => 20,
        ]);

        Iphone::create([
            'nama' => 'iPhone 13',
            'storage' => '256GB',
            'harga' => 9999000,
            'stok' => 12,
        ]);
    }
}
