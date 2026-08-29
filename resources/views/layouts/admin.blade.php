<!DOCTYPE html> <html lang="vi"> <head>
<meta charset="UTF-8">

<meta name="viewport"
      content="width=device-width, initial-scale=1.0">

<title>
    @yield('title', 'Admin Dashboard')
</title>

@vite(['resources/css/app.css', 'resources/js/app.js'])

</head> <body> <div class="min-h-screen bg-slate-100">
{{-- SIDEBAR --}}
<aside class="fixed inset-y-0 left-0 z-50 hidden w-64 bg-slate-900 text-white lg:block">

    {{-- LOGO --}}
    <div class="flex h-16 items-center border-b border-slate-800 px-6">

        <div class="flex items-center gap-3">

            <div class="flex h-9 w-9 items-center justify-center rounded-lg bg-indigo-600">

                <svg class="h-5 w-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M4 6h16M4 12h16M4 18h16"/>

                </svg>

            </div>

            <span class="text-lg font-bold">
                MyShop
            </span>

        </div>

    </div>


    {{-- MENU --}}
    <nav class="p-4">

        <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
            Tổng quan
        </p>


        <a href="{{ route('admin.dashboard') }}"
           class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm
           {{ request()->routeIs('admin.dashboard')
                ? 'bg-indigo-600 text-white'
                : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            <svg class="h-5 w-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 12l9-9 9 9M5 10v10h14V10"/>

            </svg>

            Dashboard

        </a>


        <p class="mb-2 mt-6 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
            Quản lý
        </p>


        {{-- PRODUCTS --}}
        <a href="{{ route('admin.products.index') }}"
           class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm
           {{ request()->routeIs('admin.products.*')
                ? 'bg-indigo-600 text-white'
                : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            <svg class="h-5 w-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M20 7l-8-4-8 4m16 0v10l-8 4-8-4V7m16 0l-8 4m-8-4l8 4m0 0v10"/>

            </svg>

            Sản phẩm

        </a>


        {{-- USERS --}}
        <a href="{{ route('admin.users.index') }}"
           class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm
           {{ request()->routeIs('admin.users.*')
                ? 'bg-indigo-600 text-white'
                : 'text-slate-300 hover:bg-slate-800 hover:text-white' }}">

            <svg class="h-5 w-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M17 20h5v-2a4 4 0 00-4-4h-1M9 20H4v-2a4 4 0 014-4h1m4-8a4 4 0 11-8 0 4 4 0 018 0zm6 0a3 3 0 11-6 0"/>

            </svg>

            Người dùng

        </a>


        {{-- ORDERS --}}
        <a href="#"
           class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">

            <svg class="h-5 w-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2 2h12m-9 4a1 1 0 100-2 1 1 0 000 2zm8 0a1 1 0 100-2 1 1 0 000 2z"/>

            </svg>

            Đơn hàng

        </a>


        <p class="mb-2 mt-6 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
            Hệ thống
        </p>


        <a href="#"
           class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm text-slate-300 hover:bg-slate-800 hover:text-white">

            <svg class="h-5 w-5"
                 fill="none"
                 stroke="currentColor"
                 viewBox="0 0 24 24">

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>

                <path stroke-linecap="round"
                      stroke-linejoin="round"
                      stroke-width="2"
                      d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>

            </svg>

            Cài đặt

        </a>

    </nav>

</aside>


{{-- MAIN --}}
<div class="lg:pl-64">


    {{-- TOPBAR --}}
    <header class="sticky top-0 z-40 flex h-16 items-center justify-between
                   border-b border-slate-200 bg-white px-4 shadow-sm sm:px-6">

        <div>

            <h1 class="text-lg font-semibold text-slate-800">
                @yield('page-title', 'Dashboard')
            </h1>

        </div>


        <div class="flex items-center gap-4">


            {{-- Notification --}}
            <button class="relative rounded-lg p-2 text-slate-500 hover:bg-slate-100">

                <svg class="h-5 w-5"
                     fill="none"
                     stroke="currentColor"
                     viewBox="0 0 24 24">

                    <path stroke-linecap="round"
                          stroke-linejoin="round"
                          stroke-width="2"
                          d="M15 17h5l-1.5-1.5A2 2 0 0118 14v-3a6 6 0 00-12 0v3a2 2 0 01-.5 1.5L4 17h5m6 0a3 3 0 01-6 0"/>

                </svg>

                <span class="absolute right-1 top-1 h-2 w-2 rounded-full bg-red-500"></span>

            </button>


            {{-- User --}}
            <div class="flex items-center gap-3 border-l border-slate-200 pl-4">

                <div class="hidden text-right sm:block">

                    <p class="text-sm font-medium text-slate-800">
                        {{ auth()->user()->name ?? 'Admin' }}
                    </p>

                    <p class="text-xs text-slate-500">
                        Administrator
                    </p>

                </div>


                <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-100 font-semibold text-indigo-600">

                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                </div>

            </div>

        </div>

    </header>


    {{-- CONTENT --}}
    <main class="p-4 sm:p-6 lg:p-8">


        {{-- SUCCESS --}}
        @if(session('success'))

            <div class="mb-6 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-700">

                {{ session('success') }}

            </div>

        @endif


        {{-- ERROR --}}
        @if(session('error'))

            <div class="mb-6 rounded-lg border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700">

                {{ session('error') }}

            </div>

        @endif


        @yield('content')

    </main>

</div>

</div> </body> </html>