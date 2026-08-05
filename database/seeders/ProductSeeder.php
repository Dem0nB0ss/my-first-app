<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product; // 👈 Import Model Product


class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Chèn 3 sản phẩm thực tế vào DB bằng Eloquent Model
        Product::create([
            'name' => 'Bàn phím cơ Akko',
            'category_id' => 1,
            'price' => 1250000,
            'stock' => 10
        ]);

        Product::create([
            'name' => 'Chuột Logitech G102',
            'category_id' => 2,
            'price' => 420000,
            'stock' => 25
        ]);

        Product::create([
            'name' => 'Màn hình Dell UltraSharp 27 inch',
            'category_id' => 3,
            'price' => 8900000,
            'stock' => 5
        ]);
    }
}
