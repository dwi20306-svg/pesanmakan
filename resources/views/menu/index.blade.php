<x-layout title="Menu - NusaEat">

<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<main class="p-10 space-y-12 max-w-7xl mx-auto">

    <!-- HEADER -->
    <header class="flex items-end justify-between">
        <div>
            <h2 class="text-3xl font-semibold text-gray-900 tracking-tight">
                Menu
            </h2>
            <p class="text-sm text-gray-500 mt-1">
                Pilih menu favoritmu hari ini
            </p>
        </div>
    </header>

    <!-- NOTIF -->
    @if(session('success'))
        <div class="bg-green-100 text-green-700 px-4 py-3 rounded-xl mb-6">
            {{ session('success') }}
        </div>
    @endif

    <!-- MENU GRID -->
    <section
      class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">

    @forelse ($menus as $menu)
        <div
          class="group bg-white rounded-3xl overflow-hidden
                 border border-gray-100
                 shadow-[0_15px_30px_rgba(0,0,0,0.06)]
                 hover:shadow-[0_30px_60px_rgba(0,0,0,0.12)]
                 hover:-translate-y-1
                 transition-all duration-300">

            <!-- IMAGE -->
            <div class="relative h-44 overflow-hidden">
                <img
                    src="{{ asset('storage/'.$menu->foto) }}"
                    class="absolute inset-0 w-full h-full object-cover
                           group-hover:scale-110 transition duration-500">

                <div
                    class="absolute top-4 left-4
                           bg-white/90 backdrop-blur
                           text-xs px-3 py-1 rounded-full font-medium">
                    {{ ucfirst($menu->kategori) }}
                </div>
            </div>

            <!-- CONTENT -->
            <div class="p-5 space-y-4">

                <h4 class="text-sm font-semibold text-gray-900 capitalize">
                    {{ $menu->nama_menu }}
                </h4>

                <p class="text-xs text-gray-500 line-clamp-2">
                    {{ $menu->deskripsi }}
                </p>

                <div class="flex items-center justify-between">

                    <span class="text-base font-semibold text-gray-900">
                        Rp {{ number_format($menu->harga,0,',','.') }}
                    </span>

                    <!-- ADD TO CART -->
                    <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                        @csrf
                        <button
                            type="submit"
                            class="w-11 h-11 rounded-xl
                                   bg-gray-100 text-gray-700
                                   hover:bg-primary hover:text-white
                                   active:scale-95
                                   transition flex items-center justify-center
                                   shadow-sm">
                            <i class="fa-solid fa-plus"></i>
                        </button>
                    </form>

                </div>
            </div>

        </div>
    @empty
        <p class="col-span-full text-center text-gray-500">
            Menu belum tersedia
        </p>
    @endforelse

    </section>

</main>
</x-layout>
