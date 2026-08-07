@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-lg">
    <div class="flex items-center justify-between border-b px-6 py-4">
        <h1 class="text-xl font-bold text-gray-800">
            {{ $title }}
        </h1>

        <a href="/products/create"
           class="rounded-lg bg-blue-600 px-4 py-2 font-medium text-white transition hover:bg-blue-700">
            + Thêm sản phẩm
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full">
            <thead class="bg-gray-100">
                <tr class="text-left text-sm uppercase tracking-wider text-gray-600">
                    <th class="px-6 py-4">ID</th>
                    <th class="px-6 py-4">Danh mục</th> <!-- ✅ Hiển thị tên danh mục -->
                    <th class="px-6 py-4">Tên sản phẩm</th>
                    <th class="px-6 py-4">Giá</th>
                    <th class="px-6 py-4 text-center">Hành động</th>
                </tr>
            </thead>

            <tbody class="divide-y divide-gray-200 text-gray-700">
                @foreach ($products as $item)
                <tr class="transition hover:bg-gray-50">
                    <td class="px-6 py-4 font-semibold">
                        {{ $item->id }} 
                    </td>

                    <!-- ✅ 1. Gọi Relationship $item->category->name thay vì chỉ hiện ID -->
                    <td class="px-6 py-4">
                        <span class="inline-flex items-center rounded-md bg-blue-50 px-2.5 py-0.5 text-xs font-medium text-blue-700 ring-1 ring-inset ring-blue-700/10">
                            {{ $item->category->name ?? 'Chưa phân loại' }}
                        </span>
                    </td>

                    <td class="px-6 py-4 font-medium text-gray-900">
                        {{ $item->name }}
                    </td>

                    <td class="px-6 py-4 font-bold text-green-600">
                        {{ number_format($item->price) }} VNĐ
                    </td>

                    <td class="px-6 py-4">
                        <div class="flex justify-center gap-2">

                            <!-- Nút Xem chi tiết -->
                            <a href="/products/{{ $item->id }}"
                               class="rounded-lg bg-sky-500 px-3 py-2 text-sm text-white hover:bg-sky-600 transition">
                                Xem
                            </a>

                            <!-- Nút Sửa -->
                            <a href="/products/{{ $item->id }}/edit"
                               class="rounded-lg bg-yellow-500 px-3 py-2 text-sm text-white hover:bg-yellow-600 transition">
                                Sửa
                            </a>

                            <!-- Nút Xóa -->
                            <form action="/products/{{ $item->id }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này không?')"
                                        class="rounded-lg bg-red-500 px-3 py-2 text-sm text-white hover:bg-red-600 transition">
                                    Xóa
                                </button>
                            </form>

                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>