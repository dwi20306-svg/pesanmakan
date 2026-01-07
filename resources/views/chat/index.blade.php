<x-layout title="Chat Admin">

<section class="flex h-[calc(100vh-8rem)] bg-white rounded-2xl shadow-sm border overflow-hidden">

    <!-- ADMIN LIST -->
    <aside class="w-72 border-r bg-gray-50 hidden md:flex flex-col">

        <div class="p-4 border-b font-semibold text-sm">
            Admin
        </div>

        <div class="flex-1 overflow-y-auto">
            <div class="w-full flex items-center gap-3 px-4 py-3">
                <img src="{{ asset('img/avatar1.jpeg') }}"
                     class="w-10 h-10 rounded-full object-cover">
                <div>
                    <p class="text-sm font-medium">Admin NusaEat</p>
                    <span class="text-xs text-green-500">Online</span>
                </div>
            </div>
        </div>

    </aside>

    <!-- CHAT AREA -->
    <div class="flex-1 flex flex-col">

        <!-- HEADER -->
        <div class="h-16 border-b flex items-center px-6 gap-3">
            <img src="{{ asset('img/avatar1.jpeg') }}" class="w-10 h-10 rounded-full">
            <div>
                <p class="text-sm font-semibold">Admin NusaEat</p>
                <span class="text-xs text-green-500">Online</span>
            </div>
        </div>

        <!-- MESSAGES -->
        <div class="flex-1 overflow-y-auto px-6 py-4 space-y-4 bg-gray-50">

            @forelse ($messages as $msg)

                @if ($msg->sender === 'admin')
                    <!-- ADMIN MESSAGE -->
                    <div class="flex items-start gap-3">
                        <img src="{{ asset('img/avatar1.jpeg') }}" class="w-8 h-8 rounded-full">
                        <div class="bg-white px-4 py-2 rounded-xl shadow-sm max-w-md text-sm">
                            {{ $msg->message }}
                        </div>
                    </div>
                @else
                    <!-- USER MESSAGE -->
                    <div class="flex justify-end">
                        <div class="bg-primary text-white px-4 py-2 rounded-xl shadow-sm max-w-md text-sm">
                            {{ $msg->message }}
                        </div>
                    </div>
                @endif

            @empty
                <p class="text-center text-sm text-gray-400">
                    Belum ada pesan
                </p>
            @endforelse

        </div>

        <!-- INPUT -->
        <form method="POST" action="/chat"
              class="h-16 border-t flex items-center gap-3 px-6 bg-white">
            @csrf

            <input type="text" name="message" required
                placeholder="Ketik pesan..."
                class="flex-1 border rounded-xl px-4 py-2 text-sm
                       focus:outline-none focus:ring-2 focus:ring-primary/40">

            <button type="submit"
                class="bg-primary text-white px-5 py-2 rounded-xl text-sm
                       font-medium hover:bg-orange-600 transition">
                Kirim
            </button>
        </form>

    </div>

</section>

</x-layout>
