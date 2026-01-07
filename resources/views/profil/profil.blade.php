<x-layout title="Profil Saya - NusaEat">

<!-- HEADER -->
<header class="mb-10">
    <h2 class="text-2xl font-semibold text-gray-900 tracking-tight">
        Profil Saya
    </h2>
    <p class="text-sm text-gray-500 mt-1">
        Kelola informasi akun kamu
    </p>
</header>

<div class="max-w-3xl mx-auto">
<div class="bg-white rounded-3xl shadow-sm border border-gray-100 p-8">

<!-- AVATAR -->
<div class="flex flex-col items-center mb-10">
    <img
        src="{{ asset('img/avatar1.jpeg') }}"
        class="w-28 h-28 rounded-full object-cover
               ring-4 ring-white shadow-md">

    <h3 class="mt-4 text-lg font-semibold text-gray-900">
        {{ auth()->user()->name }}
    </h3>
    <p class="text-sm text-gray-500 capitalize">
        {{ auth()->user()->role }}
    </p>
</div>

<!-- FORM -->
<form
    action="{{ route('profile.update') }}"
    method="POST"
    class="grid grid-cols-1 gap-6 max-w-xl mx-auto">

    @csrf
    @method('PUT')

    <!-- NAMA -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Nama Lengkap
        </label>
        <input
            type="text"
            name="name"
            value="{{ old('name', auth()->user()->name) }}"
            class="w-full rounded-xl border border-gray-200
                   px-4 py-3 text-sm
                   focus:ring-2 focus:ring-primary/40
                   focus:border-primary outline-none">
    </div>

    <!-- EMAIL -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Email
        </label>
        <input
            type="email"
            name="email"
            value="{{ old('email', auth()->user()->email) }}"
            class="w-full rounded-xl border border-gray-200
                   px-4 py-3 text-sm
                   focus:ring-2 focus:ring-primary/40
                   focus:border-primary outline-none">
    </div>

    <!-- PASSWORD -->
    <div>
        <label class="block text-sm font-medium text-gray-700 mb-1">
            Password Baru
        </label>
        <input
            type="password"
            name="password"
            placeholder="Kosongkan jika tidak diubah"
            class="w-full rounded-xl border border-gray-200
                   px-4 py-3 text-sm
                   focus:ring-2 focus:ring-primary/40
                   focus:border-primary outline-none">
    </div>

    <!-- ACTION -->
    <div class="flex justify-end gap-4 pt-4">
        <a href="/dashboard"
           class="px-5 py-2.5 rounded-xl
                  text-sm font-medium
                  border border-gray-200
                  text-gray-600 hover:bg-gray-50">
            Batal
        </a>

        <button
            type="submit"
            class="px-6 py-2.5 rounded-xl
                   text-sm font-medium
                   bg-primary text-white
                   hover:bg-orange-600 shadow-sm">
            Simpan Perubahan
        </button>
    </div>

</form>

</div>
</div>

</x-layout>
