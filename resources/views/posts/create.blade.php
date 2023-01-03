@extends('layouts.layout')

@section('content')
    <form class="flex flex-col gap-4" action="{{ route('article.store') }}" method="POST">
        @csrf

        <input class="@error('title') border-red-600 @enderror" placeholder="Titre" type="text" name="title" value="{{ old('title') }}"/>

        <input placeholder="Admin ?" type="text" name="is_admin" value="test"/>

        @error('title')
         <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror

        <input class="@error('slug') border-red-600 @enderror" placeholder="Slug" type="text" name="slug" value="{{ old('slug') }}" />

        @error('slug')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror

        <textarea class="@error('description') border-red-600 @enderror" placeholder="Description" name="description" id="" cols="30" rows="10">{{ old('description') }}</textarea>

        @error('description')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror

        <label class="flex items-center gap-4" for="enabled">
            <input {{ old('enabled') && old('enabled') === 'on' ? 'checked' : '' }} id="enabled" type="checkbox" name="enabled">
            <span>Publié ?</span>
        </label>

        <button class="bg-cyan-500 text-white p-4 font-bold">Sauvegarder</button>
    </form>
@endsection
