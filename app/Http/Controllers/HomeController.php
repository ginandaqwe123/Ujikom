<?php

namespace App\Http\Controllers;

use App\Models\Foto; 
use App\Models\User;
use Illuminate\View\View;
use App\Models\Komentarfoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Album;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * index
     *
     * @return void
     */
    public function index(): View
    {
        // $user = User::find($id);
        return view('dashboard.home', [
            'posts' => Foto::filter()->latest()->get()]);
    }

    public function show($id)
    {

        $post = Foto::with('user')->find($id);
        $comment = Komentarfoto::where('foto_id', $id)->with('foto', 'user')->get();

        return view('dashboard.detail',[
            'post' => $post,
            'comments' => $comment
        ]);
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return RedirectResponse
     */

    public function store(Request $request): RedirectResponse 
    {

             $validatedData = $request->validate([
             'JudulFoto' => 'required|max:255',
             'DeskripsiFoto' => 'required|max:255',
             'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            //  'id_album' => 'required|exists:album,id_album'
        ]);
        
        $validatedData['id_user'] = Auth::id();
        // $validatedData['id_album'] = Auth::id();
        
        $image = $request->file('image');
        $image->store('images');
        
        
        if($request->file('image')){
            $validatedData['image'] = $request->file('image')->store('images');
        }
        
        
        // dd($validatedData);
        Foto::create($validatedData);
       

        return back()->with('bagus', 'Files Has Been Uploaded');

    }

    

    
}
