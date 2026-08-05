@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="mx-auto mt-10 max-w-2xl rounded-xl border border-gray-200 bg-white p-8 shadow-lg">
    <!-- ✅ Sửa tiêu đề cho đúng ngữ cảnh Edit -->
    <h2 class="mb-6 text-3xl font-bold text-gray-800">
        Cập nhật sản phẩm
    </h2>

    <form action="/products/{{ $product->id }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Tên sản phẩm -->
        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                Tên sản phẩm:
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $product->name) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="Nhập tên sản phẩm">

            @error('name')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Giá sản phẩm -->
        <div>
            <label for="price" class="mb-2 block text-sm font-semibold text-gray-700">
                Giá sản phẩm (VNĐ):
            </label>

            <input
                type="number"
                id="price"
                name="price"
                value="{{ old('price', $product->price) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="Ví dụ: 1500000">

            @error('price')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Số lượng tồn kho -->
        <div>
            <label for="stock" class="mb-2 block text-sm font-semibold text-gray-700">
                Số lượng tồn kho:
            </label>

            <input
                type="number"
                id="stock"
                name="stock"
                /* ✅ Sửa dấu đóng ngoặc của hàm old() */
                value="{{ old('stock', $product->stock) }}"
                class="w-full rounded-lg border border-gray-300 px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="Ví dụ: 100">

            @error('stock')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Nút lưu -->
        <div class="pt-4">
            <button
                type="submit"
                class="w-full rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700">
                Cập nhật
            </button>
        </div>
    </form>
</div>