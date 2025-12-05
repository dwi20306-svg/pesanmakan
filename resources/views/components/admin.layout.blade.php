{{-- resources/views/dashboard_admin/index.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NusaEat - Dashboard Admin</title>

    {{-- CSS Laravel: Pastikan file style.css memiliki styling untuk dashboard admin --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    {{-- Font Awesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    {{-- Google Fonts --}}
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@700&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>

    <div class="container">
        
        {{-- BAGIAN 1: SIDEBAR --}}
        <aside class="sidebar">
            <h1 class="logo">NusaEat</h1>
            
            <nav class="navigation">
                <ul>
                    <li>
                        <a href="{{ url('/dashboard-admin') }}" class="nav-link active">
                            <i class="fas fa-home"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        {{-- Menggunakan route yang lebih umum untuk manajemen pesanan --}}
                        <a href="{{ url('/admin/orders/new') }}" class="nav-link">
                            <i class="fas fa-bell"></i>
                            <span>New Order</span>
                        </a>
                    </li>
                    <li>
                        {{-- Menggunakan route yang lebih umum untuk manajemen menu --}}
                        <a href="{{ url('/admin/menu/create') }}" class="nav-link">
                            <i class="fas fa-utensils"></i>
                            <span>Tambah Menu</span>
                        </a>
                    </li>
                     <li>
                        {{-- Menambahkan link lain yang umum ada di dashboard admin --}}
                        <a href="{{ url('/admin/settings') }}" class="nav-link">
                            <i class="fas fa-cog"></i>
                            <span>Pengaturan</span>
                        </a>
                    </li>
                    <li>
                        {{-- Link Logout --}}
                        <a href="{{ url('/logout') }}" class="nav-link logout">
                            <i class="fas fa-sign-out-alt"></i>
                            <span>Keluar</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </aside>

        <main class="main-content">
            
            {{-- BAGIAN 2: HEADER KONTEN --}}
            <header class="content-header">
                <h2>Dashboard Admin</h2>
            </header>

            {{-- BAGIAN 3: STATISTIK RINGKASAN --}}
            <section class="stats-grid">
                
                {{-- STAT CARD: New Order --}}
                <div class="stat-card">
                    <h3>New Order</h3>
                    {{-- Data dinamis: {{ $newOrdersCount ?? '0' }} --}}
                    <p class="stat-number">50</p>
                    <div class="icon-wrapper">
                        <i class="fas fa-bell"></i>
                    </div>
                </div>
                
                {{-- STAT CARD: Total Order --}}
                <div class="stat-card">
                    <h3>Total Order</h3>
                    {{-- Data dinamis: {{ $totalOrdersCount ?? '0' }} --}}
                    <p class="stat-number">102</p>
                    <div class="icon-wrapper">
                        <i class="fas fa-clipboard-check"></i>
                    </div>
                </div>
                
                {{-- STAT CARD: Waiting List --}}
                <div class="stat-card">
                    <h3>Waiting List</h3>
                    {{-- Data dinamis: {{ $waitingListCount ?? '0' }} --}}
                    <p class="stat-number">10</p>
                    <div class="icon-wrapper">
                        <i class="fas fa-clock"></i>
                    </div>
                </div>
            </section>

            {{-- BAGIAN 4: DAFTAR PESANAN --}}
            <section class="order-section">
                <h3 class="order-list-header">Order List Terbaru</h3>
                <div class="order-container">
                    
                    {{-- Search Bar --}}
                    <div class="search-bar">
                        <input type="text" id="searchInput" placeholder="Search an order">
                        <i class="fas fa-search"></i>
                    </div>

                    {{-- Daftar Pesanan --}}
                    <ul class="order-list" id="orderList">
                        
                        {{-- Contoh Item Pesanan 1 (Selesai) --}}
                        {{-- Dalam implementasi Laravel nyata, ini akan menggunakan @foreach ($orders as $order) --}}
                        <li class="order-item">
                            <div class="initials nn">NN</div>
                            <div class="order-details">
                                <span class="customer-name">Naja Nela</span>
                                <span class="order-count">3 pesanan</span>
                            </div>
                            <span class="status-badge status-selesai">Selesai</span>
                        </li>
                        
                        {{-- Contoh Item Pesanan 2 (Proses) --}}
                        <li class="order-item">
                            <div class="initials ds">DS</div>
                            <div class="order-details">
                                <span class="customer-name">Dwi Sasta</span>
                                <span class="order-count">2 pesanan</span>
                            </div>
                            <span class="status-badge status-proses">Proses</span>
                        </li>
                        
                        {{-- Contoh Item Pesanan 3 (Proses) --}}
                        <li class="order-item">
                            <div class="initials cl">CL</div>
                            <div class="order-details">
                                <span class="customer-name">Ceci Lia</span>
                                <span class="order-count">5 pesanan</span>
                            </div>
                            <span class="status-badge status-proses">Proses</span>
                        </li>
                    </ul>
                </div>
            </section>
        </main>
    </div>

    {{-- JS Laravel --}}
    <script src="{{ asset('js/script.js') }}"></script>
</body>
</html>