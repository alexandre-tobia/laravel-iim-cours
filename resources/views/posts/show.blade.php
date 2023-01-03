@extends('layouts.layout')

@section('content')
    <div class="flex gap-4 flex-col">
        <h1 class="font-bold ">{{$post->title}}</h1>
        <p>{{$post->description}}</p>

        @if($post->author)
            <p>
                <b>Auteur:</b> {{$post->author->fullname()}} ({{$post->author->posts->count()}})
            </p>
        @endif
    </div>

    <a class="inline-block mt-8 bg-blue-500 p-4" href="{{route('article.index')}}">Retour</a>

@endsection
