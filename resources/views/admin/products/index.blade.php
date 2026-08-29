@extends('layouts.admin')

@section('title', 'Sản phẩm')
@section('page-title', 'Sản phẩm')

@section('content')

<div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
<div>

    <h2 class="text-2xl font-bold text-slate-900">
        Sản phẩm
    </h2>

    <p class="mt-1 text-sm text-slate-500">
        Quản lý tất cả sản phẩm của cửa hàng.
    </p>

</div>


<a href="{{ route('admin.products.create') }}"
   class="admin-btn-primary">

    <svg class="mr-2 h-4 w-4"
         fill="none"
         stroke="currentColor"
         viewBox="0 0 24 24">

        <path stroke-linecap="round"
              stroke-linejoin="round"
              stroke-width="2"
              d="M12 4v16m8-8H4"/>

    </svg>

    Thêm sản phẩm

</a>

</div> <div class="admin-card overflow-hidden">
{{-- HEADER --}}
<div class="border-b border-slate-200 p-5">

    <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between">

        <div>

            <h3 class="font-semibold text-slate-900">
                Tất cả sản phẩm
            </h3>

            <p class="mt-1 text-xs text-slate-500">
                {{ $products->total() }} sản phẩm
            </p>

        </div>


        <div class="relative w-full md:w-72">

            <input type="text"
                   placeholder="Tìm sản phẩm..."
                   class="admin-input pl-10">

            <svg class="absolute left-3 top-2.5 h-5 w-5 text-slate-400"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M21 21l-4.35-4.35m2.35-5.65a8 8 0 11-16 0 8 8 0 0116 0z"/>

            </svg>

        </div>

    </div>

</div>


{{-- TABLE --}}
<div class="overflow-x-auto">

    <table class="min-w-full divide-y divide-slate-200">

        <thead class="bg-slate-50">

            <tr>

                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                    Sản phẩm
                </th>

                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                    Giá
                </th>

                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                    Kho
                </th>

                <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                    Trạng thái
                </th>

                <th class="px-6 py-3 text-right text-xs font-semibold uppercase tracking-wider text-slate-500">
                    Thao tác
                </th>

            </tr>

        </thead>


        <tbody class="divide-y divide-slate-100 bg-white">

            @forelse($products as $product)

                <tr class="transition hover:bg-slate-50">


                    {{-- PRODUCT --}}
                    <td class="whitespace-nowrap px-6 py-4">

                        <div class="flex items-center gap-3">

                            <div class="flex h-11 w-11 items-center justify-center rounded-lg bg-slate-100 text-slate-400">

                                <svg class="h-6 w-6"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m-8-4l8 4m0 0v10"/>

                                </svg>

                            </div>


                            <div>

                                <p class="font-medium text-slate-800">

                                    {{ $product->name }}

                                </p>

                                <p class="text-xs text-slate-500">

                                    #{{ $product->id }}

                                </p>

                            </div>

                        </div>

                    </td>


                    {{-- PRICE --}}
                    <td class="whitespace-nowrap px-6 py-4">

                        <span class="font-semibold text-slate-800">

                            {{ number_format($product->price) }}đ

                        </span>

                    </td>


                    {{-- QUANTITY --}}
                    <td class="whitespace-nowrap px-6 py-4">

                        <span class="text-sm text-slate-600">

                            {{ $product->quantity }}

                        </span>

                    </td>


                    {{-- STATUS --}}
                    <td class="whitespace-nowrap px-6 py-4">

                        @if($product->status)

                            <span class="inline-flex rounded-full bg-emerald-100 px-2.5 py-1 text-xs font-medium text-emerald-700">

                                Đang bán

                            </span>

                        @else

                            <span class="inline-flex rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600">

                                Ngừng bán

                            </span>

                        @endif

                    </td>


                    {{-- ACTION --}}
                    <td class="whitespace-nowrap px-6 py-4 text-right">

                        <a href="{{ route('admin.products.edit', $product) }}"
                           class="mr-2 inline-flex rounded-lg p-2 text-slate-500 hover:bg-indigo-50 hover:text-indigo-600">

                            <svg class="h-5 w-5"
                                 fill="none"
                                 stroke="currentColor"
                                 viewBox="0 0 24 24">

                                <path stroke-linecap="round"
                                      stroke-linejoin="round"
                                      stroke-width="2"
                                      d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.5-9.5a2.121 2.121 0 113 3L12 15l-4 1 1-4 7.5-7.5z"/>

                            </svg>

                        </a>


                        <form action="{{ route('admin.products.destroy', $product) }}"
                              method="POST"
                              class="inline">

                            @csrf

                            @method('DELETE')

                            <button type="submit"
                                    onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')"
                                    class="inline-flex rounded-lg p-2 text-slate-500 hover:bg-red-50 hover:text-red-600">

                                <svg class="h-5 w-5"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6M9 7V4a1 1 0 011-1h4a1 1 0 011 1v3m-8 0h10"/>

                                </svg>

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5"
                        class="px-6 py-16 text-center">

                        <div class="mx-auto max-w-sm">

                            <div class="mx-auto flex h-14 w-14 items-center justify-center rounded-full bg-slate-100">

                                <svg class="h-7 w-7 text-slate-400"
                                     fill="none"
                                     stroke="currentColor"
                                     viewBox="0 0 24 24">

                                    <path stroke-linecap="round"
                                          stroke-linejoin="round"
                                          stroke-width="2"
                                          d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m-8-4l8 4m0 0v10"/>

                                </svg>

                            </div>

                            <h3 class="mt-3 font-semibold text-slate-800">
                                Chưa có sản phẩm
                            </h3>

                            <p class="mt-1 text-sm text-slate-500">
                                Hãy thêm sản phẩm đầu tiên của bạn.
                            </p>

                            <a href="{{ route('admin.products.create') }}"
                               class="admin-btn-primary mt-4">

                                Thêm sản phẩm

                            </a>

                        </div>

                    </td>

                </tr>

            @endforelse

        </tbody>

    </table>

</div>


{{-- PAGINATION --}}
@if($products->hasPages())

    <div class="border-t border-slate-200 px-6 py-4">

        {{ $products->links() }}

    </div>

@endif

</div>

@endsection