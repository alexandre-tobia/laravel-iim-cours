@extends('layouts.layout')

@section('pageTitle', 'Blog')

@section('content')
    @if(session('success'))
        {{ session('success') }}
    @endif

    <div class="grid grid-cols-12 gap-4">
        @forelse($posts as $post)
            <div class="col-span-3 border border-2 p-4 flex flex-col gap-4">
                <a href="{{route('article.show', ['slug' => $post->slug])}}">
                    <h2>{{$post->title}}</h2>
                </a>
                <p class="text-gray-500">{{$post->description}}</p>
                @if($post->author)
                    <p>
                        <b>Auteur:</b> {{$post->author->fullname()}} ({{$post->author->posts->count()}})
                    </p>
                @endif

                <a class="p-4 bg-blue-500 text-center" href="{{route('article.edit', ['slug' => $post->slug])}}">Modifier</a>
                <form method="POST" action="{{route('article.delete', ['slug' => $post->slug])}}">
                    @csrf
                    @method('DELETE')
                    <button class="w-full p-4 bg-red-500">Supprimer</button>
                </form>
            </div>
        @empty
            <p>Aucun article</p>
        @endforelse
    </div>
@endsection

