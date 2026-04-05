document.addEventListener('DOMContentLoaded', function() {
    // Deteksi halaman aktif
    const currentPath = window.location.pathname;
    const isLoginPage = currentPath.includes('login');
    const isRegisterPage = currentPath.includes('register');

    // Animasi saat load halaman
    const authWrapper = document.getElementById('authWrapper');
    if (authWrapper) {
        authWrapper.style.opacity = '0';
        authWrapper.style.transform = 'scale(0.95)';

        setTimeout(() => {
            authWrapper.style.transition = 'all 0.5s ease';
            authWrapper.style.opacity = '1';
            authWrapper.style.transform = 'scale(1)';
        }, 100);
    }

    // Handle tombol panel (Daftar/Masuk) dengan animasi transisi
    const panelButton = document.getElementById('panelButton');
    if (panelButton) {
        panelButton.addEventListener('click', function(e) {
            e.preventDefault();
            const targetUrl = this.getAttribute('href');

            // Animasi keluar
            const wrapper = document.querySelector('.auth-wrapper');
            wrapper.style.transition = 'all 0.4s ease';
            wrapper.style.opacity = '0';
            wrapper.style.transform = 'scale(0.9)';

            // Animasi slide untuk panel
            const panel = document.querySelector('.panel-section');
            if (isLoginPage) {
                panel.style.animation = 'slideLeft 0.4s ease forwards';
            } else {
                panel.style.animation = 'slideRight 0.4s ease forwards';
            }

            // Redirect setelah animasi
            setTimeout(() => {
                window.location.href = targetUrl;
            }, 400);
        });
    }

    // Animasi input focus
    const inputs = document.querySelectorAll('.input-group input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            this.parentElement.style.transform = 'scale(1.02)';
            this.parentElement.style.transition = 'transform 0.3s ease';
        });

        input.addEventListener('blur', function() {
            this.parentElement.style.transform = 'scale(1)';
        });
    });

    // Animasi tombol social hover
    const socialBtns = document.querySelectorAll('.social-btn');
    socialBtns.forEach((btn, index) => {
        btn.addEventListener('mouseenter', function() {
            this.style.animation = 'bounce 0.5s ease';
        });

        btn.addEventListener('mouseleave', function() {
            this.style.animation = '';
        });

        // Stagger animation saat load
        btn.style.opacity = '0';
        btn.style.transform = 'translateY(20px)';
        setTimeout(() => {
            btn.style.transition = 'all 0.3s ease';
            btn.style.opacity = '1';
            btn.style.transform = 'translateY(0)';
        }, 600 + (index * 100));
    });

    // Form submission dengan loading
    const authForm = document.querySelector('.auth-form');
    if (authForm) {
        authForm.addEventListener('submit', function(e) {
            const submitBtn = this.querySelector('.btn-submit');
            const originalText = submitBtn.textContent;

            // Validasi sederhana
            const inputs = this.querySelectorAll('input[required]');
            let isValid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    isValid = false;
                    input.style.borderColor = '#e74c3c';
                    input.style.animation = 'shake 0.5s ease';

                    setTimeout(() => {
                        input.style.animation = '';
                        input.style.borderColor = '#e0e0e0';
                    }, 500);
                }
            });

            if (!isValid) {
                e.preventDefault();
                return;
            }

            // Loading state
            submitBtn.classList.add('loading');
            submitBtn.textContent = '';
            submitBtn.disabled = true;

            // Simulasi loading (bisa dihapus jika tidak perlu delay)
            // e.preventDefault(); // Uncomment untuk testing
            // setTimeout(() => {
            //     this.submit();
            // }, 1500);
        });
    }

    // Animasi shake untuk error
    const style = document.createElement('style');
    style.textContent = `
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }

        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
    `;
    document.head.appendChild(style);

    // Parallax effect untuk panel (desktop only)
    if (window.innerWidth > 768) {
        document.addEventListener('mousemove', function(e) {
            const panel = document.querySelector('.panel-section');
            if (panel) {
                const x = (window.innerWidth - e.pageX * 2) / 100;
                const y = (window.innerHeight - e.pageY * 2) / 100;

                panel.style.transform = `translate(${x}px, ${y}px)`;
                panel.style.transition = 'transform 0.3s ease-out';
            }
        });
    }

    // Hide/show password toggle
    const passwordInputs = document.querySelectorAll('input[type="password"]');
    passwordInputs.forEach(input => {
        const icon = input.parentElement.querySelector('i');
        if (icon && icon.classList.contains('fa-lock')) {
            icon.style.cursor = 'pointer';
            icon.addEventListener('click', function() {
                if (input.type === 'password') {
                    input.type = 'text';
                    this.classList.remove('fa-lock');
                    this.classList.add('fa-lock-open');
                } else {
                    input.type = 'password';
                    this.classList.remove('fa-lock-open');
                    this.classList.add('fa-lock');
                }
            });
        }
    });

    // Remember username di login
    if (isLoginPage) {
        const usernameInput = document.getElementById('username');
        const savedUsername = localStorage.getItem('remember_username');

        if (savedUsername && usernameInput) {
            usernameInput.value = savedUsername;
        }

        // Save username saat submit
        authForm?.addEventListener('submit', function() {
            if (usernameInput) {
                localStorage.setItem('remember_username', usernameInput.value);
            }
        });
    }
});
