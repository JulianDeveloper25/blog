@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="d-flex justify-content-between align-items-center">
                <h1>Blog Multitema</h1>
                @auth
                    <a href="{{ route('posts.create') }}" class="btn btn-primary">Crear publicacion</a>
                @endauth
            </div>
        </div>

        @forelse ($posts as $post)
            <div class="col-md-6 col-lg-4 mb-4">
                <div class="card h-100">
                    @if ($post->image)
                        <img src="{{ asset('images/'.$post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    @endif
                    <div class="card-body">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->description, 100) }}</p>
                        <p class="card-text"><small class="text-muted">Por {{ $post->user->name }}</small></p>
                        <a href="{{ route('posts.show', $post) }}" class="btn btn-primary">Leer mas</a>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <span>Publicado hace {{ $post->created_at->diffForHumans() }}</span>
                        @auth
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm">Editar</a>
                        @endauth
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p>No se encontraron publicaciones.</p>
            </div>
        @endforelse

        <div class="col-12">
            {{ $posts->links() }}
        </div>
    </div>
@endsection
