document.addEventListener('DOMContentLoaded', function() {
    // ========== NAVBAR SCROLL EFFECT ==========
    const navbar = document.getElementById('navbar');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }

        lastScroll = currentScroll;
    });

    // ========== MOBILE MENU ==========
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');

    hamburger?.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    // Close menu when clicking on a link
    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });

    // ========== SCROLL ANIMATIONS ==========
    const animateElements = document.querySelectorAll('[data-animate]');

    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    animateElements.forEach(el => observer.observe(el));

    // ========== FILTER TABS ==========
    const filterBtns = document.querySelectorAll('.filter-btn');
    const menuCards = document.querySelectorAll('.menu-card');
    const artikelCards = document.querySelectorAll('.artikel-card');

    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            // Remove active class from all buttons in same tabs group
            const parent = this.closest('.filter-tabs');
            parent.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));

            // Add active to clicked
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');

            // Filter cards
            const cards = parent.classList.contains('artikel-tabs') ? artikelCards : menuCards;

            cards.forEach((card, index) => {
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

    // Show all cards initially with stagger
    [...menuCards, ...artikelCards].forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('show');
        }, index * 100);
    });

    // ========== SMOOTH SCROLL ==========
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ========== SCROLL TO TOP BUTTON ==========
    const scrollTopBtn = document.getElementById('scrollTop');

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 500) {
            scrollTopBtn.classList.add('show');
        } else {
            scrollTopBtn.classList.remove('show');
        }
    });

    scrollTopBtn?.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });

    // ========== PARALLAX EFFECT ==========
    const heroImage = document.querySelector('.hero-image');

    if (window.innerWidth > 768 && heroImage) {
        document.addEventListener('mousemove', (e) => {
            const x = (window.innerWidth - e.pageX * 2) / 100;
            const y = (window.innerHeight - e.pageY * 2) / 100;

            heroImage.style.transform = `translate(${x}px, ${y}px)`;
        });
    }

    // ========== CARD HOVER EFFECTS ==========
    document.querySelectorAll('.menu-card, .artikel-card').forEach(card => {
        card.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-10px)';
        });

        card.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
        });
    });

    // ========== BUTTON RIPPLE EFFECT ==========
    const buttons = document.querySelectorAll('.btn-primary, .btn-submit, .btn-view-all, .btn-cta');

    buttons.forEach(button => {
        button.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;

            ripple.style.cssText = `
                position: absolute;
                width: ${size}px;
                height: ${size}px;
                left: ${x}px;
                top: ${y}px;
                background: rgba(255,255,255,0.3);
                border-radius: 50%;
                transform: scale(0);
                animation: ripple 0.6s ease-out;
                pointer-events: none;
            `;

            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);

            setTimeout(() => ripple.remove(), 600);
        });
    });

    // Add ripple animation to styles
    const style = document.createElement('style');
    style.textContent = `
        @keyframes ripple {
            to {
                transform: scale(2);
                opacity: 0;
            }
        }
    `;
    document.head.appendChild(style);

    // ========== COUNTER ANIMATION (for future use) ==========
    function animateCounter(element, target, duration = 2000) {
        let start = 0;
        const increment = target / (duration / 16);

        function updateCounter() {
            start += increment;
            if (start < target) {
                element.textContent = Math.floor(start);
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target;
            }
        }

        updateCounter();
    }

    // ========== LAZY LOADING IMAGES ==========
    const lazyImages = document.querySelectorAll('img[data-src]');

    const imageObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const img = entry.target;
                img.src = img.dataset.src;
                img.removeAttribute('data-src');
                imageObserver.unobserve(img);
            }
        });
    });

    lazyImages.forEach(img => imageObserver.observe(img));

    // ========== TYPING EFFECT (optional for hero) ==========
    function typeWriter(element, text, speed = 100) {
        let i = 0;
        element.textContent = '';

        function type() {
            if (i < text.length) {
                element.textContent += text.charAt(i);
                i++;
                setTimeout(type, speed);
            }
        }

        type();
    }

    // ========== FORM VALIDATION VISUALS ==========
    const inputs = document.querySelectorAll('input, textarea');

    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement?.classList.add('focused');
        });

        input.addEventListener('blur', function() {
            this.parentElement?.classList.remove('focused');
            if (this.value) {
                this.classList.add('filled');
            } else {
                this.classList.remove('filled');
            }
        });
    });

    // ========== PRELOADER (optional) ==========
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });

    console.log('🥗 SeGizi App Loaded Successfully!');
});


document.addEventListener('DOMContentLoaded', function() {
    // ========== AUTO GREETING BY TIME ==========
    function updateGreeting() {
        const now = new Date();
        const hour = now.getHours();
        const greetingText = document.getElementById('greetingText');
        const greetingIcon = document.getElementById('greetingIcon');
        const iconWrapper = document.getElementById('greetingIconWrapper');

        if (!greetingText || !greetingIcon || !iconWrapper) return;

        let greeting = '';
        let iconClass = '';
        let timeClass = '';

        if (hour >= 5 && hour < 11) {
            greeting = 'Selamat Pagi';
            iconClass = 'fa-sun';
            timeClass = 'morning';
        } else if (hour >= 11 && hour < 15) {
            greeting = 'Selamat Siang';
            iconClass = 'fa-cloud-sun';
            timeClass = 'afternoon';
        } else if (hour >= 15 && hour < 18) {
            greeting = 'Selamat Sore';
            iconClass = 'fa-cloud-sun';
            timeClass = 'evening';
        } else {
            greeting = 'Selamat Malam';
            iconClass = 'fa-moon';
            timeClass = 'night';
        }

        // Update text dengan animasi smooth
        if (greetingText.textContent !== greeting) {
            greetingText.style.opacity = '0';
            setTimeout(() => {
                greetingText.textContent = greeting;
                greetingText.style.opacity = '1';
            }, 200);
        }

        // Update icon dan class wrapper
        greetingIcon.className = `fas ${iconClass}`;
        
        // Reset class
        iconWrapper.classList.remove('morning', 'afternoon', 'evening', 'night');
        iconWrapper.classList.add(timeClass);
    }

    // Jalankan segera
    updateGreeting();
    
    // Update setiap menit
    setInterval(updateGreeting, 60000);
    
    // Update saat tab aktif lagi
    document.addEventListener('visibilitychange', function() {
        if (!document.hidden) {
            updateGreeting();
        }
    });

    // ========== NAVBAR SCROLL EFFECT ==========
    const navbar = document.getElementById('navbar');
    let lastScroll = 0;

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        
        if (currentScroll > 100) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
        
        lastScroll = currentScroll;
    });

    // ========== MOBILE MENU ==========
    const hamburger = document.getElementById('hamburger');
    const navMenu = document.getElementById('navMenu');

    hamburger?.addEventListener('click', () => {
        hamburger.classList.toggle('active');
        navMenu.classList.toggle('active');
    });

    document.querySelectorAll('.nav-link').forEach(link => {
        link.addEventListener('click', () => {
            hamburger.classList.remove('active');
            navMenu.classList.remove('active');
        });
    });

    // ========== SCROLL ANIMATIONS ==========
    const animateElements = document.querySelectorAll('[data-animate]');
    
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animated');
                observer.unobserve(entry.target);
            }
        });
    }, observerOptions);

    animateElements.forEach(el => observer.observe(el));

    // ========== FILTER TABS ==========
    const filterBtns = document.querySelectorAll('.filter-btn');
    
    filterBtns.forEach(btn => {
        btn.addEventListener('click', function() {
            const parent = this.closest('.filter-tabs');
            parent.querySelectorAll('.filter-btn').forEach(b => b.classList.remove('active'));
            this.classList.add('active');

            const filter = this.getAttribute('data-filter');
            const cardsContainer = parent.nextElementSibling;
            const cards = cardsContainer.querySelectorAll('[data-category]');

            cards.forEach((card, index) => {
                const category = card.getAttribute('data-category');
                
                if (filter === 'all' || category === filter) {
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

    // Show all cards initially
    document.querySelectorAll('.menu-card, .artikel-card').forEach((card, index) => {
        setTimeout(() => {
            card.classList.add('show');
        }, index * 100);
    });

    // ========== SMOOTH SCROLL ==========
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                const offsetTop = target.offsetTop - 80;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // ========== SCROLL TO TOP ==========
    const scrollTopBtn = document.getElementById('scrollTop');
    
    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 500) {
            scrollTopBtn?.classList.add('show');
        } else {
            scrollTopBtn?.classList.remove('show');
        }
    });

    scrollTopBtn?.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
    });

    // ========== POPUP FUNCTIONALITY ==========
    window.openPopup = function(type, id, title, description, category, image, kalori = 0, protein = 0) {
        const overlay = document.getElementById('popupOverlay');
        const img = document.getElementById('popupImage');
        const badge = document.getElementById('popupBadge');
        const titleEl = document.getElementById('popupTitle');
        const metaEl = document.getElementById('popupMeta');
        const descEl = document.getElementById('popupDescription');
        
        window.currentItem = { type, id, title, description };
        
        if (img) {
            img.src = image;
            img.alt = title;
        }
        if (badge) badge.textContent = category.charAt(0).toUpperCase() + category.slice(1).replace('-', ' ');
        if (titleEl) titleEl.textContent = title;
        if (descEl) descEl.textContent = description;
        
        if (metaEl) {
            if (type === 'menu' && kalori > 0) {
                metaEl.innerHTML = `
                    <span class="meta-item"><i class="fas fa-fire"></i> ${kalori} Kalori</span>
                    <span class="meta-item"><i class="fas fa-drumstick-bite"></i> ${protein}g Protein</span>
                `;
            } else {
                metaEl.innerHTML = `<span class="meta-item"><i class="fas fa-tag"></i> ${category}</span>`;
            }
        }
        
        if (overlay) {
            overlay.classList.add('show');
            document.body.style.overflow = 'hidden';
        }
    };

    window.closePopup = function() {
        const overlay = document.getElementById('popupOverlay');
        if (overlay) {
            overlay.classList.remove('show');
            document.body.style.overflow = '';
        }
    };

    // Close popup events
    document.getElementById('popupClose')?.addEventListener('click', window.closePopup);
    document.getElementById('popupOverlay')?.addEventListener('click', function(e) {
        if (e.target === this) window.closePopup();
    });

    // ========== ALERT LOGIN ==========
    window.showLoginAlert = function() {
        const alert = document.getElementById('alertOverlay');
        if (alert) alert.classList.add('show');
    };

    window.closeAlert = function() {
        const alert = document.getElementById('alertOverlay');
        if (alert) alert.classList.remove('show');
    };

    document.getElementById('alertOverlay')?.addEventListener('click', function(e) {
        if (e.target === this) window.closeAlert();
    });

    // ========== SHARE FUNCTIONS ==========
    window.shareToWhatsApp = function() {
        if (!window.currentItem) return;
        const text = `Lihat ${window.currentItem.title} di SeGizi!`;
        const url = window.location.href;
        window.open(`https://wa.me/?text=${encodeURIComponent(text + ' ' + url)}`, '_blank');
    };

    window.saveToNotes = function() {
        if (!window.currentItem) return;
        const content = `${window.currentItem.title}\n\n${window.currentItem.description}\n\nSumber: SeGizi`;
        
        navigator.clipboard?.writeText(content).then(() => {
            alert('Disalin ke clipboard! Anda bisa paste ke catatan.');
        }).catch(() => {
            alert('Gagal menyalin teks.');
        });
    };

    window.copyLink = function() {
        navigator.clipboard?.writeText(window.location.href).then(() => {
            alert('Link disalin!');
        }).catch(() => {
            alert('Gagal menyalin link.');
        });
    };

    // ========== ADD TO FAVORITE ==========
    window.addToFavorite = function() {
        if (!window.currentItem) return;
        
        fetch('/favorites/add', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.content || ''
            },
            body: JSON.stringify({
                type: window.currentItem.type,
                id: window.currentItem.id
            })
        })
        .then(res => res.json())
        .then(data => {
            alert(data.message || 'Berhasil ditambahkan!');
        })
        .catch(err => {
            console.error(err);
            alert('Gagal menambahkan ke favorit.');
        });
    };

    console.log('🥗 SeGizi Loaded!');
});