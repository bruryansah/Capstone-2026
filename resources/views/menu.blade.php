@extends('layouts.main')

@section('title', 'Menu Makanan - SeGizi')

{{-- CSS --}}
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/pages.css') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="page-hero menu-hero">
        <div class="hero-container">
            <div class="hero-content" data-animate>
                <h1 class="hero-title">
                    Temukan Menu Makanan<br>
                    <span class="highlight">Sehat Pilihanmu</span>
                </h1>
                <p class="hero-desc">
                    Berbagai resep sehat, lezat, dan sesuai kebutuhan nutrisi harianmu
                </p>
            </div>
        </div>
    </section>

    <!-- Menu Section -->
    <section class="menu-page-section">
        <div class="section-container">
            <div class="menu-layout">
                <!-- Sidebar -->
                <aside class="menu-sidebar" data-animate>
                    <div class="category-box">
                        <h3 class="category-title">
                            <i class="fas fa-utensils"></i> Kategori Menu
                        </h3>
                        <ul class="category-list">
                            <li class="active">
                                <a href="#" data-category="all">
                                    <span>Semua</span>
                                    <span class="count">28</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-category="sarapan">
                                    <span>Sarapan</span>
                                    <span class="count">6</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-category="makan-siang">
                                    <span>Makan Siang</span>
                                    <span class="count">10</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-category="makan-malam">
                                    <span>Makan Malam</span>
                                    <span class="count">5</span>
                                </a>
                            </li>
                            <li>
                                <a href="#" data-category="camilan">
                                    <span>Camilan</span>
                                    <span class="count">7</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </aside>

                <!-- Main Content -->
                <div class="menu-main">
                    <!-- Search & Filter -->
                    <div class="menu-toolbar" data-animate>
                        <div class="search-box">
                            <i class="fas fa-search"></i>
                            <input type="text" id="menuSearch" placeholder="Cari nama makanan...">
                        </div>
                        <div class="sort-box">
                            <select id="sortMenu">
                                <option value="">Pilih</option>
                                <option value="kalori-asc">Kalori: Rendah ke Tinggi</option>
                                <option value="kalori-desc">Kalori: Tinggi ke Rendah</option>
                                <option value="protein-desc">Protein: Tinggi ke Rendah</option>
                                <option value="nama-asc">Nama: A-Z</option>
                            </select>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                    </div>

                    <!-- Menu Grid -->
                    <div class="menu-grid-full" id="menuGrid">
                        <!-- Menu Card 1 -->
                        <div class="menu-card-page" data-category="sarapan" data-kalori="350" data-protein="40" data-animate>
                            <div class="menu-image">
                                <img src="{{ asset('images/menu-1.jpg') }}" alt="Egg Roll Tahu">
                                <span class="menu-badge">Diet</span>
                            </div>
                            <div class="menu-content">
                                <h3 class="menu-name">9 Tips Pola Hidup Sehat untuk pemula</h3>
                                <p class="menu-desc">"Masukan Teks"</p>
                                <a href="#" class="btn-menu-page">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Menu Card 2 -->
                        <div class="menu-card-page" data-category="makan-siang" data-kalori="450" data-protein="35" data-animate>
                            <div class="menu-image">
                                <img src="{{ asset('images/menu-2.jpg') }}" alt="Nasi Goreng Sehat">
                                <span class="menu-badge">Diet</span>
                            </div>
                            <div class="menu-content">
                                <h3 class="menu-name">9 Tips Pola Hidup Sehat untuk pemula</h3>
                                <p class="menu-desc">"Masukan Teks"</p>
                                <a href="#" class="btn-menu-page">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Menu Card 3 -->
                        <div class="menu-card-page" data-category="makan-malam" data-kalori="280" data-protein="25" data-animate>
                            <div class="menu-image">
                                <img src="{{ asset('images/menu-3.jpg') }}" alt="Salad Ayam">
                                <span class="menu-badge">Diet</span>
                            </div>
                            <div class="menu-content">
                                <h3 class="menu-name">9 Tips Pola Hidup Sehat untuk pemula</h3>
                                <p class="menu-desc">"Masukan Teks"</p>
                                <a href="#" class="btn-menu-page">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Menu Card 4 -->
                        <div class="menu-card-page" data-category="camilan" data-kalori="150" data-protein="10" data-animate>
                            <div class="menu-image">
                                <img src="{{ asset('images/menu-4.jpg') }}" alt="Yogurt Buah">
                                <span class="menu-badge">Diet</span>
                            </div>
                            <div class="menu-content">
                                <h3 class="menu-name">9 Tips Pola Hidup Sehat untuk pemula</h3>
                                <p class="menu-desc">"Masukan Teks"</p>
                                <a href="#" class="btn-menu-page">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Menu Card 5 -->
                        <div class="menu-card-page" data-category="sarapan" data-kalori="320" data-protein="20" data-animate>
                            <div class="menu-image">
                                <img src="{{ asset('images/menu-5.jpg') }}" alt="Oatmeal">
                                <span class="menu-badge">Diet</span>
                            </div>
                            <div class="menu-content">
                                <h3 class="menu-name">9 Tips Pola Hidup Sehat untuk pemula</h3>
                                <p class="menu-desc">"Masukan Teks"</p>
                                <a href="#" class="btn-menu-page">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>

                        <!-- Menu Card 6 -->
                        <div class="menu-card-page" data-category="makan-siang" data-kalori="500" data-protein="45" data-animate>
                            <div class="menu-image">
                                <img src="{{ asset('images/menu-6.jpg') }}" alt="Steak Ikan">
                                <span class="menu-badge">Diet</span>
                            </div>
                            <div class="menu-content">
                                <h3 class="menu-name">9 Tips Pola Hidup Sehat untuk pemula</h3>
                                <p class="menu-desc">"Masukan Teks"</p>
                                <a href="#" class="btn-menu-page">
                                    Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                                </a>
                            </div>
                        </div>
                    </div>

                    <!-- Pagination -->
                    <div class="pagination" data-animate>
                        <button class="page-btn prev" disabled><i class="fas fa-chevron-left"></i></button>
                        <button class="page-btn active">1</button>
                        <button class="page-btn">2</button>
                        <button class="page-btn">3</button>
                        <span class="page-dots">...</span>
                        <button class="page-btn">8</button>
                        <button class="page-btn next"><i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
{{-- JS --}}
@section('scripts')
    <script src="{{ asset('assets/js/pages.js') }}"></script>
@endsection
