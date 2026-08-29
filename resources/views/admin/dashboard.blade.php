@extends('layouts.admin')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

<div class="mb-8">
<h2 class="text-2xl font-bold text-slate-900">
    Tổng quan
</h2>

<p class="mt-1 text-sm text-slate-500">
    Chào mừng bạn quay trở lại trang quản trị.
</p>

</div>

{{-- STAT CARDS --}}

<div class="mb-8 grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">
{{-- PRODUCTS --}}
<div class="admin-card p-5">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm font-medium text-slate-500">
                Tổng sản phẩm
            </p>

            <p class="mt-2 text-3xl font-bold text-slate-900">
                {{ $productCount ?? 0 }}
            </p>

        </div>


        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-100 text-indigo-600">

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

    </div>

    <a href="{{ route('admin.products.index') }}"
       class="mt-4 inline-block text-sm font-medium text-indigo-600 hover:text-indigo-700">

        Xem sản phẩm →

    </a>

</div>


{{-- USERS --}}
<div class="admin-card p-5">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm font-medium text-slate-500">
                Người dùng
            </p>

            <p class="mt-2 text-3xl font-bold text-slate-900">
                {{ $userCount ?? 0 }}
            </p>

        </div>


        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-100 text-emerald-600">

            <svg class="h-6 w-6"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 11-8 0 4 4 0 018 0zm6 0a3 3 0 11-6 0"/>

            </svg>

        </div>

    </div>

    <a href="{{ route('admin.users.index') }}"
       class="mt-4 inline-block text-sm font-medium text-emerald-600 hover:text-emerald-700">

        Xem người dùng →

    </a>

</div>


{{-- ORDERS --}}
<div class="admin-card p-5">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm font-medium text-slate-500">
                Đơn hàng
            </p>

            <p class="mt-2 text-3xl font-bold text-slate-900">
                {{ $orderCount ?? 0 }}
            </p>

        </div>


        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-100 text-amber-600">

            <svg class="h-6 w-6"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 2h12m-9 4a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>

            </svg>

        </div>

    </div>

</div>


{{-- REVENUE --}}
<div class="admin-card p-5">

    <div class="flex items-center justify-between">

        <div>

            <p class="text-sm font-medium text-slate-500">
                Doanh thu
            </p>

            <p class="mt-2 text-3xl font-bold text-slate-900">
                {{ number_format($revenue ?? 0) }}đ
            </p>

        </div>


        <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-rose-100 text-rose-600">

            <svg class="h-6 w-6"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M12 8c-2 0-4 1-4 3s2 3 4 3 4 1 4 3-2 3-4 3m0-15v2m0 12v2"/>

            </svg>

        </div>

    </div>

</div>

</div>

{{-- LOWER SECTION --}}

<div class="grid grid-cols-1 gap-6 xl:grid-cols-3">
{{-- CHART --}}
<div class="admin-card xl:col-span-2">

    <div class="border-b border-slate-200 px-6 py-5">

        <h3 class="font-semibold text-slate-900">
            Doanh thu
        </h3>

        <p class="mt-1 text-sm text-slate-500">
            Thống kê doanh thu trong tuần
        </p>

    </div>


    <div class="p-6">

        <div class="flex h-72 items-end gap-4">

            @foreach([35, 55, 45, 70, 60, 85, 75] as $height)

                <div class="flex flex-1 flex-col items-center gap-2">

                    <div class="w-full rounded-t-lg bg-indigo-500 transition hover:bg-indigo-600"
                         style="height: {{ $height }}%">
                    </div>

                    <span class="text-xs text-slate-400">
                        {{ ['T2','T3','T4','T5','T6','T7','CN'][$loop->index] }}
                    </span>

                </div>

            @endforeach

        </div>

    </div>

</div>


{{-- RECENT USERS --}}
<div class="admin-card">

    <div class="border-b border-slate-200 px-6 py-5">

        <h3 class="font-semibold text-slate-900">
            Người dùng mới
        </h3>

    </div>


    <div class="p-6">

        @forelse($recentUsers ?? [] as $user)

            <div class="mb-5 flex items-center gap-3 last:mb-0">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-100 font-semibold text-indigo-600">

                    {{ strtoupper(substr($user->name, 0, 1)) }}

                </div>


                <div class="min-w-0">

                    <p class="truncate text-sm font-semibold text-slate-800">

                        {{ $user->name }}

                    </p>

                    <p class="truncate text-xs text-slate-500">

                        {{ $user->email }}

                    </p>

                </div>

            </div>

        @empty

            <div class="py-8 text-center">

                <p class="text-sm text-slate-500">
                    Chưa có người dùng.
                </p>

            </div>

        @endforelse

    </div>

</div>

</div>

@endsection