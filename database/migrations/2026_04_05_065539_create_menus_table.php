<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('kode')->unique();
            $table->string('nama');
            $table->text('deskripsi')->nullable();
            $table->enum('kategori', [
                'sarapan',
                'makan-siang',
                'makan-malam',
                'camilan'
            ]);
                $table->enum('jenis', [
                'tinggi-protein', 
                'rendah-kalori', 
                'tinggi-kalori', 
                'vegan', 
                'gluten-free',
                'low-carb'
            ])->default('tinggi-protein');
            $table->text('image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
