@extends('layouts.main')

@section('title', 'SeGizi - Makanan untuk hidup, bukan hidup untuk makanan')

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
                <button class="filter-btn" data-filter="sarapan">Sarapan</button>
                <button class="filter-btn" data-filter="makan-siang">Makan Siang</button>
                <button class="filter-btn" data-filter="makan-malam">Makan Malam</button>
                <button class="filter-btn" data-filter="camilan">Camilan</button>
            </div>

            <div class="menu-grid">
                @forelse($menus as $menu)
                <div class="menu-card" data-category="{{ $menu->kategori }}" data-animate 
                     onclick="openPopup('menu', {{ $menu->id }}, '{{ $menu->nama }}', '{{ $menu->deskripsi }}', '{{ $menu->kategori }}', '{{ asset('storage/'.$menu->image) }}', {{ $menu->kalori }}, {{ $menu->protein }})">
                    <div class="menu-image">
                        <img src="{{ asset('storage/'.$menu->image) }}" alt="{{ $menu->nama }}" onerror="this.src='{{ asset('assets/img/default-menu.jpg') }}'">
                        <span class="menu-badge">{{ ucfirst(str_replace('-', ' ', $menu->kategori)) }}</span>
                        <div class="menu-overlay">
                            <button class="btn-quick-view"><i class="fas fa-eye"></i> Lihat Detail</button>
                        </div>
                    </div>
                    <div class="menu-content">
                        <h3 class="menu-name">{{ $menu->nama }}</h3>
                        <div class="menu-nutrition">
                            <span class="nutrition-item"><i class="fas fa-fire"></i> {{ $menu->kalori }} Kalori</span>
                            <span class="nutrition-item protein"><i class="fas fa-drumstick-bite"></i> {{ $menu->protein }}g Protein</span>
                        </div>
                        <p class="menu-desc">{{ Str::limit($menu->deskripsi, 80) }}</p>
                    </div>
                </div>
                @empty
                <div class="empty-state">
                    <i class="fas fa-utensils"></i>
                    <p>Belum ada menu tersedia.</p>
                </div>
                @endforelse
            </div>

            <div class="section-footer" data-animate>
                <a href="{{ url('/menu') }}" class="btn-view-all">
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
                <button class="filter-btn" data-filter="diet">Diet</button>
                <button class="filter-btn" data-filter="gizi">Gizi</button>
                <button class="filter-btn" data-filter="lifestyle">Lifestyle</button>
                <button class="filter-btn" data-filter="tips">Tips</button>
            </div>

            <div class="artikel-grid">
                @forelse($artikels as $artikel)
                <article class="artikel-card" data-category="{{ $artikel->kategori }}" data-animate
                         onclick="openPopup('artikel', {{ $artikel->id }}, '{{ $artikel->judul }}', '{{ $artikel->deskripsi }}', '{{ $artikel->kategori }}', '{{ asset('storage/'.$artikel->image) }}')">
                    <div class="artikel-image">
                        <img src="{{ asset('storage/'.$artikel->image) }}" alt="{{ $artikel->judul }}" onerror="this.src='{{ asset('assets/img/default-artikel.jpg') }}'">
                        <span class="artikel-badge">{{ ucfirst($artikel->kategori) }}</span>
                    </div>
                    <div class="artikel-content">
                        <h3 class="artikel-title">{{ $artikel->judul }}</h3>
                        <p class="artikel-excerpt">{{ Str::limit($artikel->deskripsi, 100) }}</p>
                        <span class="btn-artikel">Baca Selengkapnya <i class="fas fa-arrow-right"></i></span>
                    </div>
                </article>
                @empty
                <div class="empty-state">
                    <i class="fas fa-newspaper"></i>
                    <p>Belum ada artikel tersedia.</p>
                </div>
                @endforelse
            </div>

            <div class="section-footer" data-animate>
                <a href="{{ url('/artikel') }}" class="btn-view-all btn-artikel-all">
                    Lihat Semua Artikel <i class="fas fa-arrow-right"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="cta-section" id="kalkulator">
        <div class="cta-container">
            <div class="cta-content" data-animate>
                <h2 class="cta-title">Hitung Kebutuhan Kalori Harianmu</h2>
                <p class="cta-desc">
                    Dapatkan rekomendasi kalori harian yang personal berdasarkan usia, berat badan, tinggi badan, dan level aktivitasmu.
                </p>
                <a href="{{ url('/kalkulator') }}" class="btn-cta">
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

@section('scripts')
<script>
// Data untuk popup
let currentPopupData = {
    type: '',
    id: null,
    title: '',
    description: '',
    category: '',
    image: '',
    kalori: 0,
    protein: 0
};

// Buka Popup
function openPopup(type, id, title, description, category, image, kalori = 0, protein = 0) {
    currentPopupData = { type, id, title, description, category, image, kalori, protein };
    
    const overlay = document.getElementById('popupOverlay');
    const img = document.getElementById('popupImage');
    const badge = document.getElementById('popupBadge');
    const titleEl = document.getElementById('popupTitle');
    const metaEl = document.getElementById('popupMeta');
    const descEl = document.getElementById('popupDescription');
    
    img.src = image;
    img.alt = title;
    badge.textContent = ucfirst(category.replace('-', ' '));
    titleEl.textContent = title;
    descEl.textContent = description;
    
    // Meta info untuk menu (kalori & protein)
    if (type === 'menu' && kalori > 0) {
        metaEl.innerHTML = `
            <span class="meta-item"><i class="fas fa-fire"></i> ${kalori} Kalori</span>
            <span class="meta-item"><i class="fas fa-drumstick-bite"></i> ${protein}g Protein</span>
        `;
    } else {
        metaEl.innerHTML = `<span class="meta-item"><i class="fas fa-tag"></i> ${ucfirst(category)}</span>`;
    }
    
    overlay.classList.add('show');
    document.body.style.overflow = 'hidden';
}

// Tutup Popup
document.getElementById('popupClose').addEventListener('click', closePopup);
document.getElementById('popupOverlay').addEventListener('click', function(e) {
    if (e.target === this) closePopup();
});

function closePopup() {
    document.getElementById('popupOverlay').classList.remove('show');
    document.body.style.overflow = '';
}

// Alert Login
function showLoginAlert() {
    document.getElementById('alertOverlay').classList.add('show');
}

function closeAlert() {
    document.getElementById('alertOverlay').classList.remove('show');
}

// Fungsi Share & Save
function shareToWhatsApp() {
    const text = `Lihat ${currentPopupData.title} di SeGizi!`;
    const url = window.location.href;
    window.open(`https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}`, '_blank');
}

function saveToNotes() {
    const content = `${currentPopupData.title}\n\n${currentPopupData.description}\n\nSumber: SeGizi`;
    
    if (navigator.share) {
        navigator.share({
            title: currentPopupData.title,
            text: content
        });
    } else {
        // Fallback: copy to clipboard
        navigator.clipboard.writeText(content).then(() => {
            alert('Disalin ke clipboard! Anda bisa paste ke catatan.');
        });
    }
}

function copyLink() {
    navigator.clipboard.writeText(window.location.href).then(() => {
        alert('Link disalin!');
    });
}

// Tambah ke Favorit (untuk user login)
function addToFavorite() {
    fetch('/favorites/add', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
        },
        body: JSON.stringify({
            type: currentPopupData.type,
            id: currentPopupData.id
        })
    })
    .then(res => res.json())
    .then(data => {
        alert(data.message || 'Ditambahkan ke favorit!');
    })
    .catch(err => {
        console.error(err);
        alert('Gagal menambahkan ke favorit.');
    });
}

// Helper
function ucfirst(str) {
    return str.charAt(0).toUpperCase() + str.slice(1);
}

// Filter functionality (sama seperti sebelumnya)
// ... (filter code)
</script>
@endsection