@vite(['resources/css/app.css', 'resources/js/app.js'])

<div class="min-h-screen bg-gray-50 px-4 py-8 sm:px-6 lg:px-8">


<div class="mx-auto max-w-7xl">

    {{-- Header --}}
    <div class="mb-8 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
        <div>
            <h1 class="text-2xl font-bold tracking-tight text-gray-900">
                {{ $title }}
            </h1>

            <p class="mt-1 text-sm text-gray-500">
                Quản lý danh sách sản phẩm trong hệ thống
            </p>
        </div>

        @if(auth()->user()->role === 'admin')
        <a href="{{ route('products.create') }}"
           class="inline-flex items-center justify-center gap-2 rounded-lg bg-indigo-600 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2">

            <svg xmlns="http://www.w3.org/2000/svg"
                 class="h-5 w-5"
                 fill="none"
                 viewBox="0 0 24 24"
                 stroke="currentColor">
                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 4v16m8-8H4"/>
            </svg>

            Thêm sản phẩm
        </a>
        @endif
    </div>


    {{-- Bộ lọc --}}
    <div class="mb-6 rounded-xl border border-gray-200 bg-white p-5 shadow-sm">

        <form method="GET"
              action="{{ url()->current() }}"
              class="grid grid-cols-1 gap-4 md:grid-cols-12">

            {{-- Tìm kiếm --}}
            <div class="md:col-span-5">
                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Tìm kiếm sản phẩm
                </label>

                <div class="relative">

                    <div class="pointer-events-none absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg xmlns="http://www.w3.org/2000/svg"
                             class="h-5 w-5 text-gray-400"
                             fill="none"
                             viewBox="0 0 24 24"
                             stroke="currentColor">
                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 1 6.04 6.04a7.5 7.5 0 0 1 10.61 10.61Z"/>
                        </svg>
                    </div>

                    <input
                        type="text"
                        name="keyword"
                        value="{{ $keyword }}"
                        placeholder="Nhập tên sản phẩm..."
                        class="w-full rounded-lg border border-gray-300 bg-white py-2.5 pl-10 pr-4 text-sm text-gray-900 outline-none transition placeholder:text-gray-400 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100"
                    >

                </div>
            </div>


            {{-- Danh mục --}}
            <div class="md:col-span-4">
                <label class="mb-2 block text-sm font-medium text-gray-700">
                    Danh mục
                </label>

                <select
                    name="category_id"
                    class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2.5 text-sm text-gray-700 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100">

                    <option value="">
                        -- Tất cả danh mục --
                    </option>

                    @foreach($categories as $cat)

                        <option
                            value="{{ $cat->id }}"
                            {{ $categoryId == $cat->id ? 'selected' : '' }}>

                            {{ $cat->name }}

                        </option>

                    @endforeach

                </select>
            </div>


            {{-- Nút lọc --}}
            <div class="flex items-end md:col-span-3">

                <button
                    type="submit"
                    class="w-full rounded-lg bg-gray-900 px-5 py-2.5 text-sm font-semibold text-white transition hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2">

                    Lọc dữ liệu

                </button>

            </div>

        </form>


        {{-- Xóa bộ lọc --}}
        @if($keyword || $categoryId)

            <div class="mt-4 border-t border-gray-100 pt-4">

                <a
                    href="{{ url()->current() }}"
                    class="inline-flex items-center gap-2 text-sm font-medium text-red-600 transition hover:text-red-700">

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="h-4 w-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M6 18 18 6M6 6l12 12"/>

                    </svg>

                    Xóa lọc

                </a>

            </div>

        @endif

    </div>


    {{-- Bảng sản phẩm --}}
    <div class="overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm">

        <div class="overflow-x-auto">

            <table class="min-w-full divide-y divide-gray-200">

                <thead class="bg-gray-50">

                    <tr>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            ID
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Danh mục
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Tên sản phẩm
                        </th>

                        <th
                            class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Giá
                        </th>

                        <th
                            class="px-6 py-4 text-right text-xs font-semibold uppercase tracking-wider text-gray-500">
                            Hành động
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-gray-100 bg-white">

                    @forelse ($products as $item)

                        <tr class="transition hover:bg-gray-50">

                            {{-- ID --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="inline-flex rounded-md bg-gray-100 px-2.5 py-1 text-xs font-semibold text-gray-700">

                                    #{{ $item->id }}

                                </span>

                            </td>


                            {{-- Danh mục --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                @if($item->category)

                                    <span class="inline-flex rounded-full bg-indigo-50 px-3 py-1 text-xs font-medium text-indigo-700">

                                        {{ $item->category->name }}

                                    </span>

                                @else

                                    <span class="text-sm text-gray-400">
                                        Chưa phân loại
                                    </span>

                                @endif

                            </td>


                            {{-- Tên --}}
                            <td class="px-6 py-4">

                                <div class="text-sm font-semibold text-gray-900">
                                    {{ $item->name }}
                                </div>

                            </td>


                            {{-- Giá --}}
                            <td class="whitespace-nowrap px-6 py-4">

                                <span class="text-sm font-semibold text-gray-900">
                                    {{ number_format($item->price) }}
                                </span>

                                <span class="text-xs text-gray-500">
                                    VNĐ
                                </span>

                            </td>


                            {{-- Hành động --}}
                            <td class="whitespace-nowrap px-6 py-4 text-right">

                                @if(auth()->user()->role === 'admin')
                                <a
                                    href="{{ route('products.edit', $item->id) }}"
                                    class="inline-flex items-center gap-1.5 rounded-lg border border-indigo-200 bg-indigo-50 px-3 py-2 text-sm font-medium text-indigo-700 transition hover:bg-indigo-600 hover:text-white">

                                    <svg xmlns="http://www.w3.org/2000/svg"
                                         class="h-4 w-4"
                                         fill="none"
                                         viewBox="0 0 24 24"
                                         stroke="currentColor">

                                        <path stroke-linecap="round"
                                              stroke-linejoin="round"
                                              stroke-width="2"
                                              d="M16.862 3.487a2.1 2.1 0 0 1 2.97 2.97L7.5 18.79 3 20l1.21-4.5L16.862 3.487Z"/>

                                    </svg>

                                    Sửa

                                </a>
                                @endif
                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td colspan="5" class="px-6 py-16 text-center">

                                <div class="flex flex-col items-center justify-center">

                                    <div class="mb-4 flex h-16 w-16 items-center justify-center rounded-full bg-gray-100">

                                        <svg xmlns="http://www.w3.org/2000/svg"
                                             class="h-8 w-8 text-gray-400"
                                             fill="none"
                                             viewBox="0 0 24 24"
                                             stroke="currentColor">

                                            <path stroke-linecap="round"
                                                  stroke-linejoin="round"
                                                  stroke-width="2"
                                                  d="m21 21-4.35-4.35m0 0A7.5 7.5 0 1 1 6.04 6.04a7.5 7.5 0 0 1 10.61 10.61Z"/>

                                        </svg>

                                    </div>

                                    <h3 class="text-base font-semibold text-gray-900">
                                        Không tìm thấy sản phẩm
                                    </h3>

                                    <p class="mt-1 text-sm text-gray-500">
                                        Không có sản phẩm nào phù hợp với điều kiện tìm kiếm.
                                    </p>

                                </div>

                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        {{-- Pagination --}}
        @if($products->hasPages())

            <div class="border-t border-gray-200 bg-white px-4 py-4 sm:px-6">

                <div class="flex flex-col items-center justify-between gap-4 sm:flex-row">

                    <div class="text-sm text-gray-500">

                        Hiển thị

                        <span class="font-semibold text-gray-900">
                            {{ $products->firstItem() ?? 0 }}
                        </span>

                        đến

                        <span class="font-semibold text-gray-900">
                            {{ $products->lastItem() ?? 0 }}
                        </span>

                        trong tổng số

                        <span class="font-semibold text-gray-900">
                            {{ $products->total() }}
                        </span>

                        sản phẩm

                    </div>


                    <div>
                        {{ $products->withQueryString()->links() }}
                    </div>

                </div>

            </div>

        @endif

    </div>

</div>
```

</div>
