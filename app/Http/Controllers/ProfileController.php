<?php

namespace App\Http\Controllers;

use App\Models\Foto;
use App\Models\User;
use App\Models\Album;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Foto::where('id_user', $user->id)->get();

        return view('dashboard.profile', compact('user', 'posts'));

        
    }

   public function showprofile($id)
   {
    $post = Foto::with('user')->find($id);
    return view('dashboard.profile', compact('post'));

   }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'NamaAlbum' => 'required|max:255',
            'Deskripsi' => 'nullable'
        ]);

        $validatedData['id_user'] = Auth::id();

        Album::create($validatedData);

        return redirect('/profile')->with('bagus', 'Album Created');
    }



    public function show($id)
    {
        $post = Foto::with('user')->find($id);
        return view('dashboard.detail', compact('post'));

    }

    public function edit($id)
    {
        $post = Foto::find($id);
        if (!$post) {
            return redirect()->back()->with('error', 'Data not found');
        }
        return view('dashboard.edit', compact('post'));
    }
    

      /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $id
     * @return RedirectResponse
     */
    public function update(Request $request, Foto $post)
    {
        $validatedData = $request->validate([
            'JudulFoto' => 'required|max:255',
            'DeskripsiFoto' => 'required|max:255',
            
       ]);

       $validatedData['id_user'] = Auth::user()->id;
    //    dd($validatedData);
       Foto::where('id', $post->id)->update($validatedData);


       return redirect('/profile')->with('bagus', 'Files Has Been Edited');

    }

    public function destroy($id)
    {
        $post = Foto::findOrFail($id);
        if ($post->id_user !== Auth::id()) {
            abort(403, 'Unauthorized action.');
        }


        if ($post->image) {
            Storage::delete($post->image);
        }

        $id = DB::table('fotos')->where('id', $id)->delete();

        return redirect('/dashboard')->with('bagus', 'Files Has Been Deleted');
    }

}
