<form method="POST" action="{{ route('article.comment.delete', ['slug' => $post->slug, 'id' => $comment->id]) }}">
    @csrf
    @method('DELETE')
    <button class="mt-4 bg-red-500 px-4 py-2 text-white hover:bg-red-600 duration-150">Supprimer
    </button>
</form>
