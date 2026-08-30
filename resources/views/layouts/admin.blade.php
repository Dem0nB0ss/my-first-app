<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', 'Admin Dashboard') - My First App</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('styles')
</head>


<body class="bg-slate-100 text-slate-800 antialiased">

<div
    x-data="{
        sidebarOpen: false,
        productsOpen: false,
        usersOpen: false,
        profileOpen: false
    }"
    class="min-h-screen"
>


    {{-- ============================================================
         MOBILE OVERLAY
    ============================================================= --}}

    <div
        x-show="sidebarOpen"
        x-cloak
        @click="sidebarOpen = false"
        class="fixed inset-0 z-40 bg-slate-900/50 lg:hidden"
    ></div>


    {{-- ============================================================
         SIDEBAR
    ============================================================= --}}

    <aside
        class="fixed inset-y-0 left-0 z-50 flex w-64 flex-col bg-slate-900 text-white shadow-xl transition-transform duration-300 lg:translate-x-0"
        :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    >

        {{-- Logo --}}

        <div class="flex h-16 items-center justify-between border-b border-slate-800 px-5">

            <a
                href="{{ route('admin.dashboard') }}"
                class="flex items-center gap-3"
            >

                <div class="flex h-9 w-9 items-center justify-center rounded-xl bg-indigo-600 font-bold shadow-lg shadow-indigo-600/20">
                    M
                </div>

                <div>
                    <div class="text-sm font-bold">
                        My Admin
                    </div>

                    <div class="text-xs text-slate-400">
                        Administration
                    </div>
                </div>

            </a>


            {{-- Close mobile sidebar --}}

            <button
                @click="sidebarOpen = false"
                class="rounded-lg p-2 text-slate-400 hover:bg-slate-800 hover:text-white lg:hidden"
            >

                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"
                    />
                </svg>

            </button>

        </div>


        {{-- User mini profile --}}

        <div class="border-b border-slate-800 p-4">

            <div class="flex items-center gap-3">

                <div class="flex h-10 w-10 shrink-0 items-center justify-center rounded-full bg-indigo-600 font-semibold">

                    {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                </div>

                <div class="min-w-0">

                    <div class="truncate text-sm font-semibold">
                        {{ auth()->user()->name ?? 'Administrator' }}
                    </div>

                    <div class="truncate text-xs text-slate-400">
                        {{ auth()->user()->email ?? 'admin@example.com' }}
                    </div>

                </div>

            </div>

        </div>


        {{-- Navigation --}}

        <nav class="flex-1 overflow-y-auto px-3 py-5">

            <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                Main
            </p>


            {{-- Dashboard --}}

            <a
                href="{{ route('admin.dashboard') }}"
                class="{{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-600/20' : 'text-slate-300 hover:bg-slate-800 hover:text-white' }} group mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium transition"
            >

                <svg
                    class="h-5 w-5 shrink-0"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M3 13h8V3H3v10zm10 8h8V11h-8v10zM3 21h8v-6H3v6zm10-18v6h8V3h-8z"
                    />
                </svg>

                Dashboard

            </a>


            {{-- ====================================================
                 PRODUCTS DROPDOWN
            ===================================================== --}}

            <div class="mb-1">

                <button
                    @click="productsOpen = !productsOpen"
                    class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
                >

                    <span class="flex items-center gap-3">

                        <svg
                            class="h-5 w-5 shrink-0"
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

                        <span>
                            Products
                        </span>

                    </span>


                    <svg
                        class="h-4 w-4 transition-transform"
                        :class="productsOpen ? 'rotate-180' : ''"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>

                </button>


                <div
                    x-show="productsOpen"
                    x-cloak
                    x-transition
                    class="mt-1 space-y-1 pl-11"
                >

                    <a
                        href="{{ route('admin.products.index') }}"
                        class="{{ request()->routeIs('admin.products.*') ? 'text-white' : 'text-slate-400' }} block rounded-lg px-3 py-2 text-sm hover:bg-slate-800 hover:text-white"
                    >
                        All Products
                    </a>


                    <a
                        href="{{ route('admin.products.create') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-slate-400 hover:bg-slate-800 hover:text-white"
                    >
                        Add Product
                    </a>

                </div>

            </div>


            {{-- ====================================================
                 USERS DROPDOWN
            ===================================================== --}}

            <div class="mb-1">

                <button
                    @click="usersOpen = !usersOpen"
                    class="flex w-full items-center justify-between rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
                >

                    <span class="flex items-center gap-3">

                        <svg
                            class="h-5 w-5 shrink-0"
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

                        <span>
                            Users
                        </span>

                    </span>


                    <svg
                        class="h-4 w-4 transition-transform"
                        :class="usersOpen ? 'rotate-180' : ''"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M19 9l-7 7-7-7"
                        />
                    </svg>

                </button>


                <div
                    x-show="usersOpen"
                    x-cloak
                    x-transition
                    class="mt-1 space-y-1 pl-11"
                >

                    <a
                        href="{{ route('admin.users.index') }}"
                        class="{{ request()->routeIs('admin.users.*') ? 'text-white' : 'text-slate-400' }} block rounded-lg px-3 py-2 text-sm hover:bg-slate-800 hover:text-white"
                    >
                        All Users
                    </a>


                    <a
                        href="{{ route('admin.users.create') }}"
                        class="block rounded-lg px-3 py-2 text-sm text-slate-400 hover:bg-slate-800 hover:text-white"
                    >
                        Add User
                    </a>

                </div>

            </div>


            <div class="my-5 border-t border-slate-800"></div>


            <p class="mb-2 px-3 text-xs font-semibold uppercase tracking-wider text-slate-500">
                System
            </p>


            {{-- Settings --}}

            <a
                href="#"
                class="mb-1 flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
            >

                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10.325 4.317a1.724 1.724 0 013.35 0 1.724 1.724 0 002.573 1.066 1.724 1.724 0 012.366 2.366 1.724 1.724 0 001.066 2.573 1.724 1.724 0 010 3.35 1.724 1.724 0 00-1.066 2.573 1.724 1.724 0 01-2.366 2.366 1.724 1.724 0 00-2.573 1.066 1.724 1.724 0 01-3.35 0 1.724 1.724 0 00-2.573-1.066 1.724 1.724 0 01-2.366-2.366 1.724 1.724 0 00-1.066-2.573 1.724 1.724 0 010-3.35 1.724 1.724 0 001.066-2.573A1.724 1.724 0 017.752 5.383a1.724 1.724 0 002.573-1.066z"
                    />

                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"
                    />
                </svg>

                Settings

            </a>


            {{-- Visit website --}}

            <a
                href="{{ url('/') }}"
                target="_blank"
                class="flex items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-slate-800 hover:text-white"
            >

                <svg
                    class="h-5 w-5"
                    fill="none"
                    stroke="currentColor"
                    viewBox="0 0 24 24"
                >
                    <path
                        stroke-linecap="round"
                        stroke-linejoin="round"
                        stroke-width="2"
                        d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"
                    />
                </svg>

                Visit Website

            </a>

        </nav>


        {{-- Sidebar footer --}}

        <div class="border-t border-slate-800 p-3">

            <form
                action="{{ route('logout') }}"
                method="POST"
            >

                @csrf

                <button
                    type="submit"
                    class="flex w-full items-center gap-3 rounded-lg px-3 py-2.5 text-sm font-medium text-slate-300 transition hover:bg-red-500/10 hover:text-red-400"
                >

                    <svg
                        class="h-5 w-5"
                        fill="none"
                        stroke="currentColor"
                        viewBox="0 0 24 24"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                        />
                    </svg>

                    Logout

                </button>

            </form>

        </div>

    </aside>


    {{-- ============================================================
         MAIN AREA
    ============================================================= --}}

    <div class="lg:pl-64">


        {{-- ========================================================
             TOPBAR
        ========================================================= --}}

        <header class="sticky top-0 z-30 border-b border-slate-200 bg-white/95 backdrop-blur">

            <div class="flex h-16 items-center justify-between px-4 sm:px-6">


                {{-- Mobile menu button --}}

                <button
                    @click="sidebarOpen = true"
                    class="rounded-lg p-2 text-slate-600 hover:bg-slate-100 lg:hidden"
                >

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
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>

                </button>


                {{-- Page title --}}

                <div class="hidden md:block">

                    <h1 class="text-lg font-semibold text-slate-900">
                        @yield('page-title', 'Dashboard')
                    </h1>

                </div>


                {{-- Right side --}}

                <div class="ml-auto flex items-center gap-2">


                    {{-- Search --}}

                    <button
                        class="hidden rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700 sm:block"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M21 21l-4.35-4.35m2.35-5.65a7 7 0 11-14 0 7 7 0 0114 0z"
                            />
                        </svg>

                    </button>


                    {{-- Notifications --}}

                    <button
                        class="relative rounded-lg p-2 text-slate-500 hover:bg-slate-100 hover:text-slate-700"
                    >

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"
                            />
                        </svg>

                        <span class="absolute right-1 top-1 h-2 w-2 rounded-full bg-red-500"></span>

                    </button>


                    {{-- Profile dropdown --}}

                    <div class="relative ml-2">

                        <button
                            @click="profileOpen = !profileOpen"
                            class="flex items-center gap-2 rounded-lg p-1.5 hover:bg-slate-100"
                        >

                            <div class="flex h-9 w-9 items-center justify-center rounded-full bg-indigo-600 text-sm font-semibold text-white">

                                {{ strtoupper(substr(auth()->user()->name ?? 'A', 0, 1)) }}

                            </div>


                            <div class="hidden text-left md:block">

                                <div class="text-sm font-semibold text-slate-800">
                                    {{ auth()->user()->name ?? 'Administrator' }}
                                </div>

                                <div class="text-xs text-slate-500">
                                    Administrator
                                </div>

                            </div>


                            <svg
                                class="hidden h-4 w-4 text-slate-400 md:block"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M19 9l-7 7-7-7"
                                />
                            </svg>

                        </button>


                        {{-- Profile menu --}}

                        <div
                            x-show="profileOpen"
                            x-cloak
                            @click.outside="profileOpen = false"
                            x-transition
                            class="absolute right-0 mt-2 w-56 overflow-hidden rounded-xl border border-slate-200 bg-white py-2 shadow-xl"
                        >

                            <div class="border-b border-slate-100 px-4 py-3">

                                <p class="text-sm font-semibold text-slate-800">
                                    {{ auth()->user()->name ?? 'Administrator' }}
                                </p>

                                <p class="truncate text-xs text-slate-500">
                                    {{ auth()->user()->email ?? '' }}
                                </p>

                            </div>


                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50"
                            >
                                My Profile
                            </a>


                            <a
                                href="#"
                                class="block px-4 py-2 text-sm text-slate-600 hover:bg-slate-50"
                            >
                                Settings
                            </a>


                            <div class="my-1 border-t border-slate-100"></div>


                            <form
                                action="{{ route('logout') }}"
                                method="POST"
                            >

                                @csrf

                                <button
                                    type="submit"
                                    class="block w-full px-4 py-2 text-left text-sm text-red-600 hover:bg-red-50"
                                >
                                    Logout
                                </button>

                            </form>

                        </div>

                    </div>

                </div>

            </div>

        </header>


        {{-- ========================================================
             PAGE CONTENT
        ========================================================= --}}

        <main class="p-4 sm:p-6 lg:p-8">

            {{-- Flash success --}}

            @if(session('success'))

                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    class="mb-6 flex items-center justify-between rounded-xl border border-emerald-200 bg-emerald-50 px-4 py-3 text-sm text-emerald-700"
                >

                    <div class="flex items-center gap-2">

                        <svg
                            class="h-5 w-5"
                            fill="none"
                            stroke="currentColor"
                            viewBox="0 0 24 24"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M5 13l4 4L19 7"
                            />
                        </svg>

                        {{ session('success') }}

                    </div>

                    <button
                        @click="show = false"
                        class="text-emerald-500 hover:text-emerald-700"
                    >
                        ✕
                    </button>

                </div>

            @endif


            {{-- Flash error --}}

            @if(session('error'))

                <div
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    class="mb-6 flex items-center justify-between rounded-xl border border-red-200 bg-red-50 px-4 py-3 text-sm text-red-700"
                >

                    <div>
                        {{ session('error') }}
                    </div>

                    <button
                        @click="show = false"
                        class="text-red-500 hover:text-red-700"
                    >
                        ✕
                    </button>

                </div>

            @endif


            @yield('content')

        </main>

    </div>

</div>


@stack('scripts')

</body>
</html>
