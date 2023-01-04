<h2>Écrire un commentaire</h2>
<form class="mt-2" method="POST" action="{{ route('article.comment.store', ['slug' => $post->slug]) }}">
    @csrf

    <div class="flex flex-col">
        <textarea class="w-full @error('contents') border-red-600 @enderror" name="content" id="" cols="30" rows="10" placeholder="Votre message"></textarea>

        @error('contents')
            <p class="text-red-500 text-xs">{{ $message }}</p>
        @enderror

        <button class="transition-all duration-300 mt-4 bg-green-400 py-2 px-4 text-white hover:bg-green-600">Publié
        </button>
    </div>
</form>

@if(session('commentSuccess'))
    <div class="mt-4 bg-green-400 py-2 px-4">
        {{ session('commentSuccess') }}
    </div>
@endif
