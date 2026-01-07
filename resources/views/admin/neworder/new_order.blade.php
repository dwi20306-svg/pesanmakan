<x-admin-layout title="New Order">

<section class="bg-white rounded-2xl border shadow-sm p-8">

    <div class="mb-6">
        <h2 class="text-xl font-semibold">New Order</h2>
        <p class="text-sm text-gray-500">
            Daftar pesanan terbaru dari user
        </p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border-collapse">
            <thead class="bg-gray-50 text-gray-500">
                <tr>
                    <th class="text-left px-4 py-3">Order ID</th>
                    <th class="text-left px-4 py-3">Nama User</th>
                    <th class="text-left px-4 py-3">Total</th>
                    <th class="text-left px-4 py-3">Status</th>
                    <th class="text-left px-4 py-3">Aksi</th>
                </tr>
            </thead>

            <tbody>
            @forelse($orders as $order)
                <tr class="border-t">
                    <td class="px-4 py-3 font-medium">
                        #ORD-{{ $loop->iteration }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $order->user->name ?? '-' }}
                    </td>

                    <td class="px-4 py-3">
                        Rp {{ number_format($order->total,0,',','.') }}
                    </td>

                    <td class="px-4 py-3">
                        <span class="text-xs px-3 py-1 rounded-full
                            @if($order->status == 'pending')
                                bg-yellow-100 text-yellow-600
                            @elseif($order->status == 'diproses')
                                bg-blue-100 text-blue-600
                            @else
                                bg-green-100 text-green-600
                            @endif">
                            {{ ucfirst($order->status) }}
                        </span>
                    </td>

                    <td class="px-4 py-3 space-x-2">
                        <a href="#"
                           class="text-xs px-3 py-1 rounded-lg
                                  bg-gray-100 hover:bg-gray-200">
                            Detail
                        </a>

                        @if($order->status == 'pending')
                        <form action="#" method="POST" class="inline">
                            @csrf
                            <button
                                class="text-xs px-3 py-1 rounded-lg
                                       bg-green-100 text-green-600 hover:bg-green-200">
                                Terima
                            </button>
                        </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5"
                        class="px-6 py-6 text-center text-gray-500">
                        Belum ada pesanan
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>

</section>

</x-admin-layout>
