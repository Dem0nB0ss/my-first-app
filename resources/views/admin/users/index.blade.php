@extends('layouts.admin')

@section('title', 'Người dùng')
@section('page-title', 'Người dùng')

@section('content')

<div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">

    <div>
        <h2 class="text-2xl font-bold text-slate-900">
            Người dùng
        </h2>

        <p class="mt-1 text-sm text-slate-500">
            Quản lý tài khoản người dùng trong hệ thống.
        </p>
    </div>

    <a href="{{ route('admin.users.create') }}"
       class="inline-flex items-center justify-center rounded-lg bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700">

        + Thêm người dùng

    </a>

</div>


<div class="overflow-hidden rounded-xl border border-slate-200 bg-white shadow-sm">

    <div class="border-b border-slate-200 p-5">

        <div class="flex items-center justify-between">

            <div>

                <h3 class="font-semibold text-slate-900">
                    Tất cả người dùng
                </h3>

                <p class="mt-1 text-xs text-slate-500">
                    {{ $users->total() }} người dùng
                </p>

            </div>

        </div>

    </div>


    <div class="overflow-x-auto">

        <table class="min-w-full divide-y divide-slate-200">

            <thead class="bg-slate-50">

                <tr>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-slate-500">
                        Người dùng
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-slate-500">
                        Email
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-slate-500">
                        Role
                    </th>

                    <th class="px-6 py-3 text-left text-xs font-semibold uppercase text-slate-500">
                        Ngày tạo
                    </th>

                    <th class="px-6 py-3 text-right text-xs font-semibold uppercase text-slate-500">
                        Thao tác
                    </th>

                </tr>

            </thead>


            <tbody class="divide-y divide-slate-100">

                @forelse($users as $user)

                    <tr class="hover:bg-slate-50">

                        <td class="px-6 py-4">

                            <div class="flex items-center gap-3">

                                <div class="flex h-10 w-10 items-center justify-center rounded-full bg-indigo-100 font-semibold text-indigo-600">

                                    {{ strtoupper(substr($user->name, 0, 1)) }}

                                </div>

                                <div>

                                    <div class="font-medium text-slate-800">
                                        {{ $user->name }}
                                    </div>

                                    <div class="text-xs text-slate-500">
                                        #{{ $user->id }}
                                    </div>

                                </div>

                            </div>

                        </td>


                        <td class="px-6 py-4 text-sm text-slate-600">

                            {{ $user->email }}

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


                        <td class="px-6 py-4 text-right">

                            <a href="{{ route('admin.users.edit', $user) }}"
                               class="mr-2 text-sm font-medium text-indigo-600 hover:text-indigo-800">

                                Sửa

                            </a>


                            @if(auth()->id() !== $user->id)

                                <form action="{{ route('admin.users.destroy', $user) }}"
                                      method="POST"
                                      class="inline">

                                    @csrf

                                    @method('DELETE')

                                    <button type="submit"
                                            onclick="return confirm('Bạn có chắc muốn xóa người dùng này?')"
                                            class="text-sm font-medium text-red-600 hover:text-red-800">

                                        Xóa

                                    </button>

                                </form>

                            @endif

                        </td>

                    </tr>

                @empty

                    <tr>

                        <td colspan="5"
                            class="px-6 py-12 text-center text-sm text-slate-500">

                            Chưa có người dùng.

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>


    <div class="border-t border-slate-200 px-6 py-4">

        {{ $users->links() }}

    </div>

</div>

@endsection
