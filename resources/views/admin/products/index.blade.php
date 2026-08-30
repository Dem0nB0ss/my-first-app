@extends('layouts.admin')

@section('title', 'Products')

@section('page-title', 'Products')


@section('content')

<div class="mb-6">

    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>

            <h2 class="text-2xl font-bold text-slate-900">
                Products
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Quản lý tất cả sản phẩm của website.
            </p>

        </div>


        <a
            href="{{ route('admin.products.create') }}"
            class="admin-btn-primary"
        >
            + Add Product
        </a>

    </div>

</div>


{{-- Filters --}}

<div class="admin-card mb-6 p-4">

    <form
        action="{{ route('admin.products.index') }}"
        method="GET"
        class="flex flex-col gap-3 md:flex-row"
    >

        {{-- Search --}}

        <div class="flex-1">

            <input
                type="text"
                name="search"
                value="{{ request('search') }}"
                placeholder="Tìm kiếm sản phẩm..."
                class="admin-input"
            >

        </div>


        {{-- Status --}}

        <div>

            <select
                name="status"
                class="admin-input"
            >

                <option value="">
                    Tất cả trạng thái
                </option>

                <option
                    value="1"
                    @selected(request('status') === '1')
                >
                    Đang bán
                </option>

                <option
                    value="0"
                    @selected(request('status') === '0')
                >
                    Ngừng bán
                </option>

            </select>

        </div>


        <button
            type="submit"
            class="admin-btn-primary"
        >
            Tìm kiếm
        </button>


        @if(request()->hasAny(['search', 'status']))

            <a
                href="{{ route('admin.products.index') }}"
                class="admin-btn-secondary"
            >
                Reset
            </a>

        @endif

    </form>

</div>


{{-- Products table --}}

<div class="admin-card overflow-hidden">


    {{-- Header --}}

    <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

        <div>

            <h3 class="font-semibold text-slate-900">
                All Products
            </h3>

            <p class="mt-1 text-xs text-slate-500">
                {{ $products->total() }} sản phẩm
            </p>

        </div>

    </div>


    {{-- Table --}}

    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-slate-200">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Product
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Price
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Stock
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Status
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Created
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                        Action
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100 bg-white">

                @forelse($products as $product)

                    <tr class="transition hover:bg-slate-50">


                        {{-- Product --}}

                        <td class="px-6 py-4">

                            <div class="flex items-center gap-4">

                                {{-- Image --}}

                                @if($product->image)

                                    <img
                                        src="{{ asset('storage/' . $product->image) }}"
                                        alt="{{ $product->name }}"
                                        class="h-12 w-12 rounded-lg object-cover"
                                    >

                                @else

                                    <div class="flex h-12 w-12 items-center justify-center rounded-lg bg-slate-100 text-slate-400">

                                        <svg
                                            class="h-6 w-6"
                                            fill="none"
                                            stroke="currentColor"
                                            viewBox="0 0 24 24"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"
                                            />
                                        </svg>

                                    </div>

                                @endif


                                <div>

                                    <div class="font-semibold text-slate-800">
                                        {{ $product->name }}
                                    </div>

                                    <div class="mt-1 text-xs text-slate-400">
                                        #{{ $product->id }}
                                    </div>

                                </div>

                            </div>

                        </td>


                        {{-- Price --}}

                        <td class="px-6 py-4">

                            <span class="font-medium text-slate-800">

                                {{ number_format($product->price, 0, ',', '.') }} ₫

                            </span>

                        </td>


                        {{-- Stock --}}

                        <td class="px-6 py-4">

                            @if($product->quantity > 0)

                                <span class="text-sm text-slate-700">
                                    {{ $product->quantity }}
                                </span>

                            @else

                                <span class="text-sm font-medium text-red-600">
                                    Hết hàng
                                </span>

                            @endif

                        </td>


                        {{-- Status --}}

                        <td class="px-6 py-4">

                            @if($product->status)

                                <span class="rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-medium text-emerald-700">
                                    Active
                                </span>

                            @else

                                <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-500">
                                    Inactive
                                </span>

                            @endif

                        </td>


                        {{-- Created --}}

                        <td class="px-6 py-4 text-sm text-slate-500">

                            {{ $product->created_at?->format('d/m/Y') }}

                        </td>


                        {{-- Actions --}}

                        <td class="px-6 py-4 text-right">

                            <a
                                href="{{ route('admin.products.edit', $product) }}"
                                class="mr-3 text-sm font-medium text-indigo-600 hover:text-indigo-800"
                            >
                                Edit
                            </a>


                            <form
                                action="{{ route('admin.products.destroy', $product) }}"
                                method="POST"
                                class="inline"
                            >

                                @csrf

                                @method('DELETE')

                                <button
                                    type="submit"
                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
                                    class="text-sm font-medium text-red-600 hover:text-red-800"
                                >
                                    Delete
                                </button>

                            </form>

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td
                            colspan="6"
                            class="px-6 py-16 text-center"
                        >

                            <div class="text-slate-400">

                                <svg
                                    class="mx-auto h-12 w-12"
                                    fill="none"
                                    stroke="currentColor"
                                    viewBox="0 0 24 24"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="1.5"
                                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                                    />
                                </svg>


                                <p class="mt-3 font-medium text-slate-600">
                                    Chưa có sản phẩm
                                </p>

                                <p class="mt-1 text-sm">
                                    Hãy thêm sản phẩm đầu tiên.
                                </p>


                                <a
                                    href="{{ route('admin.products.create') }}"
                                    class="mt-4 inline-flex text-sm font-medium text-indigo-600 hover:text-indigo-800"
                                >
                                    + Thêm sản phẩm
                                </a>

                            </div>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    {{-- Pagination --}}

    @if($products->hasPages())

        <div class="border-t border-slate-200 px-6 py-4">

            {{ $products->links() }}

        </div>

    @endif

</div>

@endsection
