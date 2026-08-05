<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product; // 👈 Import Model Product vào Controller

class ProductController extends Controller
{
    public function index()
    {
       $title = "Danh sách sản phẩm từ Database";
        
        // Eloquent ORM: Lấy toàn bộ sản phẩm trong bảng products
        $products = Product::all();

        return view('products.index', compact('title', 'products'));
    }

    public function show($id) {
        return "Đang xem chi tiết sản phẩm ID: " . $id;
    }

    // 1. Hiển thị form thêm mới
    public function create() {
        return view('products.create');
    }

    // 2. Xử lý nhận dữ liệu từ Form và lưu vào DB
    public function store(Request $request) {
        // Kiểm tra dữ liệu
        $validatedData = $request->validate([
            'name'  => 'required|min:3|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        // Lưu vào Database thông qua Eloquent Model
        Product::create($validatedData);

        // Chuyển hướng người dùng về trang danh sách sản phẩm
        return redirect('/products');
    }

    // 1. Hiển thị Form sửa sản phẩm
    public function edit($id)
    {
        $product = Product::findOrFail($id); // Tìm sản phẩm theo ID, nếu không thấy sẽ trả về lỗi 404
        return view('products.edit', compact('product'));
    }

    // 2. Lưu thông tin sản phẩm sau khi sửa
    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validatedData = $request->validate([
            'name'  => 'required|min:3|max:255',
            'price' => 'required|numeric|min:0',
            'stock' => 'required|integer|min:0',
        ]);

        $product->update($validatedData);

        return redirect('/products');
    }

    // 3. Xóa sản phẩm
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect('/products');
    }
}
