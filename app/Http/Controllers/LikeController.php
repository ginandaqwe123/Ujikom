<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\Like;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LikeController extends Controller
{
    public function Likee($id)
    {
        $post = Foto::findOrFail($id);
        $like = Like::where('foto_id', $post->id)->where('user_id', Auth::id())->first();
    
        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'user_id' => Auth::id(),
                'foto_id' => $post->id,
            ]);
        }
    
        return redirect()->back();
    }
}
