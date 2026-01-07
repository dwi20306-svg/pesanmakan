<x-layout title="Dashboard User">

<!-- HEADER -->
<header class="mb-14">
    <h2 class="text-3xl font-semibold text-gray-900 tracking-tight">
        Hello, {{ $user->name }} 👋
    </h2>
    <p class="text-sm text-gray-500 mt-1">
        Ringkasan aktivitas akunmu hari ini
    </p>
</header>

<!-- QUICK STATS -->
<section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-20">

    <div class="bg-white rounded-2xl p-6 border shadow-sm">
        <p class="text-sm text-gray-400">Total Pesanan</p>
        <h3 class="text-2xl font-semibold mt-2">{{ $totalOrders }}</h3>
    </div>

    <div class="bg-white rounded-2xl p-6 border shadow-sm">
        <p class="text-sm text-gray-400">Pesanan Aktif</p>
        <h3 class="text-2xl font-semibold mt-2 text-primary">
            {{ $activeOrders }}
        </h3>
    </div>

    <div class="bg-white rounded-2xl p-6 border shadow-sm">
        <p class="text-sm text-gray-400">Pesan Baru</p>
        <h3 class="text-2xl font-semibold mt-2">
            {{ $unreadMessages }}
        </h3>
    </div>

    <div class="bg-white rounded-2xl p-6 border shadow-sm">
        <p class="text-sm text-gray-400">Keranjang</p>
        <h3 class="text-2xl font-semibold mt-2">
            {{ count(session('cart', [])) }}
        </h3>
    </div>

</section>

<!-- ORDER TERAKHIR -->
<section class="mb-20">

    <div class="flex items-end justify-between mb-6">
        <div>
            <h3 class="text-xl font-semibold text-gray-900">
                Pesanan Terakhir
            </h3>
            <p class="text-sm text-gray-500">
                Pantau status pesananmu
            </p>
        </div>

        <a href="/order" class="text-sm text-primary font-medium hover:underline">
            Lihat semua
        </a>
    </div>

    <div class="bg-white rounded-2xl border shadow-sm overflow-hidden">
        <table class="w-full text-sm">
            <thead class="bg-gray-50 text-gray-500">
                <tr>
                    <th class="text-left px-6 py-4">ID</th>
                    <th class="text-left px-6 py-4">Tanggal</th>
                    <th class="text-left px-6 py-4">Total</th>
                    <th class="text-left px-6 py-4">Status</th>
                </tr>
            </thead>
            <tbody>

 @forelse($lastOrders as $order)
<tr class="border-t">
    <td class="px-6 py-4">
        #ORD-{{ $loop->iteration }}
    </td>

    <td class="px-6 py-4">
        {{ \Carbon\Carbon::parse($order->tanggal)->format('d M Y') }}
    </td>

    <td class="px-6 py-4">
        Rp {{ number_format($order->total,0,',','.') }}
    </td>

    <td class="px-6 py-4">
        <span class="px-3 py-1 rounded-full text-xs
            @if($order->status == 'pending') bg-yellow-100 text-yellow-600
            @else bg-green-100 text-green-600 @endif">
            {{ ucfirst($order->status) }}
        </span>
    </td>
</tr>
@empty
<tr>
    <td colspan="4" class="px-6 py-6 text-center text-gray-500">
        Belum ada pesanan
    </td>
</tr>
@endforelse

            </tbody>
        </table>
    </div>

</section>

<!-- CTA -->
<section
    class="bg-white rounded-3xl p-10 border shadow-sm
           flex flex-col md:flex-row items-center justify-between gap-6">

    <div>
        <h3 class="text-xl font-semibold text-gray-900">
            Butuh bantuan?
        </h3>
        <p class="text-sm text-gray-500 mt-1">
            Admin siap membantu pesananmu
        </p>
    </div>

    <a href="/chat"
       class="inline-flex items-center gap-2
              px-6 py-3 rounded-xl
              bg-primary text-white text-sm font-medium
              hover:bg-orange-600 transition">
        Chat Admin
    </a>

</section>

</x-layout>
