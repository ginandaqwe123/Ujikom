<?php

namespace App\Http\Controllers;

use App\Models\Album;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class AlbumController extends Controller
{
    public function index()
    {

        return view('dashboard.profile', [
            'albums' => Album::all()
        ]);
    }

}
