<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category; // 👈 Import Model Category


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Chèn 3 sản phẩm thực tế vào DB bằng Eloquent Model
        Category::create([
            'id' => 1,
            'name' => "Bàn phím"
        ]);

        Category::create([
            'id' => 2,
            'name' => "Chuột"
        ]);

        Category::create([
            'id' => 3,
            'name' => "Màn hình"
        ]);
    }
}
