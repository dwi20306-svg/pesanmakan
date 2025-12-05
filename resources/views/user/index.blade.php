<x-layout title="Dashboard User">

    <header class="mb-6">
        <h2 class="text-xl font-semibold">Hello, Naja Nela</h2>
    </header>

    <section class="relative bg-orange-500 text-white rounded-xl p-6 flex items-center justify-between mb-10">
        <div>
            <h3 class="text-xl font-bold">Get Discount Voucher</h3>
            <p class="text-lg">Up to 20%</p>
        </div>
        <img src="{{ asset('images/dashboard_user/banner.png') }}" class="w-40 object-contain">
    </section>

    <section class="mb-12">
        <h3 class="text-lg font-semibold mb-4">Populer Menu</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @for ($i = 1; $i <= 4; $i++)
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:scale-105 transition">
                    <img src="{{ asset("images/dashboard_user/populer$i.jpeg") }}" class="w-full h-32 object-cover">
                    <div class="p-4 flex justify-between text-sm">
                        <span>★★★★☆</span>
                        <span class="font-semibold">Rp 25.000</span>
                    </div>
                </div>
            @endfor
        </div>
    </section>

    <section>
        <h3 class="text-lg font-semibold mb-4">Riwayat Menu</h3>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @for ($i = 1; $i <= 3; $i++)
                <div class="bg-white shadow-md rounded-lg overflow-hidden hover:scale-105 transition">
                    <img src="{{ asset("images/dashboard_user/history$i.jpeg") }}" class="w-full h-32 object-cover">
                    <div class="p-4 flex justify-between text-sm">
                        <span>★★★★★</span>
                        <span class="font-semibold">Rp 25.000</span>
                    </div>
                </div>
            @endfor
        </div>
    </section>

</x-layout>
