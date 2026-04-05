<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
class MenuCon extends Controller
{
    public function home()

    {
        $menu = DB::table('menus')->get();
        return view('utama', ['menus' => $menu]);
    }
}
