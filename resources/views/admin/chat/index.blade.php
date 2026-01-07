<x-admin-layout title="Chat User">

<section class="bg-white rounded-2xl border shadow-sm overflow-hidden flex h-[calc(100vh-6rem)]">

    <!-- USER LIST -->
    <aside class="w-80 border-r bg-gray-50 flex flex-col">

        <div class="p-5 border-b">
            <h3 class="text-sm font-semibold">Pesan Masuk</h3>
            <p class="text-xs text-gray-400 mt-1">Daftar user</p>
        </div>

        <div class="flex-1 overflow-y-auto">

            @forelse ($users as $user)
            <a href="/admin/chat/{{ $user->id }}"
               class="w-full flex items-center gap-3 px-5 py-4
                      hover:bg-gray-100 transition text-left
                      {{ request()->is('admin/chat/'.$user->id) ? 'bg-gray-100' : '' }}">

                <img src="{{ asset('img/avatar1.jpeg') }}"
                     class="w-10 h-10 rounded-full object-cover">

                <div class="flex-1">
                    <p class="text-sm font-medium">{{ $user->name }}</p>
                    <span class="text-xs text-gray-400">
                        {{ optional($user->messages->last())->message ?? 'Belum ada pesan' }}
                    </span>
                </div>

                @php
                    $unread = $user->messages()
                        ->where('sender','user')
                        ->where('is_read', false)
                        ->count();
                @endphp

                @if ($unread > 0)
                    <span class="text-xs bg-primary text-white px-2 py-0.5 rounded-full">
                        {{ $unread }}
                    </span>
                @endif
            </a>
            @empty
                <p class="text-xs text-gray-400 p-5">Belum ada chat</p>
            @endforelse

        </div>

    </aside>

    <!-- CHAT AREA -->
    <div class="flex-1 flex flex-col">

        @if ($activeUser)

        <!-- CHAT HEADER -->
        <div class="h-16 border-b flex items-center gap-4 px-6">
            <img src="{{ asset('img/avatar1.jpeg') }}" class="w-9 h-9 rounded-full">
            <div>
                <p class="text-sm font-semibold">{{ $activeUser->name }}</p>
                <span class="text-xs text-gray-400">{{ ucfirst($activeUser->role) }}</span>
            </div>
        </div>

        <!-- CHAT BODY -->
        <div class="flex-1 overflow-y-auto bg-gray-50 px-6 py-5 space-y-4">

            @foreach ($messages as $msg)
                @if ($msg->sender === 'user')
                    <div class="flex items-start gap-3">
                        <img src="{{ asset('img/avatar1.jpeg') }}" class="w-8 h-8 rounded-full">
                        <div class="bg-white px-4 py-2 rounded-xl shadow-sm max-w-md text-sm">
                            {{ $msg->message }}
                        </div>
                    </div>
                @else
                    <div class="flex justify-end">
                        <div class="bg-primary text-white px-4 py-2 rounded-xl shadow-sm max-w-md text-sm">
                            {{ $msg->message }}
                        </div>
                    </div>
                @endif
            @endforeach

        </div>

        <!-- INPUT -->
        <form method="POST"
              action="/admin/chat/{{ $activeUser->id }}"
              class="h-16 border-t bg-white flex items-center gap-3 px-6">
            @csrf

            <input type="text" name="message" required
                placeholder="Ketik balasan..."
                class="flex-1 border rounded-xl px-4 py-2 text-sm
                       focus:outline-none focus:ring-2 focus:ring-primary/40">

            <button type="submit"
                class="bg-primary text-white px-5 py-2 rounded-xl text-sm
                       font-medium hover:bg-orange-600 transition">
                Kirim
            </button>
        </form>

        @else
            <div class="flex-1 flex items-center justify-center text-gray-400 text-sm">
                Pilih user untuk memulai chat
            </div>
        @endif

    </div>

</section>

</x-admin-layout>
