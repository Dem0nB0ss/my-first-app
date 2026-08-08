@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="mx-auto mt-10 max-w-2xl rounded-xl border border-gray-200 bg-white p-8 shadow-lg">
    <h2 class="mb-6 text-3xl font-bold text-gray-800">
        Cập nhật sản phẩm
    </h2>

    <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <!-- Tên sản phẩm -->
        <div>
            <label for="name" class="mb-2 block text-sm font-semibold text-gray-700">
                Tên sản phẩm <span class="text-red-500">*</span>
            </label>

            <input
                type="text"
                id="name"
                name="name"
                value="{{ old('name', $product->name) }}"
                class="w-full rounded-lg border {{ $errors->has('name') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="Nhập tên sản phẩm"
                required>

            @error('name')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Danh mục sản phẩm -->
        <div>
            <label for="category_id" class="mb-2 block text-sm font-semibold text-gray-700">
                Danh mục sản phẩm <span class="text-red-500">*</span>
            </label>

            <select
                id="category_id"
                name="category_id"
                class="w-full rounded-lg border {{ $errors->has('category_id') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                required>
                <option value="">-- Chọn danh mục --</option>
                @foreach($categories as $category)
                    <option 
                        value="{{ $category->id }}" 
                        {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>

            @error('category_id')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Giá sản phẩm -->
        <div>
            <label for="price" class="mb-2 block text-sm font-semibold text-gray-700">
                Giá sản phẩm (VNĐ) <span class="text-red-500">*</span>
            </label>

            <input
                type="number"
                id="price"
                name="price"
                min="0"
                step="1000"
                value="{{ old('price', $product->price) }}"
                class="w-full rounded-lg border {{ $errors->has('price') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="Ví dụ: 1500000"
                required>

            @error('price')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Số lượng tồn kho -->
        <div>
            <label for="stock" class="mb-2 block text-sm font-semibold text-gray-700">
                Số lượng tồn kho <span class="text-red-500">*</span>
            </label>

            <input
                type="number"
                id="stock"
                name="stock"
                min="0"
                value="{{ old('stock', $product->stock) }}"
                class="w-full rounded-lg border {{ $errors->has('stock') ? 'border-red-500' : 'border-gray-300' }} px-4 py-3 shadow-sm transition focus:border-blue-500 focus:outline-none focus:ring-2 focus:ring-blue-200"
                placeholder="Ví dụ: 100"
                required>

            @error('stock')
                <p class="mt-2 text-sm text-red-500">
                    {{ $message }}
                </p>
            @enderror
        </div>

        <!-- Nút thao tác -->
        <div class="flex items-center justify-end gap-4 pt-4">
            <a 
                href="{{ route('products.index') }}" 
                class="rounded-lg border border-gray-300 px-6 py-3 font-semibold text-gray-700 transition hover:bg-gray-100">
                Hủy bỏ
            </a>

            <button
                type="submit"
                class="rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white transition hover:bg-blue-700 focus:ring-2 focus:ring-blue-300">
                Cập nhật
            </button>
        </div>
    </form>
</div>