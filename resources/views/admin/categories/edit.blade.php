@extends('layouts.admin')

@section('title', 'Edit Category')

@section('page-title', 'Edit Category')

@section('content')

<div class="mx-auto max-w-2xl">

    <div class="mb-6">

        <h2 class="text-2xl font-bold text-slate-900">
            Edit Category
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Chỉnh sửa thông tin danh mục.
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
        action="{{ route('admin.categories.update', $category) }}"
        method="POST"
        class="space-y-6"
    >

        @csrf
        @method('PUT')

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
                    value="{{ old('name', $category->name) }}"
                    class="admin-input"
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
                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection
