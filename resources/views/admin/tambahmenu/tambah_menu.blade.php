<x-admin-layout title="Tambah Menu">
@if(session('success'))
<div id="alert-success"
     class="mb-6 flex items-center gap-3 rounded-xl bg-green-50
            border border-green-200 px-4 py-3 text-green-700">

    <i class="fa-solid fa-circle-check text-lg"></i>

    <span class="text-sm font-medium">
        {{ session('success') }}
    </span>

    <button onclick="closeAlert()"
            class="ml-auto text-green-500 hover:text-green-700">
        <i class="fa-solid fa-xmark"></i>
    </button>
</div>
@endif
<section class="bg-white rounded-2xl border shadow-sm p-8 max-w-3xl">

    <!-- HEADER -->
    <div class="mb-8">
        <h2 class="text-xl font-semibold">Tambah Menu</h2>
        <p class="text-sm text-gray-500">
            Tambahkan menu makanan atau minuman baru
        </p>
    </div>

    <!-- FORM -->
    <form method="POST"
          action="/tambah_menu"
          enctype="multipart/form-data"
          class="space-y-6">
        @csrf

        <!-- NAMA MENU -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-2">
                Nama Menu
            </label>
            <input type="text"
                   name="nama_menu"
                   required
                   placeholder="Contoh: Nasi Goreng Spesial"
                   class="w-full rounded-xl border px-4 py-3 text-sm
                          focus:outline-none focus:ring-2 focus:ring-primary/40">
        </div>

        <!-- KATEGORI -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-2">
                Kategori
            </label>
            <select name="kategori"
                    required
                    class="w-full rounded-xl border px-4 py-3 text-sm
                           focus:outline-none focus:ring-2 focus:ring-primary/40">
                <option value="">-- Pilih Kategori --</option>
                <option value="Makanan">Makanan</option>
                <option value="Minuman">Minuman</option>
                <option value="Cemilan">Cemilan</option>
            </select>
        </div>

        <!-- HARGA -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-2">
                Harga
            </label>
            <input type="number"
                   name="harga"
                   required
                   placeholder="Contoh: 25000"
                   class="w-full rounded-xl border px-4 py-3 text-sm
                          focus:outline-none focus:ring-2 focus:ring-primary/40">
        </div>

        <!-- DESKRIPSI -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-2">
                Deskripsi
            </label>
            <textarea name="deskripsi"
                      rows="4"
                      placeholder="Deskripsi menu"
                      class="w-full rounded-xl border px-4 py-3 text-sm
                             focus:outline-none focus:ring-2 focus:ring-primary/40"></textarea>
        </div>

        <!-- FOTO -->
        <div>
            <label class="block text-sm font-medium text-gray-600 mb-2">
                Foto Menu
            </label>
            <input type="file"
                   name="foto"
                   class="w-full text-sm file:mr-4 file:py-2 file:px-4
                          file:rounded-lg file:border-0
                          file:bg-primary/10 file:text-primary
                          hover:file:bg-primary/20">
        </div>

        <!-- STATUS -->
        <div class="flex items-center gap-3">
            <input type="checkbox"
                   name="is_active"
                   checked
                   class="rounded border-gray-300">
            <span class="text-sm text-gray-600">Aktifkan menu</span>
        </div>

        <!-- BUTTON -->
        <div class="flex justify-end gap-3 pt-4">
            <a href="/admin/dashboard"
               class="px-5 py-2.5 rounded-xl text-sm
                      bg-gray-100 hover:bg-gray-200 transition">
                Batal
            </a>

            <button type="submit"
                class="px-5 py-2.5 rounded-xl text-sm font-medium
                       bg-primary text-white hover:bg-orange-600 transition">
                Simpan Menu
            </button>
        </div>

    </form>

</section>

</x-admin-layout>
