<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Artikel;

class HomeController extends Controller
{
    public function index() {
        $menus = Menu::take(6)->get();
        $artikels = Artikel::take(3)->get();
        
        // Pastikan view 'home' (bukan 'utama') atau sesuaikan nama file blade Anda
        return view('home', compact('menus', 'artikels'));
    }
    
    public function menu() {
        $menus = Menu::all();
        return view('menu', compact('menus'));
    }
    
    public function artikel() {
        $artikels = Artikel::all();
        return view('artikel', compact('artikels'));
    }
}