<x-layout title="Order Menu - NusaEat">

<main class="p-10 space-y-10 max-w-4xl mx-auto">

    <h2 class="text-2xl font-semibold">Pesanan Anda</h2>

    @if(empty($cart))
        <p class="text-gray-500">Belum ada pesanan</p>
    @else

    <div class="space-y-4">
        @foreach($cart as $item)
        <div class="flex items-center gap-5 bg-white rounded-2xl p-5 border shadow-sm">

            <img src="{{ asset('storage/'.$item['foto']) }}"
                 class="w-20 h-20 rounded-xl object-cover">

            <div class="flex-1">
                <h4 class="font-medium">{{ $item['nama'] }}</h4>
                <p class="text-sm text-gray-500">Qty: {{ $item['qty'] }}</p>
            </div>

            <div class="font-semibold">
                Rp {{ number_format($item['harga'] * $item['qty'],0,',','.') }}
            </div>

            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                @csrf
                <button class="text-red-500 hover:text-red-700 text-sm">
                    Hapus
                </button>
            </form>

        </div>
        @endforeach
    </div>

    <div class="flex justify-between text-lg font-semibold border-t pt-6">
        <span>Total</span>
        <span>Rp {{ number_format($total,0,',','.') }}</span>
    </div>

<form action="{{ route('checkout') }}" method="POST">
    @csrf
    <button
        type="submit"
        class="w-full bg-primary hover:bg-orange-600
               text-white py-4 rounded-2xl font-medium">
        Checkout Pesanan
    </button>
</form>

    @endif

</main>

</x-layout>
