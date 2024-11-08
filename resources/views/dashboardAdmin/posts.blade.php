@extends('layouts.main')
@section('home')
@include('dashboardAdmin.nav')
<div class="container mt-3">
    <h1>All Posts</h1>

    <!-- Notifikasi sukses jika ada -->
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>ID User</th>
                <th>Judul</th>
                <th>Content</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    
                    <td>{{ $post->id }}</td>
                    <td>{{ $post->id_user }}</td>
                    <td>{{ $post->JudulFoto }}</td>
                    <td><img src="{{ asset('storage/' . $post->image) }}" height="200"></td>
                    <td>
                        <a class="btn btn-danger" href="{{ url('admin/' . $post->id. '/delete') }}" onclick="return confirm('Are You Sure?')"> <i class="bi bi-x-octagon"></i> Delete</a> 
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    
@endsection