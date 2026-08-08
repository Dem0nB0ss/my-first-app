<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $title = "Danh sách sản phẩm từ Database";

        // 1. Lấy tham số từ URL
        $keyword = $request->input('keyword');
        $categoryId = $request->input('category_id');

        // 2. Khởi tạo Query với Eager Loading
        $query = Product::with('category');

        // 3. Nếu có từ khóa tìm kiếm -> thêm điều kiện WHERE LIKE
        if (!empty($keyword)) {
            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        // 4. Nếu có chọn danh mục -> thêm điều kiện lọc theo category_id
        if (!empty($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        // 5. Phân trang + BẮT BUỘC DÙNG withQueryString() ĐỂ GIỮ LẠI QUERY STRING
        $products = $query->paginate(10)->withQueryString();

        // 6. Lấy danh sách Categories để đổ vào thẻ  tìm kiếm
        $categories = Category::all();

        return view('products.index', compact('title', 'products', 'categories', 'keyword', 'categoryId'));
    }

    // ✅ Dùng Route Model Binding: Tự động inject Product $product (không cần findOrFail)
    public function show(Product $product) {
        return "Đang xem chi tiết sản phẩm: " . $product->name;
    }

    // 1. Hiển thị form thêm mới
    public function create() {
        $categories = Category::all();
        return view('products.create', compact('categories'));
    }

    // 2. Xử lý nhận dữ liệu từ Form và lưu vào DB
    public function store(Request $request) {
        $validated = $request->validate([
            'category_id' => 'required|exists:categories,id', // 👈 Validate khóa ngoại bắt buộc
            'name'        => 'required|min:3|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ], [
            // Custom thông báo lỗi tiếng Việt (nếu thích)
            'category_id.required' => 'Vui lòng chọn danh mục sản phẩm!',
            'category_id.exists'   => 'Danh mục được chọn không hợp lệ!',
        ]);

        Product::create($validated);

        return redirect('/products')->with('success', 'Thêm sản phẩm thành công!');
    }

    // 3. Hiển thị Form Sửa sản phẩm -> Truyền cả Product và danh sách Categories
    public function edit(Product $product)
    {
        // Nhờ Route Model Binding, $product đã tự động được findOrFail() rồi!
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    // 4. Cập nhật thông tin Sản phẩm
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'category_id' => 'required|exists:categories,id',
            'name'        => 'required|min:3|max:255',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:0',
        ]);

        $product->update($validatedData);

        return redirect('/products')->with('success', 'Cập nhật sản phẩm thành công!');
    }

    // 3. Xóa sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect('/products');
    }
}