@extends('layouts.layout')

@section('content')
    <a class="inline-block mb-8 bg-blue-500 p-4" href="{{route('article.index')}}">Retour</a>

    <div class="flex gap-4 flex-col">
        <h1 class="font-bold ">{{$post->title}}</h1>
        <p>{{$post->description}}</p>

        @if($post->author)
            <p>
                <b>Auteur:</b> {{$post->author->fullname()}} ({{$post->author->posts->count()}})
            </p>
        @endif
    </div>

    <hr class="my-4">

    @auth
        @include('posts.comments.form')
    @else
        <p class="text-gray-400">Vous devez être connecté pour laisser un commentaire...</p>
    @endauth

    <hr class="my-4">

    <div class="flex flex-col gap-4">
        @forelse($post->comments as $comment)
            <div class="border border-gray-400 p-4">
                <p>{{$comment->content}}</p>

                <span class="text-sm italic text-gray-400 mt-4 block">Publié par: {{$comment->user->name}}</span>

                @auth
                    @includeWhen(auth()->user()->isAdmin(), 'posts.comments.form-delete')
                @endauth
            </div>

        @empty
            <p class="text-sm">Aucun commentaire</p>
        @endforelse
    </div>
@endsection
