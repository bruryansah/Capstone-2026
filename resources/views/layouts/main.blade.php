<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'SeGizi - Makanan untuk hidup, bukan hidup untuk makanan')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar" id="navbar">
        <div class="nav-container">
            <a href="{{ url('/') }}" class="logo">
                <span class="logo-se">Se</span><span class="logo-gizi">Gizi</span>
            </a>

            <div class="nav-menu" id="navMenu">
                <a href="{{ url('/') }}" class="nav-link {{ request()->is('/') ? 'active' : '' }}">Beranda</a>
                <a href="{{ url('/menu') }}" class="nav-link {{ request()->is('menu') ? 'active' : '' }}">Menu Makanan</a>
                <a href="{{ url('/kalkulator') }}" class="nav-link {{ request()->is('kalkulator') ? 'active' : '' }}">Kalkulator</a>
                <a href="{{ url('/artikel') }}" class="nav-link {{ request()->is('artikel') ? 'active' : '' }}">Artikel</a>
            </div>

            <div class="nav-auth">
                @if(Auth::check())
                    <div class="user-welcome">
                        <!-- Dashboard Link (hanya untuk user/admin login) -->
                        <a href="{{ url('/admin') }}" class="btn-dashboard" title="Dashboard">
                            <i class="fas fa-tachometer-alt"></i> Dashboard
                        </a>

                        <div class="greeting-wrapper">
                            <span class="greeting-icon"><i class="fas fa-sun" id="greetingIcon"></i></span>
                            <span class="greeting-text" id="greetingText">Selamat Pagi</span>,
                            <span class="username">{{ Auth::user()->name }}</span>
                        </div>
                        <form method="POST" action="{{ route('logout') }}" class="logout-form">
                            @csrf
                            <button type="submit" class="btn-logout" title="Keluar">
                                <i class="fas fa-sign-out-alt"></i>
                            </button>
                        </form>
                    </div>
                @else
                    <a href="{{ route('login') }}" class="btn-nav-login">Masuk</a>
                    <a href="{{ route('register') }}" class="btn-nav-register">Daftar</a>
                @endif
            </div>

            <button class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </div>
    </nav>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="footer-container">
            <div class="footer-brand">
                <a href="{{ url('/') }}" class="footer-logo">
                    <span class="logo-se">Se</span><span class="logo-gizi">Gizi</span>
                </a>
                <p class="footer-tagline">Makanan untuk hidup,<br>bukan hidup untuk makanan</p>
                <div class="footer-social">
                    <a href="#" class="social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-linkedin"></i></a>
                    <a href="#" class="social-link"><i class="fab fa-twitter"></i></a>
                </div>
            </div>

            <div class="footer-links">
                <div class="footer-column">
                    <h4>Navigasi</h4>
                    <ul>
                        <li><a href="{{ url('/') }}">Beranda</a></li>
                        <li><a href="{{ url('/menu') }}">Menu Makanan</a></li>
                        <li><a href="{{ url('/kalkulator') }}">Kalkulator</a></li>
                        <li><a href="{{ url('/artikel') }}">Artikel</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Kategori</h4>
                    <ul>
                        <li><a href="#">Diet</a></li>
                        <li><a href="#">Protein Tinggi</a></li>
                        <li><a href="#">Kalori Rendah</a></li>
                        <li><a href="#">Lifestyle</a></li>
                    </ul>
                </div>

                <div class="footer-column">
                    <h4>Support</h4>
                    <ul>
                        <li><a href="#">Kontak</a></li>
                        <li><a href="#">Legal</a></li>
                        <li><a href="#">Tentang</a></li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <p>&copy; {{ date('Y') }} SeGizi. All rights reserved.</p>
        </div>
    </footer>

    <!-- Scroll to Top Button -->
    <button class="scroll-top" id="scrollTop">
        <i class="fas fa-arrow-up"></i>
    </button>

    <!-- Popup Modal (Guest) -->
    <div class="popup-overlay" id="popupOverlay">
        <div class="popup-container">
            <button class="popup-close" id="popupClose">
                <i class="fas fa-times"></i>
            </button>

            <div class="popup-content">
                <div class="popup-image">
                    <img src="" alt="" id="popupImage">
                </div>
                <div class="popup-details">
                    <span class="popup-badge" id="popupBadge">Kategori</span>
                    <h3 class="popup-title" id="popupTitle">Judul</h3>
                    <div class="popup-meta" id="popupMeta"></div>
                    <p class="popup-description" id="popupDescription">Deskripsi lengkap...</p>

                    <div class="popup-actions">
                        @guest
                            <button class="btn-popup btn-favorite" id="btnFavorite" onclick="showLoginAlert()">
                                <i class="fas fa-heart"></i> Simpan ke Favorit
                            </button>
                        @else
                            <button class="btn-popup btn-favorite" id="btnFavorite" onclick="addToFavorite()">
                                <i class="fas fa-heart"></i> Simpan ke Favorit
                            </button>
                        @endguest

                        <div class="share-actions">
                            <button class="btn-share" onclick="shareToWhatsApp()" title="Bagikan ke WhatsApp">
                                <i class="fab fa-whatsapp"></i>
                            </button>
                            <button class="btn-share" onclick="saveToNotes()" title="Simpan ke Catatan">
                                <i class="fas fa-sticky-note"></i>
                            </button>
                            <button class="btn-share" onclick="copyLink()" title="Salin Link">
                                <i class="fas fa-link"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Login Alert Modal -->
    <div class="alert-overlay" id="alertOverlay">
        <div class="alert-box">
            <i class="fas fa-lock"></i>
            <h4>Login Diperlukan</h4>
            <p>Silakan login terlebih dahulu untuk menyimpan ke favorit.</p>
            <div class="alert-buttons">
                <a href="{{ route('login') }}" class="btn-alert btn-alert-primary">Login</a>
                <button class="btn-alert btn-alert-secondary" onclick="closeAlert()">Batal</button>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/pages.js') }}"></script>
    @yield('scripts')
</body>
</html>
