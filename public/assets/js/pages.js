// ========== MENU PAGE FUNCTIONALITY ==========
document.addEventListener('DOMContentLoaded', function() {
    // Category Filter
    const categoryLinks = document.querySelectorAll('.category-list a');
    const menuCards = document.querySelectorAll('.menu-card-page');

    categoryLinks.forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();

            // Update active state
            categoryLinks.forEach(l => l.parentElement.classList.remove('active'));
            this.parentElement.classList.add('active');

            const category = this.getAttribute('data-category');

            // Filter cards
            menuCards.forEach((card, index) => {
                const cardCategory = card.getAttribute('data-category');

                if (category === 'all' || cardCategory === category) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.classList.add('show');
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 50);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(30px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Search Functionality
    const menuSearch = document.getElementById('menuSearch');

    menuSearch?.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        menuCards.forEach(card => {
            const title = card.querySelector('.menu-name').textContent.toLowerCase();

            if (title.includes(searchTerm)) {
                card.style.display = 'block';
                setTimeout(() => {
                    card.classList.add('show');
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            } else {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    });

    // Sort Functionality
    const sortSelect = document.getElementById('sortMenu');
    const menuGrid = document.getElementById('menuGrid');

    sortSelect?.addEventListener('change', function() {
        const sortValue = this.value;
        const cards = Array.from(menuCards);

        cards.sort((a, b) => {
            switch(sortValue) {
                case 'kalori-asc':
                    return parseInt(a.dataset.kalori) - parseInt(b.dataset.kalori);
                case 'kalori-desc':
                    return parseInt(b.dataset.kalori) - parseInt(a.dataset.kalori);
                case 'protein-desc':
                    return parseInt(b.dataset.protein) - parseInt(a.dataset.protein);
                case 'nama-asc':
                    return a.querySelector('.menu-name').textContent.localeCompare(b.querySelector('.menu-name').textContent);
                default:
                    return 0;
            }
        });

        // Re-append sorted cards with animation
        cards.forEach((card, index) => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(30px)';

            setTimeout(() => {
                menuGrid.appendChild(card);
                card.classList.add('show');
                card.style.opacity = '1';
                card.style.transform = 'translateY(0)';
            }, index * 100);
        });
    });

    // ========== ARTIKEL PAGE FUNCTIONALITY ==========
    const tagBtns = document.querySelectorAll('.tag-btn');
    const artikelCards = document.querySelectorAll('.artikel-card-page');

    tagBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Update active state
            tagBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            // Filter cards
            artikelCards.forEach((card, index) => {
                const category = card.getAttribute('data-category');

                if (filter === 'all' || category === filter) {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.classList.add('show');
                        card.style.opacity = '1';
                        card.style.transform = 'translateY(0)';
                    }, index * 100);
                } else {
                    card.style.opacity = '0';
                    card.style.transform = 'translateY(30px)';
                    setTimeout(() => {
                        card.style.display = 'none';
                    }, 300);
                }
            });
        });
    });

    // Artikel Search
    const artikelSearch = document.getElementById('artikelSearch');

    artikelSearch?.addEventListener('input', function() {
        const searchTerm = this.value.toLowerCase();

        artikelCards.forEach(card => {
            const title = card.querySelector('.artikel-title').textContent.toLowerCase();
            const excerpt = card.querySelector('.artikel-excerpt').textContent.toLowerCase();

            if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                card.style.display = 'block';
                setTimeout(() => {
                    card.classList.add('show');
                    card.style.opacity = '1';
                    card.style.transform = 'translateY(0)';
                }, 100);
            } else {
                card.style.opacity = '0';
                card.style.transform = 'translateY(30px)';
                setTimeout(() => {
                    card.style.display = 'none';
                }, 300);
            }
        });
    });

    // Load More
    const loadMoreBtn = document.getElementById('loadMore');

    loadMoreBtn?.addEventListener('click', function() {
        this.classList.add('loading');
        this.innerHTML = '<i class="fas fa-spinner"></i> Memuat...';

        // Simulate loading
        setTimeout(() => {
            this.classList.remove('loading');
            this.innerHTML = '<i class="fas fa-check"></i> Semua artikel telah dimuat';
            this.disabled = true;

            // Show hidden cards if any
            artikelCards.forEach(card => {
                if (card.style.display === 'none') {
                    card.style.display = 'block';
                    setTimeout(() => {
                        card.classList.add('show');
                    }, 100);
                }
            });
        }, 1500);
    });

    // Pagination
    const pageBtns = document.querySelectorAll('.page-btn:not(.prev):not(.next)');

    pageBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            if (this.disabled) return;

            pageBtns.forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            // Scroll to top of grid
            document.querySelector('.menu-grid-full')?.scrollIntoView({ behavior: 'smooth', block: 'start' });
        });
    });

    // Show initial cards
    [...menuCards, ...artikelCards].forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('show');
        }, index * 100);
    });
});


// ========== KALKULATOR KALORI ==========
document.addEventListener('DOMContentLoaded', function() {
    const kalkulatorForm = document.getElementById('kalkulatorForm');
    
    kalkulatorForm?.addEventListener('submit', function(e) {
        e.preventDefault();
        
        // Ambil nilai input
        const gender = document.querySelector('input[name="gender"]:checked').value;
        const usia = parseInt(document.getElementById('usia').value);
        const berat = parseFloat(document.getElementById('berat').value);
        const tinggi = parseFloat(document.getElementById('tinggi').value);
        const aktivitas = parseFloat(document.getElementById('aktivitas').value);
        const tujuan = document.getElementById('tujuan').value;
        
        // Validasi
        if (!usia || !berat || !tinggi) {
            alert('Mohon lengkapi semua data!');
            return;
        }
        
        // Hitung BMR (Mifflin-St Jeor Equation)
        let bmr;
        if (gender === 'male') {
            bmr = (10 * berat) + (6.25 * tinggi) - (5 * usia) + 5;
        } else {
            bmr = (10 * berat) + (6.25 * tinggi) - (5 * usia) - 161;
        }
        
        // Hitung TDEE
        const tdee = Math.round(bmr * aktivitas);
        
        // Sesuaikan dengan tujuan
        let targetKalori = tdee;
        let rekomendasi = 'Pertahankan';
        let tips = '';
        
        switch(tujuan) {
            case 'lose':
                targetKalori = tdee - 500;
                rekomendasi = 'Defisit 500 kkal';
                tips = 'Untuk menurunkan berat badan, konsumsi 500 kkal lebih sedikit dari TDEE. Diharapkan turun 0.5kg per minggu.';
                break;
            case 'gain':
                targetKalori = tdee + 500;
                rekomendasi = 'Surplus 500 kkal';
                tips = 'Untuk menaikkan berat badan, konsumsi 500 kkal lebih banyak dari TDEE. Fokus pada protein dan latihan beban.';
                break;
            default:
                targetKalori = tdee;
                rekomendasi = 'Maintenance';
                tips = 'Konsumsi kalori sesuai TDEE untuk mempertahankan berat badan saat ini. Tetap aktif dan makan seimbang!';
        }
        
        // Hitung Makronutrien
        const karbo = Math.round((targetKalori * 0.5) / 4);
        const protein = Math.round((targetKalori * 0.25) / 4);
        const lemak = Math.round((targetKalori * 0.25) / 9);
        
        // Tampilkan hasil dengan animasi
        const hasilPlaceholder = document.querySelector('.hasil-placeholder');
        const hasilContent = document.getElementById('hasilContent');
        
        hasilPlaceholder.style.display = 'none';
        hasilContent.style.display = 'block';
        hasilContent.style.opacity = '0';
        
        // Animate numbers
        animateNumber('kaloriAngka', targetKalori);
        animateNumber('bmrValue', Math.round(bmr), ' kkal');
        animateNumber('tdeeValue', tdee, ' kkal');
        
        document.getElementById('rekomendasiValue').textContent = rekomendasi;
        document.getElementById('karboValue').textContent = karbo + 'g';
        document.getElementById('proteinValue').textContent = protein + 'g';
        document.getElementById('lemakValue').textContent = lemak + 'g';
        document.getElementById('tipsText').textContent = tips;
        
        // Fade in
        setTimeout(() => {
            hasilContent.style.transition = 'opacity 0.5s ease';
            hasilContent.style.opacity = '1';
        }, 100);
        
        // Scroll ke hasil di mobile
        if (window.innerWidth < 992) {
            hasilContent.scrollIntoView({ behavior: 'smooth', block: 'start' });
        }
    });
    
    // Fungsi animasi angka
    function animateNumber(elementId, target, suffix = '') {
        const element = document.getElementById(elementId);
        const duration = 1000;
        const start = 0;
        const increment = target / (duration / 16);
        let current = start;
        
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                current = target;
                clearInterval(timer);
            }
            element.textContent = Math.round(current) + suffix;
        }, 16);
    }
});