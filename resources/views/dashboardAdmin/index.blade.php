@extends('layouts.main')

@section('home')

@include('dashboardAdmin.nav')

<div class="container mt-3">
    @if(session('berhasil'))
        <div class="alert alert-success">
            {{ session('berhasil') }}
        </div>
    @endif



    <h1>Selamat datang di Halaman Admin</h1>
    <p>Hanya admin yang bisa mengakses halaman ini.</p>
</div>
    
@endsection