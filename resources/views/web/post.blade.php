@extends('layouts.app')
@section('content')
    <div class="container mx-auto">
        <div class="mx-auto col-md-10"> 
            <h1 class=text-center">{{ $post->name }}</h1>
            <div class="card mb-3">
                <div class="card-header">
                    Categoria 
                    <a href="{{ route('category', $post->category->slug) }}">{{ $post->category->name }}</a>
                </div>
                @if ($post->file)
                    <img src="{{ $post->file }}" class="card-img-top" alt="...">
                @endif
                <div class="card-body"> 
                    <p class="card-text">{{ $post->excerpt }}</p>
                    <hr>
                    {!! $post->body !!}
                    <hr>
                    Etiquetas 
                    @foreach ($post->tags as $tag)
                        <a href="{{ route('tag', $tag->slug) }}">{{ $tag->name }}</a>
                    @endforeach
                </div>
                    
            </div>
        </div>

    </div>
@endsection