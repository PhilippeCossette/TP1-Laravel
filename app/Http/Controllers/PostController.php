<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();
        return view('posts.index', compact('posts'));
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title_en' => 'nullable|string|max:255',
            'title_fr' => 'nullable|string|max:255',
            'content_en' => 'nullable|string',
            'content_fr' => 'nullable|string',
        ]);

        if (!$request->title_en && !$request->title_fr) {
            return back()->with('error', 'Title required in at least one language!');
        }

        $title = array_filter([
            'en' => $request->title_en,
            'fr' => $request->title_fr,
        ]);

        $content = array_filter([
            'en' => $request->content_en,
            'fr' => $request->content_fr,
        ]);

        $post = Post::create([
            'title' => $title,
            'content' => $content,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Post created!');
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return back()->with('error', 'You cannot edit this post!');
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return back()->with('error', 'You cannot edit this post!');
        }

        $title = array_filter([
            'en' => $request->title_en,
            'fr' => $request->title_fr,
        ]);

        $content = array_filter([
            'en' => $request->content_en,
            'fr' => $request->content_fr,
        ]);

        $post->update([
            'title' => $title,
            'content' => $content,
        ]);

        return redirect()->route('posts.show', $post)->with('success', 'Post updated!');
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return back()->with('error', 'You cannot delete this post!');
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Post deleted!');
    }
}
