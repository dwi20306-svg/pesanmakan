<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'NusaEat' }}</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        poppins: ['Poppins', 'sans-serif'],
                    },
                    colors: {
                        primary: '#F97316',
                    }
                }
            }
        }
    </script>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>

<body class="bg-gray-50 font-poppins text-gray-800 h-screen overflow-hidden">

<div class="flex h-full">

    <!-- SIDEBAR -->
    <aside id="sidebar"
        class="fixed inset-y-0 left-0 z-30
               w-64 bg-white border-r
               transition-all duration-300 ease-in-out
               flex flex-col">

        <!-- BRAND -->
        <div class="h-16 flex items-center px-6 border-b">
            <h1 class="text-lg font-semibold sidebar-text">
                Nusa<span class="text-primary">Eat</span>
            </h1>
        </div>

        <!-- MENU -->
        <nav class="px-3 py-4 flex-1">
            <ul class="space-y-1 text-sm">

                <li>
                    <a href="/dashboard"
                       class="menu-item {{ request()->is('dashboard*') ? 'active' : '' }}">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-width="1.8"
                                  d="M3 12l9-9 9 9v9a2 2 0 0 1-2 2h-4a2 2 0 0 1-2-2V12H9v7a2 2 0 0 1-2 2H3z"/>
                        </svg>
                        <span class="sidebar-text">Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="/menu"
                       class="menu-item {{ request()->is('menu*') ? 'active' : '' }}">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-width="1.8" d="M4 6h16M4 12h16M4 18h10"/>
                        </svg>
                        <span class="sidebar-text">Menu</span>
                    </a>
                </li>

                <li>
                    <a href="/order"
                       class="menu-item {{ request()->is('order*') ? 'active' : '' }}">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-width="1.8"
                                  d="M3 7h18M5 7v13a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V7"/>
                        </svg>
                        <span class="sidebar-text">Order</span>
                    </a>
                </li>

                <li>
                    <a href="/chat"
                       class="menu-item {{ request()->is('chat*') ? 'active' : '' }}">
                        <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path stroke-width="1.8"
                                  d="M21 15a4 4 0 0 1-4 4H7l-4 4V7a4 4 0 0 1 4-4h10a4 4 0 0 1 4 4z"/>
                        </svg>
                        <span class="sidebar-text">Chat</span>
                    </a>
                </li>

            </ul>
        </nav>

        <!-- LOGOUT -->
        <div class="px-3 py-4 border-t">
            <form method="POST" action="/logout">
                @csrf
                <button type="submit"
                    class="menu-item w-full text-red-500 hover:bg-red-50">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                        <path stroke-width="1.8"
                              d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                        <path stroke-width="1.8" d="M16 17l5-5-5-5"/>
                        <path stroke-width="1.8" d="M21 12H9"/>
                    </svg>
                    <span class="sidebar-text">Logout</span>
                </button>
            </form>
        </div>

    </aside>

    <!-- CONTENT -->
    <div id="content" class="flex-1 ml-64 flex flex-col transition-all duration-300">

        <!-- TOP NAVBAR -->
        <header class="h-16 bg-white border-b flex items-center justify-between px-6 sticky top-0 z-20">

            <button onclick="toggleSidebar()"
                class="p-2 rounded-lg hover:bg-gray-100 transition">
                <svg class="w-6 h-6 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-width="1.8" d="M4 6h16M4 12h16M4 18h16"/>
                </svg>
            </button>

            <a href="/profil"
               class="flex items-center gap-3 hover:bg-gray-100 px-3 py-2 rounded-xl transition">
                <img src="{{ asset('img/avatar1.jpeg') }}"
                     class="w-9 h-9 rounded-full object-cover">
                <div class="leading-tight text-right hidden md:block">
                    <p class="text-sm font-medium">
                        {{ auth()->user()->name ?? 'User' }}
                    </p>
                    <span class="text-xs text-gray-400">User</span>
                </div>
            </a>

        </header>

        <!-- PAGE CONTENT -->
        <main class="flex-1 overflow-y-auto px-10 py-8">
            {{ $slot }}
        </main>

    </div>
</div>

<!-- STYLE -->
<style>
.menu-item{
    display:flex;
    align-items:center;
    gap:14px;
    padding:10px 14px;
    border-radius:10px;
    color:#6b7280;
    transition:.2s;
}
.menu-item:hover{
    background:#f3f4f6;
}
.menu-item.active{
    background:rgba(249,115,22,.1);
    color:#f97316;
    font-weight:500;
}
.icon{
    width:22px;
    height:22px;
    flex-shrink:0;
}
.sidebar-collapsed{
    width:80px!important;
}
.sidebar-collapsed .sidebar-text{
    display:none;
}
.sidebar-collapsed .menu-item{
    justify-content:center;
}
.content-collapsed{
    margin-left:80px!important;
}
</style>

<script>
function toggleSidebar(){
    document.getElementById('sidebar').classList.toggle('sidebar-collapsed')
    document.getElementById('content').classList.toggle('content-collapsed')
}
</script>

</body>
</html>
