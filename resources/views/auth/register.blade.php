@extends('layouts.auth')

@section('title', 'Daftar')
@section('panel_title', 'Selamat Datang!')
@section('panel_text', 'Sudah Punya Akun?')
@section('panel_button_url', route('login'))
@section('panel_button_text', 'Masuk')

@section('content')
<div class="form-container" id="registerForm">
    <h1 class="form-title">Daftar</h1>

    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p>
                @endforeach
            </div>
        @endif

        <div class="input-group">
            <input type="text" name="name" id="name" placeholder="Username" value="{{ old('name') }}" required>
            <i class="fas fa-user"></i>
        </div>

        <div class="input-group">
            <input type="email" name="email" id="email" placeholder="Email" value="{{ old('email') }}" required>
            <i class="fas fa-envelope"></i>
        </div>

        <div class="input-group">
            <input type="password" name="password" id="password" placeholder="Password" required>
            <i class="fas fa-lock"></i>
        </div>

        <div class="input-group">
            <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi Password" required>
            <i class="fas fa-lock"></i>
        </div>

        <button type="submit" class="btn-submit">Daftar</button>

        <div class="social-login">
            <p>atau login dengan sosial media</p>
            <div class="social-icons">
                <a href="#" class="social-btn"><i class="fab fa-google"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-github"></i></a>
                <a href="#" class="social-btn"><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </form>
</div>
@endsection