<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\foto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function index()
    {
        return view('dashboardAdmin.index');
    }
    public function showUsers()
    {
        $users = User::all();
        return view('dashboardAdmin.user', compact('users'));
    }

    public function showPosts()
    {
        $posts = Foto::with('user')->get();
        // dd($posts);
        return view('dashboardAdmin.posts', compact('posts'));
    }

    public function destroy($id)
    {
        $post = Foto::findOrFail($id);  

        if ($post->image) {
            Storage::delete($post->image);
        }

        $id = DB::table('fotos')->where('id', $id)->delete();

        return redirect('/admin/posts')->with('success', 'Files Has Been Deleted');
    }

    public function deleteuser($id)
    {
        $users = User::findOrFail($id);  

        $id = DB::table('users')->where('id', $id)->delete();

        return redirect('/admin/users')->with('success', 'Files Has Been Deleted');
    }
}
