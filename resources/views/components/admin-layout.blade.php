<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $title ?? 'NusaEat Admin' }}</title>

<script src="https://cdn.tailwindcss.com"></script>
<script>
tailwind.config = {
  theme: {
    extend: {
      colors: {
        primary: '#F97316',
      },
      fontFamily: {
        poppins: ['Poppins', 'sans-serif']
      }
    }
  }
}
</script>

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body class="bg-gray-50 text-gray-800 font-poppins">
@php
use App\Models\Message;

$unreadChats = Message::where('sender', 'user')
    ->where('is_read', 0)
    ->count();
@endphp
<div class="flex h-screen">

<!-- SIDEBAR -->
<aside class="w-64 bg-white border-r flex flex-col px-6 py-8">

  <!-- BRAND -->
  <div class="mb-12">
    <h1 class="text-xl font-semibold">
      Nusa<span class="text-primary">Eat</span>
    </h1>
    <p class="text-xs text-gray-400 mt-1">Admin Dashboard</p>
  </div>

  <!-- MENU -->
  <nav class="space-y-1 text-sm flex-1">

    <a href="/admin/dashboard"
       class="menu-item {{ request()->is('admin/dashboard') ? 'active' : '' }}">
      <i class="fa-solid fa-chart-line w-5"></i>
      Dashboard
    </a>

    <a href="/neworder/new_order"
       class="menu-item {{ request()->is('neworder/*') ? 'active' : '' }}">
      <i class="fa-solid fa-bell w-5"></i>
      New Order
    </a>

<a href="/admin/chat"
   class="menu-item {{ request()->is('admin/chat*') ? 'active' : '' }}">

  <div class="flex items-center gap-3 flex-1">
    <i class="fa-solid fa-comments w-5"></i>
    <span>Chat User</span>
  </div>

  @if($unreadChats > 0)
    <span
      class="ml-auto
             min-w-[18px] h-[18px]
             text-[10px] font-semibold
             bg-red-500 text-white
             rounded-full
             flex items-center justify-center">
      {{ $unreadChats }}
    </span>
  @endif

</a>

    <a href="/admin/users"
       class="menu-item {{ request()->is('admin/users*') ? 'active' : '' }}">
      <i class="fa-solid fa-users w-5"></i>
      Kelola User
    </a>

    <a href="/tambah_menu"
       class="menu-item {{ request()->is('tambah_menu*') ? 'active' : '' }}">
      <i class="fa-solid fa-utensils w-5"></i>
      Menu
    </a>

  </nav>

  <!-- LOGOUT -->
  <div class="pt-4 border-t">
    <form method="POST" action="/logout">
      @csrf
      <button type="submit"
        class="menu-item w-full text-red-500 hover:bg-red-50">
        <i class="fa-solid fa-right-from-bracket w-5"></i>
        Logout
      </button>
    </form>
  </div>

</aside>

<!-- CONTENT -->
<main class="flex-1 overflow-y-auto p-10">
  {{ $slot }}
</main>

</div>

<style>
.menu-item{
  display:flex;
  align-items:center;
  gap:12px;
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
</style>

</body>
</html>
