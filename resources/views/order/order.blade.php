<x-layout title="Order Menu - NusaEat">

    <div class="flex min-h-screen bg-gray-100">
        
        {{-- Sidebar --}}
        <aside class="w-64 bg-white shadow-md p-6">
            <h1 class="text-2xl font-bold mb-8 tracking-wide text-orange-500">NusaEat</h1>

            <nav>
                <ul class="space-y-4 text-gray-700">
                    <li>
                        <a href="{{ route('user.dashboard') }}" class="flex items-center gap-2 hover:text-orange-500">
                            <i class="fas fa-home"></i> Dashboard
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profil') }}" class="flex items-center gap-2 hover:text-orange-500">
                            <i class="fas fa-user"></i> Profil saya
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.menu') }}" class="flex items-center gap-2 text-orange-500 font-semibold">
                            <i class="fas fa-receipt"></i> Order Menu
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('menu') }}" class="flex items-center gap-2 hover:text-orange-500">
                            <i class="fas fa-utensils"></i> Menu
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        {{-- Main --}}
        <main class="flex-1 p-10 space-y-10">

            {{-- Balance --}}
            <section>
                <h3 class="uppercase font-semibold text-gray-600 tracking-wider mb-4">Your Balance</h3>
                <div class="bg-white p-6 rounded-xl shadow flex justify-between items-center">
                    <div>
                        <span class="text-gray-600 text-sm">Balance</span>
                        <p class="text-2xl font-bold">Rp 500.000</p>
                    </div>
                    <div class="flex gap-6">
                        <button class="flex flex-col items-center">
                            <i class="fas fa-wallet text-xl"></i>
                            <span class="text-sm">transfer</span>
                        </button>
                        <button class="flex flex-col items-center">
                            <i class="fas fa-arrow-up-from-bracket text-xl"></i>
                            <span class="text-sm">top up</span>
                        </button>
                    </div>
                </div>
            </section>

            {{-- Order List --}}
            <section>
                <h2 class="text-2xl font-bold uppercase tracking-wide mb-6">Order Menu</h2>

                {{-- Item --}}
                <div class="flex items-center gap-4 bg-white p-4 rounded-lg shadow mb-4">
                    <img src="{{ asset('order/SOTO.jpeg') }}" class="w-20 h-20 rounded object-cover">
                    <div>
                        <h4 class="font-semibold capitalize">soto ayam medan</h4>
                        <span>1 x</span>
                        <p class="font-bold text-lg">Rp 25.000,00</p>
                    </div>
                </div>

                <div class="flex items-center gap-4 bg-white p-4 rounded-lg shadow">
                    <img src="{{ asset('order/Ayam_Woku.jpeg') }}" class="w-20 h-20 rounded object-cover">
                    <div>
                        <h4 class="font-semibold capitalize">ayam woku kemangi</h4>
                        <span>1 x</span>
                        <p class="font-bold text-lg">Rp 25.000,00</p>
                    </div>
                </div>
            </section>

            {{-- Total --}}
            <section class="flex justify-between text-lg font-semibold">
                <span>Total Pesanan</span>
                <span>Rp 50.000,00</span>
            </section>

            {{-- Checkout --}}
            <button class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-lg text-lg font-semibold">
                Check Out
            </button>

        </main>
    </div>

</x-layout>
