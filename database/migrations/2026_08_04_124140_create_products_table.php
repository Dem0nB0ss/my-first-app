<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Tự động tạo khóa chính id (Auto Increment)
            $table->string('name'); // Cột name kiểu VARCHAR(255)
            $table->foreignId('category_id')->constrained(); //Khóa ngoại category id
            $table->decimal('price', 10, 2); // Cột price kiểu số thực
            $table->integer('stock')->default(0); // Cột số lượng tồn kho, mặc định là 0
            $table->timestamps(); // Tự động tạo 2 cột: created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
