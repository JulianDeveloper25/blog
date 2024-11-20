@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto">
            <div class="card">
                @if ($post->image)
                    <img src="{{ asset('images/'.$post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                @endif
                <div class="card-body">
                    <h1 class="card-title">{{ $post->title }}</h1>
                    <p class="text-muted">
                        Publicado por {{ $post->user->name }} 
                        {{ $post->created_at->diffForHumans() }}
                    </p>
                    <div class="card-text">
                        {{ $post->description }}
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary">Volver a las publicaciones</a>
                    @auth
                        <div class="btn-group" role="group">
                            <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary">Editar</a>
                            <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Eliminar</button>
                            </form>
                        </div>
                    @endauth
                </div>
            </div>
        </div>
    </div>
@endsection
