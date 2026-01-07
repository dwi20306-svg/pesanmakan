<x-admin-layout title="Chat User">

<section class="bg-white rounded-2xl border shadow-sm overflow-hidden flex h-[calc(100vh-6rem)]">

    <!-- USER LIST -->
    <aside class="w-80 border-r bg-gray-50 flex flex-col">

        <div class="p-5 border-b">
            <h3 class="text-sm font-semibold">Pesan Masuk</h3>
            <p class="text-xs text-gray-400 mt-1">Daftar User</p>
        </div>

        <div class="flex-1 overflow-y-auto">
            @foreach($users as $user)
                <a href="{{ url('/admin/chat/'.$user->id) }}"
                   class="w-full flex items-center gap-3 px-5 py-4 hover:bg-gray-100 transition">
                    <img src="{{ asset('img/avatar1.jpeg') }}" class="w-10 h-10 rounded-full">
                    <div class="flex-1">
                        <p class="text-sm font-medium">{{ $user->name }}</p>
                        <span class="text-xs text-gray-400">
                            {{ $user->messages->last()->message ?? 'Belum ada pesan' }}
                        </span>
                    </div>
                </a>
            @endforeach
        </div>

    </aside>

    <!-- CHAT AREA -->
    <div class="flex-1 flex flex-col">

        @if(isset($activeUser))
        <!-- HEADER -->
        <div class="h-16 border-b flex items-center gap-4 px-6">
            <img src="{{ asset('img/avatar1.jpeg') }}" class="w-9 h-9 rounded-full">
            <div>
                <p class="text-sm font-semibold">{{ $activeUser->name }}</p>
                <span class="text-xs text-gray-400">User</span>
            </div>
        </div>
        @endif

        <!-- MESSAGES -->
        <div class="flex-1 overflow-y-auto bg-gray-50 px-6 py-5 space-y-4">

            @forelse($messages as $msg)
                @if($msg->sender === 'user')
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
            @empty
                <p class="text-sm text-gray-400 text-center mt-10">
                    Belum ada pesan
                </p>
            @endforelse

        </div>

        <!-- INPUT -->
        @if(isset($activeUser))
        <form action="{{ url('/admin/chat/'.$activeUser->id) }}"
              method="POST"
              class="h-16 border-t bg-white flex items-center gap-3 px-6">
            @csrf
            <input type="text" name="message"
                placeholder="Ketik balasan..."
                class="flex-1 border rounded-xl px-4 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-primary/40">
            <button class="bg-primary text-white px-5 py-2 rounded-xl text-sm font-medium">
                Kirim
            </button>
        </form>
        @endif

    </div>

</section>

</x-admin-layout>
