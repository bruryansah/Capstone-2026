@extends('layouts.main')

@section('title', 'Kalkulator Kalori - SeGizi')

@section('content')
    <!-- Hero Section -->
    <section class="page-hero kalkulator-hero">
        <div class="hero-container">
            <div class="hero-content center" data-animate>
                <h1 class="hero-title">
                    Kalkulator <span class="highlight">Kalori</span>
                </h1>
                <p class="hero-desc">
                    Hitung kebutuhan kalori harianmu berdasarkan usia, berat badan, tinggi badan, dan aktivitas.
                </p>
            </div>
        </div>
    </section>

    <!-- Kalkulator Section -->
    <section class="kalkulator-section">
        <div class="section-container">
            <div class="kalkulator-layout">
                <!-- Form Input -->
                <div class="kalkulator-form-wrapper" data-animate>
                    <div class="form-card">
                        <h3 class="form-title"><i class="fas fa-calculator"></i> Data Diri</h3>

                        <form id="kalkulatorForm" class="kalkulator-form">
                            <!-- Jenis Kelamin -->
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <div class="gender-select">
                                    <label class="gender-option">
                                        <input type="radio" name="gender" value="male" checked>
                                        <span class="gender-box">
                                            <i class="fas fa-mars"></i>
                                            <span>Laki-laki</span>
                                        </span>
                                    </label>
                                    <label class="gender-option">
                                        <input type="radio" name="gender" value="female">
                                        <span class="gender-box">
                                            <i class="fas fa-venus"></i>
                                            <span>Perempuan</span>
                                        </span>
                                    </label>
                                </div>
                            </div>

                            <!-- Usia -->
                            <div class="form-group">
                                <label for="usia">Usia (tahun)</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-birthday-cake"></i>
                                    <input type="number" id="usia" name="usia" placeholder="Contoh: 25" min="10" max="100" required>
                                </div>
                            </div>

                            <!-- Berat Badan -->
                            <div class="form-group">
                                <label for="berat">Berat Badan (kg)</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-weight"></i>
                                    <input type="number" id="berat" name="berat" placeholder="Contoh: 65" min="20" max="300" step="0.1" required>
                                </div>
                            </div>

                            <!-- Tinggi Badan -->
                            <div class="form-group">
                                <label for="tinggi">Tinggi Badan (cm)</label>
                                <div class="input-with-icon">
                                    <i class="fas fa-ruler-vertical"></i>
                                    <input type="number" id="tinggi" name="tinggi" placeholder="Contoh: 170" min="50" max="250" required>
                                </div>
                            </div>

                            <!-- Level Aktivitas -->
                            <div class="form-group">
                                <label for="aktivitas">Level Aktivitas</label>
                                <div class="select-with-icon">
                                    <i class="fas fa-running"></i>
                                    <select id="aktivitas" name="aktivitas" required>
                                        <option value="1.2">Sedentari (Jarang berolahraga)</option>
                                        <option value="1.375">Ringan (Olahraga 1-3x/minggu)</option>
                                        <option value="1.55">Sedang (Olahraga 3-5x/minggu)</option>
                                        <option value="1.725">Aktif (Olahraga 6-7x/minggu)</option>
                                        <option value="1.9">Sangat Aktif (Olahraga 2x/hari)</option>
                                    </select>
                                </div>
                            </div>

                            <!-- Tujuan -->
                            <div class="form-group">
                                <label for="tujuan">Tujuan</label>
                                <div class="select-with-icon">
                                    <i class="fas fa-bullseye"></i>
                                    <select id="tujuan" name="tujuan" required>
                                        <option value="maintain">Pertahankan Berat Badan</option>
                                        <option value="lose">Turunkan Berat Badan</option>
                                        <option value="gain">Naikkan Berat Badan</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" class="btn-hitung">
                                <i class="fas fa-calculator"></i> Hitung Kalori
                            </button>
                        </form>
                    </div>
                </div>

                <!-- Hasil -->
                <div class="kalkulator-hasil-wrapper" data-animate>
                    <div class="hasil-card" id="hasilCard">
                        <div class="hasil-placeholder">
                            <i class="fas fa-calculator"></i>
                            <p>Masukkan data diri untuk melihat hasil perhitungan</p>
                        </div>

                        <div class="hasil-content" id="hasilContent" style="display: none;">
                            <h3 class="hasil-title">Kebutuhan Kalori Harian</h3>

                            <div class="kalori-utama">
                                <span class="kalori-angka" id="kaloriAngka">0</span>
                                <span class="kalori-satuan">kkal/hari</span>
                            </div>

                            <div class="hasil-detail">
                                <div class="detail-item">
                                    <span class="detail-label">BMR (Metabolisme Basal)</span>
                                    <span class="detail-value" id="bmrValue">0 kkal</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">TDEE (Total Energi)</span>
                                    <span class="detail-value" id="tdeeValue">0 kkal</span>
                                </div>
                                <div class="detail-item">
                                    <span class="detail-label">Rekomendasi</span>
                                    <span class="detail-value" id="rekomendasiValue">-</span>
                                </div>
                            </div>

                            <div class="makro-grid">
                                <div class="makro-item">
                                    <i class="fas fa-bread-slice"></i>
                                    <span class="makro-nama">Karbohidrat</span>
                                    <span class="makro-nilai" id="karboValue">0g</span>
                                    <span class="makro-persen">50%</span>
                                </div>
                                <div class="makro-item">
                                    <i class="fas fa-drumstick-bite"></i>
                                    <span class="makro-nama">Protein</span>
                                    <span class="makro-nilai" id="proteinValue">0g</span>
                                    <span class="makro-persen">25%</span>
                                </div>
                                <div class="makro-item">
                                    <i class="fas fa-cheese"></i>
                                    <span class="makro-nama">Lemak</span>
                                    <span class="makro-nilai" id="lemakValue">0g</span>
                                    <span class="makro-persen">25%</span>
                                </div>
                            </div>

                            <div class="tips-box">
                                <i class="fas fa-lightbulb"></i>
                                <p id="tipsText">Tips akan muncul di sini setelah perhitungan.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Info Cards -->
            <div class="info-grid" data-animate>
                <div class="info-card">
                    <i class="fas fa-fire"></i>
                    <h4>Apa itu BMR?</h4>
                    <p>Basal Metabolic Rate adalah jumlah kalori yang dibakar tubuh saat istirahat total untuk fungsi vital.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-running"></i>
                    <h4>Apa itu TDEE?</h4>
                    <p>Total Daily Energy Expenditure adalah total kalori yang dibakar tubuh termasuk aktivitas fisik harian.</p>
                </div>
                <div class="info-card">
                    <i class="fas fa-balance-scale"></i>
                    <h4>Mengapa Penting?</h4>
                    <p>Mengetahui kebutuhan kalori membantu mencapai tujuan berat badan yang sehat dan berkelanjutan.</p>
                </div>
            </div>
        </div>
    </section>
@endsection
