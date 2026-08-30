@extends('layouts.admin')

@section('title', 'Dashboard')

@section('page-title', 'Dashboard')


@section('content')

{{-- ============================================================
     HEADER
============================================================= --}}

<div class="mb-8">

    <div class="flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

        <div>

            <h2 class="text-2xl font-bold tracking-tight text-slate-900">
                Dashboard
            </h2>

            <p class="mt-1 text-sm text-slate-500">
                Tổng quan hoạt động của hệ thống.
            </p>

        </div>


        <a
            href="{{ route('admin.products.create') }}"
            class="admin-btn-primary"
        >
            + Thêm sản phẩm
        </a>

    </div>

</div>


{{-- ============================================================
     STATISTICS
============================================================= --}}

<div class="grid grid-cols-1 gap-5 sm:grid-cols-2 xl:grid-cols-4">


    {{-- Products --}}

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


            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-indigo-50 text-indigo-600">

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
                        d="M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4"
                    />
                </svg>

            </div>

        </div>


        <div class="mt-4">

            <a
                href="{{ route('admin.products.index') }}"
                class="text-sm font-medium text-indigo-600 hover:text-indigo-800"
            >
                Xem sản phẩm →
            </a>

        </div>

    </div>


    {{-- Users --}}

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


            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-50 text-blue-600">

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
                        d="M17 20h5v-2a4 4 0 00-4-4h-1m-6 6H3v-2a4 4 0 014-4h3m0-8a4 4 0 110 8 4 4 0 010-8zm8 4a4 4 0 100-8 4 4 0 000 8z"
                    />
                </svg>

            </div>

        </div>


        <div class="mt-4">

            <a
                href="{{ route('admin.users.index') }}"
                class="text-sm font-medium text-blue-600 hover:text-blue-800"
            >
                Xem người dùng →
            </a>

        </div>

    </div>


    {{-- Orders --}}

    <div class="admin-card p-5">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Đơn hàng
                </p>

                <p class="mt-2 text-3xl font-bold text-slate-900">
                    0
                </p>

            </div>


            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-amber-50 text-amber-600">

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
                        d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 4h13m-4-4v4m-4-4v4m-1 4h.01M19 21h.01"
                    />
                </svg>

            </div>

        </div>


        <div class="mt-4">

            <span class="text-sm text-slate-400">
                Chưa có đơn hàng
            </span>

        </div>

    </div>


    {{-- Revenue --}}

    <div class="admin-card p-5">

        <div class="flex items-center justify-between">

            <div>

                <p class="text-sm font-medium text-slate-500">
                    Doanh thu
                </p>

                <p class="mt-2 text-3xl font-bold text-slate-900">
                    0đ
                </p>

            </div>


            <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-50 text-emerald-600">

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
                        d="M12 8c-2.21 0-4 1.343-4 3s1.79 3 4 3 4 1.343 4 3-1.79 3-4 3m0-12V5m0 14v-3m0-11a4 4 0 014 4M8 9a4 4 0 014-4"
                    />
                </svg>

            </div>

        </div>


        <div class="mt-4">

            <span class="text-sm text-emerald-600">
                +0% tháng này
            </span>

        </div>

    </div>

</div>


{{-- ============================================================
     RECENT USERS
============================================================= --}}

<div class="mt-6 grid grid-cols-1 gap-6 xl:grid-cols-3">


    {{-- Users table --}}

    <div class="admin-card overflow-hidden xl:col-span-2">

        <div class="flex items-center justify-between border-b border-slate-200 px-6 py-5">

            <div>

                <h3 class="font-semibold text-slate-900">
                    Người dùng mới
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    Những tài khoản mới đăng ký gần đây.
                </p>

            </div>


            <a
                href="{{ route('admin.users.index') }}"
                class="text-sm font-medium text-indigo-600 hover:text-indigo-800"
            >
                Xem tất cả
            </a>

        </div>


        <div class="overflow-x-auto">

            <table class="min-w-full">

                <thead class="bg-slate-50">

                    <tr>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            User
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Role
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold uppercase tracking-wider text-slate-500">
                            Ngày đăng ký
                        </th>

                    </tr>

                </thead>


                <tbody class="divide-y divide-slate-100">

                    @forelse($recentUsers ?? [] as $user)

                        <tr class="hover:bg-slate-50">

                            <td class="px-6 py-4">

                                <div class="flex items-center gap-3">

                                    <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-100 text-sm font-semibold text-indigo-600">

                                        {{ strtoupper(substr($user->name, 0, 1)) }}

                                    </div>


                                    <div>

                                        <div class="text-sm font-medium text-slate-800">
                                            {{ $user->name }}
                                        </div>

                                        <div class="text-xs text-slate-500">
                                            {{ $user->email }}
                                        </div>

                                    </div>

                                </div>

                            </td>


                            <td class="px-6 py-4">

                                @if($user->role === 'admin')

                                    <span class="rounded-full bg-indigo-100 px-2.5 py-1 text-xs font-medium text-indigo-700">
                                        Admin
                                    </span>

                                @else

                                    <span class="rounded-full bg-slate-100 px-2.5 py-1 text-xs font-medium text-slate-600">
                                        User
                                    </span>

                                @endif

                            </td>


                            <td class="px-6 py-4 text-sm text-slate-500">

                                {{ $user->created_at?->format('d/m/Y') }}

                            </td>

                        </tr>

                    @empty

                        <tr>

                            <td
                                colspan="3"
                                class="px-6 py-10 text-center text-sm text-slate-500"
                            >
                                Chưa có người dùng.
                            </td>

                        </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>


    {{-- Quick actions --}}

    <div class="admin-card p-6">

        <h3 class="font-semibold text-slate-900">
            Thao tác nhanh
        </h3>

        <p class="mt-1 text-sm text-slate-500">
            Các chức năng thường dùng.
        </p>


        <div class="mt-6 space-y-3">


            <a
                href="{{ route('admin.products.create') }}"
                class="flex items-center gap-4 rounded-xl border border-slate-200 p-4 transition hover:border-indigo-200 hover:bg-indigo-50"
            >

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-indigo-100 text-indigo-600">
                    +
                </div>

                <div>
                    <div class="text-sm font-semibold text-slate-800">
                        Thêm sản phẩm
                    </div>

                    <div class="text-xs text-slate-500">
                        Tạo sản phẩm mới
                    </div>
                </div>

            </a>


            <a
                href="{{ route('admin.users.create') }}"
                class="flex items-center gap-4 rounded-xl border border-slate-200 p-4 transition hover:border-blue-200 hover:bg-blue-50"
            >

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-blue-100 text-blue-600">
                    +
                </div>

                <div>
                    <div class="text-sm font-semibold text-slate-800">
                        Thêm người dùng
                    </div>

                    <div class="text-xs text-slate-500">
                        Tạo tài khoản mới
                    </div>
                </div>

            </a>


            <a
                href="{{ url('/') }}"
                target="_blank"
                class="flex items-center gap-4 rounded-xl border border-slate-200 p-4 transition hover:border-emerald-200 hover:bg-emerald-50"
            >

                <div class="flex h-10 w-10 items-center justify-center rounded-lg bg-emerald-100 text-emerald-600">
                    ↗
                </div>

                <div>
                    <div class="text-sm font-semibold text-slate-800">
                        Xem website
                    </div>

                    <div class="text-xs text-slate-500">
                        Mở trang web
                    </div>
                </div>

            </a>

        </div>

    </div>

</div>

@endsection