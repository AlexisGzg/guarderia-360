<?php

use App\Models\Post;

$posts = Post::orderBy('published_at')->take(5)->get();
?>

<x-app-layout>
    <header class="mb-5">
        <nav class="navbar navbar-expand-lg navbar-light bg-success">
            <div class="container-fluid">
                <h2 class="text-success-subtle bg-success text-center py-1">
                    {{ __('Usuario: ') }}{{ Auth::user()->name }}
                </h2>
            </div>
        </nav>
    </header>

    <div class="container">
        <div class="bg-light rounded shadow-sm p-4 mb-5">
            <div class="p-6 text-gray-900">
                <h4>{{ __("Bienvenido a Guarderia Joseph Lancaster!") }}</h4>
                <br>
                <p>{{ Auth::user()->name }}</p>
            </div>

            <div class="container mx-auto text-gray-900">
                <h4>Últimos Avisos:</h4>
                <ul>
                    @foreach ($posts as $post)
                    <div class="card-body">
                        <div class="alert bg-success-subtle text-dark">
                            <strong>Titulo:</strong>
                            {{ $post->title }}
                        </div>
                        <div class="alert bg-success-subtle text-dark">
                            <strong>Contenido:</strong>
                            {{ $post->content }}
                        </div>
                        <div class="alert bg-success-subtle text-dark">
                            <strong>Publicado el:</strong>
                            {{ $post->created_at }}
                        </div>
                        <div class="alert bg-success-subtle text-dark">
                            <strong>Ultima actualización:</strong>
                            {{ $post-> updated_at}}
                        </div>
                    </div>
                    <hr>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</x-app-layout>