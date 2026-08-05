<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// Cú pháp: Route::phuongThuc('/url', [TenController::class, 'tenMethod']);  
// Route::get('/products', [ProductController::class, 'index']);
// Route::get('/products/{id}', [ProductController::class, 'show']);

// // Route hiển thị Form thêm sản phẩm
// Route::get('/products/create', [ProductController::class, 'create']);

// // Route xử lý Lưu dữ liệu (Phương thức POST)
// Route::post('/products', [ProductController::class, 'store']);

// // Route xử lý edit, update, delete
// Route::get('/products/{id}/edit', [ProductController::class, 'edit']);
// Route::put('/products/{id}', [ProductController::class, 'update']);
// Route::delete('/products/{id}', [ProductController::class, 'destroy']);

// ✅ Tuyệt chiêu rút gọn (1 dòng thay cho 7 dòng):
Route::resource('products', ProductController::class);

Route::get('/', function () {
    return view('welcome');
});

Route::get('/orders/demo', [OrderController::class, 'demoCreate']);
Route::get('/orders/{id}', [OrderController::class, 'show']);