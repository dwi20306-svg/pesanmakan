@extends('layouts.app')

@section('title', 'NusaEat - New Order')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

<div class="container">

    {{-- Sidebar --}}
    <aside class="sidebar">
        <h1 class="logo">NusaEat</h1>
        
        <nav class="navigation">
            <ul>
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="nav-link">
                        <i class="fas fa-home"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('new.order') }}" class="nav-link active">
                        <i class="fas fa-bell"></i>
                        <span>New Order</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('menu.tambah') }}" class="nav-link">
                        <i class="fas fa-utensils"></i>
                        <span>Tambah Menu</span>
                    </a>
                </li>
            </ul>
        </nav>
    </aside>

    {{-- Main --}}
    <main class="main-content">
        <header class="content-header">
            <h2>new order</h2>
        </header>

        <div class="order-container">

            {{-- Search Bar --}}
            <div class="search-bar">
                <input type="text" id="searchInput" placeholder="Search an order">
                <i class="fas fa-search"></i>
            </div>

            {{-- Order List --}}
            <ul class="order-list" id="orderList">

                <li class="order-item">
                    <div class="initials nn">NN</div>
                    <div class="order-details">
                        <span class="customer-name">Naja nela</span>
                        <span class="order-count">3 pesanan</span>
                    </div>
                    <span class="status-badge status-selesai">selesai</span>
                </li>

                <li class="order-item">
                    <div class="initials cl">CL</div>
                    <div class="order-details">
                        <span class="customer-name">ceci lia</span>
                        <span class="order-count">5 pesanan</span>
                    </div>
                    <span class="status-badge status-proses">proses</span>
                </li>

                <li class="order-item">
                    <div class="initials ds">DS</div>
                    <div class="order-details">
                        <span class="customer-name">dwi sasta</span>
                        <span class="order-count">2 pesanan</span>
                    </div>
                    <span class="status-badge status-proses">proses</span>
                </li>

                <li class="order-item">
                    <div class="initials js">JS</div>
                    <div class="order-details">
                        <span class="customer-name">juwita elsa</span>
                        <span class="order-count">1 pesanan</span>
                    </div>
                    <span class="status-badge status-selesai">selesai</span>
                </li>

                <li class="order-item">
                    <div class="initials ss">SS</div>
                    <div class="order-details">
                        <span class="customer-name">suci sasla</span>
                        <span class="order-count">4 pesanan</span>
                    </div>
                    <span class="status-badge status-proses">proses</span>
                </li>

            </ul>
        </div>
    </main>

</div>

<script src="{{ asset('js/script.js') }}"></script>
@endsection
