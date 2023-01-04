<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, $slug)
    {
        $request->validate([
            'content' => 'required'
        ]);

        $post = Post::where('slug', $slug)->firstOrFail();

        Comment::create([
            'content' => $request->get('content'),
            'user_id'  => auth()->user()->id,
            'post_id'  => $post->id
        ]);

        return redirect()->back()->with('commentSuccess', 'Commentaire publié !');
    }
}
