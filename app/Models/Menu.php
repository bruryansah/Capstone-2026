<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Menu extends Model {
    protected $fillable = ['kode', 'nama', 'deskripsi', 'kategori', 'kalori', 'protein', 'image', 'resep'];

    public function favorites() {
        return $this->morphMany(Favorite::class, 'favoritable');
    }
}
