@extends('layouts.main')
@section('home')
@include('partials.nav')

    <div class="container">
        @foreach ($albums as $album)
        <ul class="list-group list-group-flush">
            <li class="list-group-item">{{ $album->NamaAlbum }}</li>
          </ul>
        @endforeach
    </div>

@include('partials.foot')    
@endsection