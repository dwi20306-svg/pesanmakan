<x-layout title="Menu - NusaEat">

<div class="flex min-h-screen bg-gray-100">

    {{-- Sidebar --}}
    <aside class="w-64 bg-white shadow-md p-6">
        <h1 class="text-2xl font-bold mb-10 tracking-wide text-orange-500">NusaEat</h1>

        <nav>
            <ul class="space-y-5 text-gray-700 font-medium">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2 hover:text-orange-500">
                        <i class="fas fa-home"></i> Dashboard
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.orders') }}" class="flex items-center gap-2 hover:text-orange-500">
                        <i class="fas fa-bell"></i> New Order
                    </a>
                </li>
                <li>
                    <a href="{{ route('admin.menu') }}" class="flex items-center gap-2 text-orange-500 font-semibold">
                        <i class="fas fa-utensils"></i> Tambah Menu
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- Main --}}
    <main class="flex-1 p-10">

        {{-- Header --}}
        <div class="flex justify-between items-center mb-8">
            <h2 class="text-3xl font-bold uppercase">Menu</h2>
            <button id="addMenuBtn" class="bg-orange-500 hover:bg-orange-600 text-white px-5 py-3 rounded-md font-semibold flex items-center gap-2">
                <i class="fas fa-plus"></i> Tambahkan menu
            </button>
        </div>

        {{-- List Menu --}}
        <section>
            <ul class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-6">

                {{-- Item Menu --}}
                <li class="bg-white shadow rounded-xl overflow-hidden">
                    <img src="/tambah menu/SOTO ayam.jpeg" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold capitalize mb-2">soto ayam</h3>
                        <p class="font-bold text-lg">25,000.00</p>
                    </div>
                </li>

                <li class="bg-white shadow rounded-xl overflow-hidden">
                    <img src="/tambah menu/Irresistible Desserts.jpeg" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold capitalize mb-2">rendang ayam</h3>
                        <p class="font-bold text-lg">25,000.00</p>
                    </div>
                </li>

                <li class="bg-white shadow rounded-xl overflow-hidden">
                    <img src="/tambah menu/Opor ayam.jpeg" class="w-full h-48 object-cover">
                    <div class="p-4">
                        <h3 class="font-semibold capitalize mb-2">opor ayam</h3>
                        <p class="font-bold text-lg">25,000.00</p>
                    </div>
                </li>

                {{-- Tambahkan item lain seperti di HTML lama --}}
            </ul>
        </section>

    </main>
</div>

{{-- Modal Tambah Menu --}}
<div id="addMenuModal" class="fixed inset-0 bg-black/40 hidden place-items-center">
    <div class="bg-white w-96 p-6 rounded-lg shadow-lg relative">

        <button id="closeBtn" class="absolute right-3 top-3 text-gray-500 hover:text-black text-xl">&times;</button>

        <h3 class="text-xl font-semibold mb-5">Tambah Menu Baru</h3>

        <form id="addMenuForm" class="space-y-4">
            <div>
                <label class="block font-medium">Nama Menu</label>
                <input type="text" id="namaMenu" class="w-full border rounded px-3 py-2" required>
            </div>
            <div>
                <label class="block font-medium">Harga</label>
                <input type="number" id="hargaMenu" class="w-full border rounded px-3 py-2" min="0" required>
            </div>
            <div>
                <label class="block font-medium">URL Gambar</label>
                <input type="text" id="gambarMenu" class="w-full border rounded px-3 py-2" placeholder="https://..." required>
            </div>
            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-2 rounded font-semibold">
                Simpan Menu
            </button>
        </form>

    </div>
</div>

<script>
    const openBtn = document.getElementById("addMenuBtn");
    const modal = document.getElementById("addMenuModal");
    const closeBtn = document.getElementById("closeBtn");

    openBtn.onclick = () => modal.classList.remove("hidden");
    closeBtn.onclick = () => modal.classList.add("hidden");
</script>

</x-layout>
