<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index() {
        return view('register.index');
    }

    public function store(Request $request) {

        $validatedData = $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'alamat' => 'required|max:255',
            'username' => ['required', 'min:5', 'max:255', 'unique:users'],
            'password' => 'required|min:5|max:255'  

        ]);
        
        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        // $request->session()->flash('success', 'Registration Succesfull! Please Login');

        return redirect('/login')->with('success', 'Registration Succesfull! Please Login');


    }
}
