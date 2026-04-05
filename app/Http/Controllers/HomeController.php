<?php


namespace App\Http\Controllers;
use App\Models\Menu;
use App\Models\Artikel;

class HomeController extends Controller
{
    public function index() {
        $menus = Menu::take(6)->get();
        $artikels = Artikel::take(3)->get();
        return view('utama', compact('menus', 'artikels'));
    }
}
