@extends('layouts.admin')

@section('title', 'Create Category')

@section('page-title', 'Create Category')

@section('content')

<div class="mx-auto max-w-2xl">

    <div class="mb-6">

        <h2 class="text-2xl font-bold text-slate-900">
            Create Category
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Tạo danh mục sản phẩm mới.
        </p>

    </div>


    @if($errors->any())

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">

            <ul class="list-inside list-disc text-sm text-red-600">

                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif


    <form
        action="{{ route('admin.categories.store') }}"
        method="POST"
        class="space-y-6"
    >

        @csrf

        <div class="admin-card p-6">

            <h3 class="text-lg font-semibold text-slate-900">
                Category Information
            </h3>

            <div class="mt-6">

                <label class="mb-2 block text-sm font-medium text-slate-700">
                    Category Name
                </label>

                <input
                    type="text"
                    name="name"
                    value="{{ old('name') }}"
                    class="admin-input"
                    placeholder="Ví dụ: Electronics"
                    required
                >

            </div>

        </div>


        <div class="flex justify-end gap-3">

            <a
                href="{{ route('admin.categories.index') }}"
                class="admin-btn-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="admin-btn-primary"
            >
                Create Category
            </button>

        </div>

    </form>

</div>

@endsection
