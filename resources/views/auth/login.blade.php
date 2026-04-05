@extends('layouts.auth')

@section('title', 'Masuk')
@section('panel_title', 'Halo, Selamat Datang!')
@section('panel_text', 'Belum punya akun?')
@section('panel_button_url', route('register'))
@section('panel_button_text', 'Daftar')

{{-- Tambahkan CSS --}}
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets/css/auth.css') }}">
@endsection

@section('content')
    <div class="form-container" id="loginForm">
        <h1 class="form-title">Masuk</h1>

        {{-- Session Status --}}
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}" class="auth-form">
            @csrf

            {{-- Error --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            @endif

            {{-- Username --}}
            <div class="input-group">
                <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required
                    autofocus>
                <i class="fas fa-user"></i>
            </div>

            {{-- Password --}}
            <div class="input-group">
                <input type="password" name="password" id="password" placeholder="Password" required>
                <i class="fas fa-lock"></i>
            </div>

            {{-- Forgot password --}}
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="forgot-password">
                    Lupa Password?
                </a>
            @endif

            {{-- Submit --}}
            <button type="submit" class="btn-submit">Masuk</button>

            {{-- Social login --}}
            <div class="social-login">
                <p>atau login dengan sosial media</p>
                <div class="social-icons">
                    <a href="/auth/google" class="social-btn"><i class="fab fa-google"></i></a>
                    <a href="/auth/facebook" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                    <a href="/auth/github" class="social-btn"><i class="fab fa-github"></i></a>
                    <a href="/auth/linkedin" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
        </form>
    </div>
@endsection

{{-- Tambahkan JS --}}
@section('scripts')
    <script src="{{ asset('public/assets/js/auth.js') }}"></script>
@endsection