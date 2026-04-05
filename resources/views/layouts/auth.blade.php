<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Auth')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>
    <!-- Button Back -->
    <a href="{{ url('/') }}" class="btn-back">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>

    <div class="container">
        <div class="auth-wrapper" id="authWrapper">
            <!-- Left Side - Form -->
            <div class="form-section">
                @yield('content')
            </div>

            <!-- Right Side - Green Panel -->
            <div class="panel-section" id="panelSection">
                <div class="panel-content">
                    <h2 id="panelTitle">@yield('panel_title', 'Halo, Selamat Datang!')</h2>
                    <p id="panelText">@yield('panel_text', 'Belum punya akun?')</p>
                    <a href="@yield('panel_button_url', route('register'))" class="btn-panel" id="panelButton">
                        @yield('panel_button_text', 'Daftar')
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/js/auth.js') }}"></script>
</body>
</html>
