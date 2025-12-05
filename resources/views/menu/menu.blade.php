@extends('layouts.app')

@section('title', 'Menu - NusaEat')

@section('content')
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

<div class="dashboard-container">

    {{-- Sidebar --}}
    <aside class="sidebar">
        <h1 class="logo">NusaEat</h1>
        <nav class="navigation">
            <ul>
                <li><a href="{{ route('admin.dashboard') }}"><i class="fas fa-home"></i> Dashboard</a></li>
                <li><a href="{{ route('profil') }}"><i class="fas fa-user"></i> Profil Saya</a></li>
                <li><a href="{{ route('order') }}"><i class="fas fa-receipt"></i> Order Menu</a></li>
                <li><a href="{{ route('menu') }}" class="active"><i class="fas fa-utensils"></i> Menu</a></li>
            </ul>
        </nav>
    </aside>

    {{-- Main Content --}}
    <main class="main-content">

        <header class="page-header">
            <h2 data-text="menu">menu</h2>
        </header>

        <section class="menu-page-grid">

            {{-- 1 --}}
            <div class="menu-card">
                <img src="{{ asset('menu/Opor.jpeg') }}" alt="Opor Ayam">
                <div class="card-details">
                    <div class="card-info">
                        <div class="rating">★★★★☆</div>
                        <div class="price">25,000</div>
                    </div>
                    <div class="add-button">+</div>
                </div>
            </div>

            {{-- 2 --}}
            <div class="menu-card">
                <img src="{{ asset('menu/Dessert.jpeg') }}" alt="Dessert Manis">
                <div class="card-details">
                    <div class="card-info">
                        <div class="rating">★★★★☆</div>
                        <div class="price">25,000</div>
                    </div>
                    <div class="add-button">+</div>
                </div>
            </div>

            {{-- 3 --}}
            <div class="menu-card">
                <img src="{{ asset('menu/Woku.jpeg') }}" alt="Ayam Woku Kemangi">
                <div class="card-details">
                    <div class="card-info">
                        <div class="rating">★★★★☆</div>
                        <div class="price">25,000</div>
                    </div>
                    <div class="add-button">+</div>
                </div>
            </div>

            {{-- 4 --}}
            <div class="menu-card">
                <img src="{{ asset('menu/SopBuntut.jpeg') }}" alt="Sop Buntut">
                <div class="card-details">
                    <div class="card-info">
                        <div class="rating">★★★★★</div>
                        <div class="price">25,000</div>
                    </div>
                    <div class="add-button">+</div>
                </div>
            </div>

            {{-- 5 --}}
            <div class="menu-card">
                <img src="{{ asset('menu/AyamBakar.jpeg') }}" alt="Ayam Bakar Kalasan">
                <div class="card-details">
                    <div class="card-info">
                        <div class="rating">★★★★☆</div>
                        <div class="price">25,000</div>
                    </div>
                    <div class="add-button">+</div>
                </div>
            </div>

            {{-- 6 --}}
            <div class="menu-card">
                <img src="{{ asset('menu/Opor.jpeg') }}" alt="Opor Ayam">
                <div class="card-details">
                    <div class="card-info">
                        <div class="rating">★★★★★</div>
                        <div class="price">25,000</div>
                    </div>
                    <div class="add-button">+</div>
                </div>
            </div>

            {{-- 7 --}}
            <div class="menu-card">
                <img src="{{ asset('menu/Soto.jpeg') }}" alt="Soto Ayam">
                <div class="card-details">
                    <div class="card-info">
                        <div class="rating">★★★★☆</div>
                        <div class="price">25,000</div>
                    </div>
                    <div class="add-button">+</div>
                </div>
            </div>

        </section>

    </main>
</div>

<script src="{{ asset('js/script.js') }}"></script>
@endsection
