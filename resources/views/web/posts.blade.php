@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="mx-auto col-md-10"> 
            <h1 class=text-center">Lista de articulos</h1>
            @foreach ($posts as $post)
                <div class="card mb-3">
                    @if ($post->file)
                        <img src="{{ $post->file }}" class="card-img-top" alt="...">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->name }}</h5>
                        <p class="card-text">{{ $post->excerpt }}</p>
                    <a href="{{ route('post', $post->slug) }}" class="card-link flo float-right">Ver mas </a>
                    </div>
                </div>
            @endforeach
            {{ $posts->links() }}
        </div>

    </div>
@endsection