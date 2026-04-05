@extends('layouts.main')

@section('title', 'SeGizi - Makanan untuk hidup, bukan hidup untuk makanan')

{{-- CSS --}}
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
@endsection

@section('content')
    <!-- Hero Section -->
    <section class="hero" id="beranda">
        <div class="hero-container">
            <div class="hero-content">
                <h1 class="hero-title">
                    <span class="title-line" data-animate>Makanan untuk hidup</span>
                    <span class="title-line" data-animate>bukan hidup untuk</span>
                    <span class="title-line highlight" data-animate>makanan</span>
                </h1>
                <p class="hero-desc" data-animate>
                    Hitung kebutuhan kalori harianmu, temukan resep sehat dan mulai perjalanan hidup sehat hari ini.
                </p>
                <div class="hero-buttons" data-animate>
                    <a href="#kalkulator" class="btn-primary">
                        <i class="fas fa-calculator"></i> Hitung Kalori
                    </a>
                    <a href="#menu" class="btn-secondary">
                        <i class="fas fa-utensils"></i> Menu Makanan
                    </a>
                </div>
            </div>
            <div class="hero-image" data-animate>
                <!-- Ganti src dengan gambar Anda -->
                <img src="{{ asset('assets/img/makanb.png') }}" alt="Healthy Food" class="hero-img">
            </div>
        </div>
        <div class="hero-wave">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 120L60 110C120 100 240 80 360 70C480 60 600 60 720 65C840 70 960 80 1080 85C1200 90 1320 90 1380 90L1440 90V120H1380C1320 120 1200 120 1080 120C960 120 840 120 720 120C600 120 480 120 360 120C240 120 120 120 60 120H0Z" fill="#f0fdf4"/>
            </svg>
        </div>
    </section>

    <!-- Menu Populer Section -->
    <section class="menu-section" id="menu">
        <div class="section-container">
            <div class="section-header" data-animate>
                <h2 class="section-title">
                    <span class="title-normal">Menu</span>
                    <span class="title-colored">Populer</span>
                </h2>
                <p class="section-subtitle">Temukan berbagai resep sehat dan lezat.</p>
            </div>

            <div class="filter-tabs" data-animate>
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="tinggi-kalori">Tinggi Kalori</button>
                <button class="filter-btn" data-filter="rendah-kalori">Rendah Kalori</button>
                <button class="filter-btn" data-filter="tinggi-protein">Tinggi Protein</button>
            </div>

            <div class="menu-grid">
                <!-- Menu Card 1 -->
                <div class="menu-card" data-category="tinggi-protein" data-animate>
                    <div class="menu-image">
                        <!-- Ganti src dengan gambar Anda -->
                        <img src="{{ asset('assets/img/Malas.jpg') }}" alt="Egg Roll Tahu">
                        <span class="menu-badge">Tinggi Protein</span>
                        <div class="menu-overlay">
                            <button class="btn-quick-view"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="menu-content">
                        <h3 class="menu-name">Egg Roll Tahu</h3>
                        <div class="menu-nutrition">
                            <span class="nutrition-item"><i class="fas fa-fire"></i> 350 Kalori</span>
                            <span class="nutrition-item protein"><i class="fas fa-drumstick-bite"></i> 40g Protein</span>
                        </div>
                        <p class="menu-desc">Call out a feature, benefit, or value of your site or product that can stand on its own.</p>
                        <a href="#" class="btn-menu">
                            Lihat Resep <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Menu Card 2 -->
                <div class="menu-card" data-category="tinggi-protein" data-animate>
                    <div class="menu-image">
                        <!-- Ganti src dengan gambar Anda -->
                        <img src="{{ asset('assets/img/Malas.jpg') }}" alt="Egg Roll Tahu">
                        <span class="menu-badge">Tinggi Protein</span>
                        <div class="menu-overlay">
                            <button class="btn-quick-view"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="menu-content">
                        <h3 class="menu-name">Egg Roll Tahu</h3>
                        <div class="menu-nutrition">
                            <span class="nutrition-item"><i class="fas fa-fire"></i> 350 Kalori</span>
                            <span class="nutrition-item protein"><i class="fas fa-drumstick-bite"></i> 40g Protein</span>
                        </div>
                        <p class="menu-desc">Call out a feature, benefit, or value of your site or product that can stand on its own.</p>
                        <a href="#" class="btn-menu">
                            Lihat Resep <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>

                <!-- Menu Card 3 -->
                <div class="menu-card" data-category="tinggi-protein" data-animate>
                    <div class="menu-image">
                        <!-- Ganti src dengan gambar Anda -->
                        <img src="{{ asset('assets/img/Malas.jpg') }}" alt="Egg Roll Tahu">
                        <span class="menu-badge">Tinggi Protein</span>
                        <div class="menu-overlay">
                            <button class="btn-quick-view"><i class="fas fa-eye"></i></button>
                        </div>
                    </div>
                    <div class="menu-content">
                        <h3 class="menu-name">Egg Roll Tahu</h3>
                        <div class="menu-nutrition">
                            <span class="nutrition-item"><i class="fas fa-fire"></i> 350 Kalori</span>
                            <span class="nutrition-item protein"><i class="fas fa-drumstick-bite"></i> 40g Protein</span>
                        </div>
                        <p class="menu-desc">Call out a feature, benefit, or value of your site or product that can stand on its own.</p>
                        <a href="#" class="btn-menu">
                            Lihat Resep <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="section-footer" data-animate>
                <a href="#" class="btn-view-all">
                    Lihat Semua Makanan <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Artikel Populer Section -->
    <section class="artikel-section" id="artikel">
        <div class="section-container">
            <div class="section-header" data-animate>
                <h2 class="section-title">
                    <span class="title-normal">Artikel</span>
                    <span class="title-colored">Populer</span>
                </h2>
                <p class="section-subtitle">Pelajari pola makan sehat dan gaya hidup seimbang</p>
            </div>

            <div class="filter-tabs artikel-tabs" data-animate>
                <button class="filter-btn active" data-filter="all">Semua</button>
                <button class="filter-btn" data-filter="gaya-hidup">Gaya Hidup Sehat</button>
                <button class="filter-btn" data-filter="mitos">Mitos & Fakta</button>
                <button class="filter-btn" data-filter="nutrisi">Nutrisi & Gizi</button>
            </div>

            <div class="artikel-grid">
                <!-- Artikel Card 1 -->
                <article class="artikel-card" data-category="gaya-hidup" data-animate>
                    <div class="artikel-image">
                        <!-- Ganti src dengan gambar Anda -->
                        <img src="{{ asset('assets/img/ff.jpg') }}" alt="Tips Pola Hidup Sehat">
                        <span class="artikel-badge">Diet</span>
                    </div>
                    <div class="artikel-content">
                        <h3 class="artikel-title">9 Tips Pola Hidup Sehat untuk pemula</h3>
                        <p class="artikel-excerpt">
                            Lorem ipsum dolor, sit amet consectetur adipisicing elit. Excepturi, praesentium reprehenderit? Doloremque, distinctio eaque quia officia illo alias voluptatem debitis.
                        </p>
                        <a href="#" class="btn-artikel">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- Artikel Card 2 -->
                <article class="artikel-card" data-category="mitos" data-animate>
                    <div class="artikel-image">
                        <!-- Ganti src dengan gambar Anda -->
                        <img src="{{ asset('assets/img/ff.jpg') }}" alt="Tips Pola Hidup Sehat">
                        <span class="artikel-badge">Diet</span>
                    </div>
                    <div class="artikel-content">
                        <h3 class="artikel-title">9 Tips Pola Hidup Sehat untuk pemula</h3>
                        <p class="artikel-excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat sapiente illo, delectus similique deleniti voluptatem excepturi perferendis assumenda consectetur dolorum eveniet ex quis quae. Iste ipsa inventore omnis ea perspiciatis!
                        </p>
                        <a href="#" class="btn-artikel">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>

                <!-- Artikel Card 3 -->
                <article class="artikel-card" data-category="nutrisi" data-animate>
                    <div class="artikel-image">
                        <!-- Ganti src dengan gambar Anda -->
                        <img src="{{ asset('assets/img/ff.jpg') }}" alt="Tips Pola Hidup Sehat">
                        <span class="artikel-badge">Diet</span>
                    </div>
                    <div class="artikel-content">
                        <h3 class="artikel-title">9 Tips Pola Hidup Sehat untuk pemula</h3>
                        <p class="artikel-excerpt">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reiciendis quo accusantium culpa nihil quae veritatis quod quibusdam, quaerat id possimus, ut quas at, animi praesentium sapiente ducimus ratione quidem quasi.
                        </p>
                        <a href="#" class="btn-artikel">
                            Baca Selengkapnya <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </article>
            </div>

            <div class="section-footer" data-animate>
                <a href="artikel" class="btn-view-all btn-artikel-all">
                    Lihat Semua Artikel <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section (Tambahan) -->
    <section class="cta-section" id="kalkulator">
        <div class="cta-container">
            <div class="cta-content" data-animate>
                <h2 class="cta-title">Hitung Kebutuhan Kalori Harianmu</h2>
                <p class="cta-desc">
                    Dapatkan rekomendasi kalori harian yang personal berdasarkan usia, berat badan, tinggi badan, dan level aktivitasmu.
                </p>
                <a href="kalkulator" class="btn-cta">
                    <i class="fas fa-calculator"></i> Mulai Hitung
                </a>
            </div>
            <div class="cta-decoration">
                <div class="cta-circle c1"></div>
                <div class="cta-circle c2"></div>
                <div class="cta-circle c3"></div>
            </div>
        </div>
    </section>
@endsection

{{-- JS --}}
@section('scripts')
    <script src="{{ asset('assets/js/main.js') }}"></script>
@endsection
