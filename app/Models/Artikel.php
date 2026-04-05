<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Artikel extends Model {
    protected $fillable = ['judul', 'deskripsi', 'konten', 'kategori', 'image'];

    public function favorites() {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
}
