<x-admin-layout title="Kelola User">

<section class="bg-white rounded-2xl border shadow-sm p-8">

    <div class="mb-6">
        <h2 class="text-xl font-semibold">Kelola User</h2>
        <p class="text-sm text-gray-500">Daftar pengguna aplikasi NusaEat</p>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-sm border-collapse">
            <thead class="bg-gray-50 text-gray-500">
                <tr>
                    <th class="text-left px-4 py-3">Nama</th>
                    <th class="text-left px-4 py-3">Email</th>
                    <th class="text-left px-4 py-3">Role</th>
                </tr>
            </thead>

            <tbody>
            @forelse ($users as $user)
                <tr class="border-t hover:bg-gray-50">

                    <td class="px-4 py-3 font-medium">
                        {{ $user->name }}
                    </td>

                    <td class="px-4 py-3">
                        {{ $user->email }}
                    </td>

                    <td class="px-4 py-3 capitalize">
                        {{ $user->role ?? 'user' }}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center py-6 text-gray-400">
                        Tidak ada data user
                    </td>
                </tr>
            @endforelse
            </tbody>

        </table>
    </div>

</section>

</x-admin-layout>
