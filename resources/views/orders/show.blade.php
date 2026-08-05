@vite(['resources/css/app.css', 'resources/js/app.js'])


    <div class="max-w-5xl mx-auto py-10">

        <!-- Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            <!-- Header -->
            <div class="bg-blue-600 text-white px-8 py-6">
                <h1 class="text-3xl font-bold">
                    Chi tiết đơn hàng #{{ $order->id }}
                </h1>

                <p class="mt-2 text-blue-100">
                    <span class="font-semibold">Khách hàng:</span>
                    {{ $order->customer_name }}
                </p>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto p-6">

                <table class="min-w-full border border-gray-200 rounded-lg overflow-hidden">

                    <thead class="bg-gray-100">
                        <tr class="text-left text-gray-700 uppercase text-sm">

                            <th class="px-6 py-4">
                                Sản phẩm
                            </th>

                            <th class="px-6 py-4">
                                Đơn giá
                            </th>

                            <th class="px-6 py-4 text-center">
                                Số lượng
                            </th>

                            <th class="px-6 py-4 text-right">
                                Thành tiền
                            </th>

                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-200">

                        @foreach($order->products as $product)

                            <tr class="hover:bg-gray-50">

                                <td class="px-6 py-4 font-semibold text-gray-800">
                                    {{ $product->name }}
                                </td>

                                <td class="px-6 py-4 text-green-600 font-medium">
                                    {{ number_format($product->pivot->price) }} VNĐ
                                </td>

                                <td class="px-6 py-4 text-center">
                                    {{ $product->pivot->quantity }}
                                </td>

                                <td class="px-6 py-4 text-right font-bold text-blue-600">
                                    {{ number_format($product->pivot->price * $product->pivot->quantity) }} VNĐ
                                </td>

                            </tr>

                        @endforeach

                    </tbody>

                </table>

            </div>

            <!-- Footer -->
            <div class="border-t bg-gray-50 px-8 py-6 flex justify-between items-center">

                <span class="text-xl font-semibold text-gray-700">
                    Tổng cộng
                </span>

                <span class="text-2xl font-bold text-red-600">
                    {{ number_format($order->total_amount) }} VNĐ
                </span>

            </div>

        </div>

        <!-- Button -->
        {{-- <div class="mt-6">
            <a href="{{ route('orders.index') }}"
                class="inline-flex items-center rounded-lg bg-gray-700 px-5 py-3 text-white hover:bg-gray-800">
                ← Quay lại danh sách
            </a>
        </div> --}}

    </div>
