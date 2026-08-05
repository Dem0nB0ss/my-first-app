<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    // Hàm tạo đơn hàng thử nghiệm và đính kèm sản phẩm
    public function demoCreate()
    {
        // 1. Tạo đơn hàng mới
        $order = Order::create([
            'customer_name' => 'Nguyễn Văn A',
            'total_amount' => 0,
        ]);

        // 2. Gắn sản phẩm id = 1 và id = 2 vào đơn hàng (dùng attach)
        $product1 = Product::find(1);
        $product2 = Product::find(2);

        if ($product1 && $product2) {
            $order->products()->attach([
                $product1->id => ['quantity' => 2, 'price' => $product1->price],
                $product2->id => ['quantity' => 1, 'price' => $product2->price],
            ]);

            // Tính tổng tiền đơn hàng
            $total = ($product1->price * 2) + ($product2->price * 1);
            $order->update(['total_amount' => $total]);
        }

        return redirect('/orders/' . $order->id);
    }

    // Xem chi tiết đơn hàng
    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('orders.show', compact('order'));
    }
}
