@extends('layouts.admin')

@section('title', 'Edit Product')

@section('page-title', 'Edit Product')


@section('content')

<div class="mx-auto max-w-4xl">

    <div class="mb-6">

        <h2 class="text-2xl font-bold text-slate-900">
            Edit Product
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Chỉnh sửa thông tin sản phẩm.
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
        action="{{ route('admin.products.update', $product) }}"
        method="POST"
        enctype="multipart/form-data"
        class="space-y-6"
    >

        @csrf

        @method('PUT')


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
                        value="{{ old('name', $product->name) }}"
                        class="admin-input"
                        required
                    >

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
                    >{{ old('description', $product->description) }}</textarea>

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
                            value="{{ old('price', $product->price) }}"
                            min="0"
                            step="0.01"
                            class="admin-input"
                            required
                        >

                    </div>


                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Quantity
                        </label>

                        <input
                            type="number"
                            name="quantity"
                            value="{{ old('quantity', $product->quantity) }}"
                            min="0"
                            class="admin-input"
                            required
                        >

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
                            @selected(old('status', $product->status) == '1')
                        >
                            Active
                        </option>

                        <option
                            value="0"
                            @selected(old('status', $product->status) == '0')
                        >
                            Inactive
                        </option>

                    </select>

                </div>


                {{-- Current image --}}

                @if($product->image)

                    <div>

                        <label class="mb-2 block text-sm font-medium text-slate-700">
                            Current Image
                        </label>

                        <img
                            src="{{ asset('storage/' . $product->image) }}"
                            alt="{{ $product->name }}"
                            class="h-32 w-32 rounded-xl object-cover ring-1 ring-slate-200"
                        >

                    </div>

                @endif


                {{-- New image --}}

                <div>

                    <label class="mb-2 block text-sm font-medium text-slate-700">
                        Change Image
                    </label>

                    <input
                        type="file"
                        name="image"
                        accept="image/jpeg,image/png,image/webp"
                        class="block w-full rounded-lg border border-slate-300 bg-white text-sm text-slate-600 file:mr-4 file:border-0 file:bg-indigo-50 file:px-4 file:py-2 file:text-sm file:font-medium file:text-indigo-700"
                    >

                    <p class="mt-2 text-xs text-slate-500">
                        Để trống nếu muốn giữ ảnh hiện tại.
                    </p>

                </div>

            </div>

        </div>


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
                Save Changes
            </button>

        </div>

    </form>

</div>

@endsection
