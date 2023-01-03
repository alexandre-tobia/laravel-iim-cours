@extends('layouts.layout')

@section('pageTitle', 'Blog')

@section('content')
    @if(session('success'))
        {{ session('success') }}
    @endif

    <div class="grid grid-cols-12 gap-4">
        @forelse($posts as $post)
            <div class="col-span-3 border border-2 p-4 flex flex-col gap-4">
                <h2>{{$post->title}}</h2>
                <p class="text-gray-500">{{$post->description}}</p>
                @if($post->author)
                    <p>
                        <b>Auteur:</b> {{$post->author->fullname()}} ({{$post->author->posts->count()}})
                    </p>


                @endif
            </div>
        @empty
            <p>Aucun article</p>
        @endforelse
    </div>
@endsection

