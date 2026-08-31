@extends('layouts.admin')

@section('title', 'Categories')

@section('page-title', 'Categories')

@section('content')

<div class="mx-auto max-w-6xl">

    <div class="mb-6 flex items-center justify-between">

        <div>
            <h2 class="text-2xl font-bold text-slate-900">
                Categories
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Quản lý danh mục sản phẩm.
            </p>
        </div>

        <a
            href="{{ route('admin.categories.create') }}"
            class="admin-btn-primary"
        >
            Add Category
        </a>

    </div>


    @if(session('success'))

        <div class="mb-6 rounded-xl border border-green-200 bg-green-50 p-4">
            <p class="text-sm text-green-700">
                {{ session('success') }}
            </p>
        </div>

    @endif


    @if(session('error'))

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">
            <p class="text-sm text-red-700">
                {{ session('error') }}
            </p>
        </div>

    @endif


    <div class="admin-card overflow-hidden">

        <div class="overflow-x-auto">

            <table class="w-full text-left text-sm">

                <thead class="border-b border-slate-200 bg-slate-50">

                    <tr>

                        <th class="px-6 py-4 font-semibold text-slate-700">
                            #
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-700">
                            Name
                        </th>

                        <th class="px-6 py-4 font-semibold text-slate-700">
                            Products
                        </th>

                        <th class="px-6 py-4 text-right font-semibold text-slate-700">
                            Actions
                        </th>

                    </tr>

                </thead>

                <tbody class="divide-y divide-slate-100">

                    @forelse($categories as $category)

                        <tr class="hover:bg-slate-50">

                            <td class="px-6 py-4 text-slate-500">
                                {{ $categories->firstItem() + $loop->index }}
                            </td>

                            <td class="px-6 py-4 font-medium text-slate-900">
                                {{ $category->name }}
                            </td>

                            <td class="px-6 py-4 text-slate-600">
                                {{ $category->products_count }}
                            </td>

                            <td class="px-6 py-4">

                                <div class="flex justify-end gap-2">

                                    <a
                                        href="{{ route('admin.categories.edit', $category) }}"
                                        class="admin-btn-secondary"
                                    >
                                        Edit
                                    </a>

                                    <form
                                        action="{{ route('admin.categories.destroy', $category) }}"
                                        method="POST"
                                        onsubmit="return confirm('Bạn có chắc muốn xóa danh mục này?')"
                                    >
                                        @csrf
                                        @method('DELETE')

                                        <button
                                            type="submit"
                                            class="admin-btn-danger"
                                        >
                                            Delete
                                        </button>

                                    </form>

                                </div>

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="4"
                                class="px-6 py-12 text-center text-slate-500"
                            >
                                Chưa có danh mục nào.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        @if($categories->hasPages())

            <div class="border-t border-slate-200 px-6 py-4">
                {{ $categories->links() }}
            </div>

        @endif

    </div>

</div>

@endsection
