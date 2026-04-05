<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Favorite;
use App\Models\Menu;
use App\Models\Artikel;

class FavoriteController extends Controller {
    public function add(Request $request) {
        $request->validate([
            'type' => 'required|in:menu,artikel',
            'id' => 'required|integer'
        ]);

        $user = Auth::user();
        $model = $request->type === 'menu' ? Menu::class : Artikel::class;

        // Cek sudah ada belum
        $exists = Favorite::where('user_id', $user->id)
            ->where('favoritable_id', $request->id)
            ->where('favoritable_type', $model)
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'Sudah ada di favorit!']);
        }

        Favorite::create([
            'user_id' => $user->id,
            'favoritable_id' => $request->id,
            'favoritable_type' => $model
        ]);

        return response()->json(['message' => 'Ditambahkan ke favorit!']);
    }
}
