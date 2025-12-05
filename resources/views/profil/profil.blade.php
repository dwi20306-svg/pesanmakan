<x-layout title="Profil Saya - NusaEat">

    <header class="mb-6">
        <h2 class="text-xl font-semibold">Profil</h2>
    </header>

    <div class="flex flex-col items-center mb-10">
        <img src="{{ asset('profil/avatar.png') }}" class="w-32 h-32 rounded-full object-cover shadow-md" alt="Avatar Profil">
    </div>

    <form class="w-full max-w-md mx-auto bg-white shadow-md rounded-xl p-6">

        <div class="mb-4">
            <label for="nama" class="block text-sm font-medium mb-1 capitalize">nama</label>
            <input type="text" id="nama" name="nama"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-orange-400 outline-none">
        </div>

        <div class="mb-4">
            <label for="username" class="block text-sm font-medium mb-1 capitalize">username</label>
            <input type="text" id="username" name="username"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-orange-400 outline-none">
        </div>

        <div class="mb-4">
            <label for="email" class="block text-sm font-medium mb-1 capitalize">email</label>
            <input type="text" id="email" name="email"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-orange-400 outline-none">
        </div>

        <div class="mb-6">
            <label for="password" class="block text-sm font-medium mb-1 capitalize">password</label>
            <input type="password" id="password" name="password"
                class="w-full border rounded-lg p-2 focus:ring-2 focus:ring-orange-400 outline-none">
        </div>

        <div class="flex justify-between">
            <button type="button"
                class="px-5 py-2 rounded-lg border border-gray-400 hover:bg-gray-100 transition">
                Batal
            </button>

            <button type="submit"
                class="px-6 py-2 rounded-lg bg-orange-500 text-white font-semibold hover:bg-orange-600 transition">
                Simpan
            </button>
        </div>

    </form>

</x-layout>
