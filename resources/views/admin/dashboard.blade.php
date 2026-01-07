<x-admin-layout title="Dashboard">

<h1 class="text-3xl font-semibold mb-8 text-gray-900">Dashboard</h1>

<!-- STATS -->
<section class="grid grid-cols-3 gap-6 mb-12">

<div class="bg-white rounded-xl p-6 shadow-sm border">
  <p class="text-sm text-gray-500">New Order</p>
  <p class="text-3xl font-bold">{{ $newOrder }}</p>
</div>

<div class="bg-white rounded-xl p-6 shadow-sm border">
  <p class="text-sm text-gray-500">Total Order</p>
  <p class="text-3xl font-bold">{{ $totalOrder }}</p>
</div>

<div class="bg-white rounded-xl p-6 shadow-sm border">
  <p class="text-sm text-gray-500">Waiting List</p>
  <p class="text-3xl font-bold">{{ $waitingList }}</p>
</div>

</section>

<!-- ORDER LIST -->
<section>
<h2 class="text-xl font-semibold mb-4 text-gray-900">Order List</h2>

<div class="bg-white rounded-xl p-6 shadow-sm border">

<div class="space-y-4">

@forelse($orders as $order)
<div class="flex items-center justify-between">
  <div class="flex items-center gap-4">
    <div class="w-10 h-10 bg-primary text-white rounded-full flex items-center justify-center text-sm font-semibold">
      {{ strtoupper(substr($order->user->name,0,2)) }}
    </div>
    <div>
      <p class="font-medium text-gray-900">
        {{ $order->user->name }}
      </p>
      <p class="text-xs text-gray-500">
        {{ $order->total }} pesanan
      </p>
    </div>
  </div>

  <span class="text-xs px-3 py-1 rounded-full bg-orange-100 text-orange-700">
    aktif
  </span>
</div>
@empty
<p class="text-sm text-gray-500 text-center">
  Belum ada pesanan
</p>
@endforelse

</div>
</div>
</section>

</x-admin-layout>
