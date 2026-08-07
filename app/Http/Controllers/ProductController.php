<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $title = "Danh sách sản phẩm từ Database";
        
        // ✅ Tối ưu N+1 Query bằng Eager Loading (Dùng hàm with)
        // Dù có 1.000 hay 100.000 sản phẩm thì cũng chỉ chạy đúng 2 câu SQL!
        $products = Product::with('category')->get();

        return view('products.index', compact('title', 'products'));
    }

    // ✅ Dùng Route Model Binding: Tự động inject Product $product (không cần findOrFail)
    public function show(Product $product) {
        return "Đang xem chi tiết sản phẩm: " . $product->name;
    }

    // 1. Hiển thị form thêm mới
    public function create() {
        return view('products.create');
    }

    // 2. Xử lý nhận dữ liệu từ Form và lưu vào DB
    public function store(Request $request) {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id', // Đừng quên validate khóa ngoại category_id nhé!
            'name'        => 'required|min:3|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        Product::create($validatedData);

        return redirect('/products');
    }

    // 1. Hiển thị Form sửa sản phẩm
    public function edit(Product $product)
    {
        // Nhờ Route Model Binding, $product đã tự động được findOrFail() rồi!
        return view('products.edit', compact('product'));
    }

    // 2. Lưu thông tin sản phẩm sau khi sửa
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|min:3|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $product->update($validatedData);

        return redirect('/products');
    }

    // 3. Xóa sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}