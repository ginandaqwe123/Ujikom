<?php

namespace App\Http\Controllers;

use App\Models\Komentarfoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request, $fotoId)
    {
        $request->validate([
            'isiKomen' => 'required|string|max:255',
        ]);

        Komentarfoto::create([
            'foto_id' => $fotoId,
            'id_user' => Auth::id(),
            'isiKomen' => $request->input('isiKomen'),
        ]);
        // dd($request);
        return redirect()->back()->with('bagus', 'Komentar berhasil ditambahkan');
    }


    public function destroy($id)
    {
        $post = komentarfoto::findOrFail($id);
        if ($post->id_user !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }
        $komentar = komentarfoto::findOrFail($id);
        $komentar->delete();

        return redirect()->back()->with('bagus', 'Komentar berhasil dihapus');

    }
}
