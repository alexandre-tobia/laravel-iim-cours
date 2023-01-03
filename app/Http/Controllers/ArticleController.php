<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            'posts' => Post::all()
        ]);
    }

    public function create()
    {
        return view('posts.create');
    }

    public function show($slug)
    {

    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required',
            'slug'        => 'required|unique:posts',
            'description' => 'required',
        ]);

        $inputs = $request->only(['title', 'slug', 'description', 'enabled']);

        $inputs['enabled'] = isset($inputs['enabled']) ? 1 : 0;

        Post::create($inputs);

        return redirect()->route('article.index')->with('success', 'Article enregistré !' );
    }

    public function edit($slug)
    {
        $post = Post::where('slug', $slug)->first();

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request, $slug)
    {
        $post = Post::where('slug', $slug)->first();

        $request->validate([
            'title'       => 'required',
            'slug'        => 'required|unique:posts,slug,' . $post->id,
            'description' => 'required',
        ]);

        $inputs = $request->only(['title', 'slug', 'description', 'enabled']);

        $inputs['enabled'] = isset($inputs['enabled']) ? 1 : 0;

       $post->update($inputs);

        return redirect()->route('article.index')->with('success', 'Article modifié !' );
    }

    public function delete($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->delete();

        return redirect()->back();
    }
}
