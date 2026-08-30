<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    /**
     * Danh sách sản phẩm
     */
    public function index(Request $request)
    {
        $query = Product::with('category');

        // Tìm kiếm theo tên sản phẩm
        if ($request->filled('keyword')) {
            $keyword = $request->keyword;

            $query->where('name', 'LIKE', "%{$keyword}%");
        }

        // Lọc theo danh mục
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        // Phân trang và giữ query string
        $products = $query
            ->latest()
            ->paginate(10)
            ->withQueryString();

        // Danh sách category
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.products.index',
            compact('products', 'categories')
        );
    }


    /**
     * Form thêm sản phẩm
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.products.create',
            compact('categories')
        );
    }


    /**
     * Lưu sản phẩm
     */
    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'category_id' => 'required|exists:categories,id',

                'name' => 'required|string|min:3|max:255',

                'price' => 'required|numeric|min:0',

                'stock' => 'required|integer|min:0',
            ],
            [
                'category_id.required' =>
                    'Vui lòng chọn danh mục sản phẩm!',

                'category_id.exists' =>
                    'Danh mục được chọn không hợp lệ!',

                'name.required' =>
                    'Vui lòng nhập tên sản phẩm!',

                'name.min' =>
                    'Tên sản phẩm phải có ít nhất 3 ký tự!',

                'price.required' =>
                    'Vui lòng nhập giá sản phẩm!',

                'price.numeric' =>
                    'Giá sản phẩm phải là số!',

                'stock.required' =>
                    'Vui lòng nhập số lượng!',

                'stock.integer' =>
                    'Số lượng phải là số nguyên!',
            ]
        );

        Product::create($validated);

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Thêm sản phẩm thành công!'
            );
    }


    /**
     * Xem chi tiết
     */
    public function show(Product $product)
    {
        $product->load('category');

        return view(
            'admin.products.show',
            compact('product')
        );
    }


    /**
     * Form sửa sản phẩm
     */
    public function edit(Product $product)
    {
        $categories = Category::orderBy('name')->get();

        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
    }


    /**
     * Cập nhật sản phẩm
     */
    public function update(
        Request $request,
        Product $product
    ) {
        $validated = $request->validate(
            [
                'category_id' => 'required|exists:categories,id',

                'name' => 'required|string|min:3|max:255',

                'price' => 'required|numeric|min:0',

                'stock' => 'required|integer|min:0',
            ],
            [
                'category_id.required' =>
                    'Vui lòng chọn danh mục sản phẩm!',

                'category_id.exists' =>
                    'Danh mục được chọn không hợp lệ!',

                'name.required' =>
                    'Vui lòng nhập tên sản phẩm!',

                'name.min' =>
                    'Tên sản phẩm phải có ít nhất 3 ký tự!',

                'price.required' =>
                    'Vui lòng nhập giá sản phẩm!',

                'price.numeric' =>
                    'Giá sản phẩm phải là số!',

                'stock.required' =>
                    'Vui lòng nhập số lượng!',

                'stock.integer' =>
                    'Số lượng phải là số nguyên!',
            ]
        );

        $product->update($validated);

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Cập nhật sản phẩm thành công!'
            );
    }


    /**
     * Xóa sản phẩm
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()
            ->route('admin.products.index')
            ->with(
                'success',
                'Xóa sản phẩm thành công!'
            );
    }
}