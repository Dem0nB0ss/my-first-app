@extends('layouts.admin')

@section('title', 'Add Product')

@section('page-title', 'Add Product')


@section('content')

<div class="mx-auto max-w-4xl">

    <div class="mb-6">

        <h2 class="text-2xl font-bold text-slate-900">
            Add Product
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Tạo sản phẩm mới.
        </p>

    </div>


    @if($errors->any())

        <div class="mb-6 rounded-xl border border-red-200 bg-red-50 p-4">

            <p class="font-medium text-red-700">
                Có lỗi xảy ra:
            </p>

            <ul class="mt-2 list-inside list-disc text-sm text-red-600">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>

    @endif


    <form
        action="{{ route('admin.products.store') }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf


        {{-- Basic information --}}

        <div class="admin-card p-6">

            <h3 class="text-lg font-semibold text-slate-900">
                Product Information
            </h3>


            <div class="mt-6 space-y-5">


                {{-- Name --}}

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Product Name
                    </label>

                    <input
                        type="text"
                        name="name"
                        value="{{ old('name') }}"
                        class="admin-input"
                        placeholder="Nhập tên sản phẩm"
                        required
                    >

                    @error('name')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

                {{-- Category --}}

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Category
                    </label>

                    <select
                        name="category_id"
                        class="admin-input"
                        required
                    >

                        <option value="">-- Select Category --</option>

                        @foreach($categories as $category)

                            <option
                                value="{{ $category->id }}"
                                @selected(old('category_id') == $category->id)
                            >
                                {{ $category->name }}
                            </option>

                        @endforeach

                    </select>

                </div>


                {{-- Description --}}

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Description
                    </label>

                    <textarea
                        name="description"
                        rows="5"
                        class="admin-input"
                        placeholder="Mô tả sản phẩm..."
                    >{{ old('description') }}</textarea>

                    @error('description')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>


                {{-- Price + Quantity --}}

                <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Price
                        </label>

                        <input
                            type="number"
                            name="price"
                            value="{{ old('price', 0) }}"
                            min="0"
                            step="0.01"
                            class="admin-input"
                            required
                        >

                        @error('price')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Quantity
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            value="{{ old('quantity', 0) }}"
                            min="0"
                            class="admin-input"
                            required
                        >

                        @error('quantity')
                            <p class="mt-1 text-sm text-red-600">
                                {{ $message }}
                            </p>
                        @enderror

                    </div>

                </div>


                {{-- Status --}}

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Status
                    </label>

                    <select
                        name="status"
                        class="admin-input"
                    >

                        <option
                            value="1"
                            @selected(old('status', '1') == '1')
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            @selected(old('status') == '0')
                        >
                            Inactive
                        </option>

                    </select>

                </div>


                {{-- Image --}}

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Product Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        accept="image/jpeg,image/png,image/webp"
                        class="block w-full rounded-lg border border-slate-300 bg-white text-sm text-slate-600 file:mr-4 file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700 hover:file:bg-indigo-100"
                    >

                    <p class="mt-2 text-xs text-slate-500">
                        JPG, PNG hoặc WEBP. Tối đa 2MB.
                    </p>

                    @error('image')
                        <p class="mt-1 text-sm text-red-600">
                            {{ $message }}
                        </p>
                    @enderror

                </div>

            </div>

        </div>


        {{-- Buttons --}}

        <div class="flex items-center justify-end gap-3">

            <a
                href="{{ route('admin.products.index') }}"
                class="admin-btn-secondary"
            >
                Cancel
            </a>

            <button
                type="submit"
                class="admin-btn-primary"
            >
                Create Product
            </button>

        </div>

    </form>

</div>

@endsection
