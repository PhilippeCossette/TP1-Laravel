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
            'title_en'   => 'required_with:content_en|nullable|string|max:255',
            'content_en' => 'required_with:title_en|nullable|string',

            'title_fr'   => 'required_with:content_fr|nullable|string|max:255',
            'content_fr' => 'required_with:title_fr|nullable|string',
        ], [
            'title_en.required_with'   => 'If you enter an English title, you must enter English content too.',
            'content_en.required_with' => 'If you enter English content, you must enter an English title too.',
            'title_fr.required_with'   => 'Si vous saisissez un titre en français, vous devez aussi ajouter du contenu.',
            'content_fr.required_with' => 'Si vous saisissez du contenu en français, vous devez aussi ajouter un titre.',
        ]);

        Post::create([
            'title' => array_filter([
                'en' => $request->title_en,
                'fr' => $request->title_fr,
            ]),
            'content' => array_filter([
                'en' => $request->content_en,
                'fr' => $request->content_fr,
            ]),
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('posts.index')->with('success', __('validation.post_success'));
    }

    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    public function edit(Post $post)
    {
        if ($post->user_id !== Auth::id()) {
            return back()->with('error', __('lang.no-authorization'));
        }

        return view('posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            return back()->with('error', __('lang.no-authorization'));
        }

        $request->validate([
            'title_en'   => 'required_with:content_en|nullable|string|max:255',
            'content_en' => 'required_with:title_en|nullable|string',

            'title_fr'   => 'required_with:content_fr|nullable|string|max:255',
            'content_fr' => 'required_with:title_fr|nullable|string',
        ], [
            'content_en.required_with'   => 'If you enter an English title, you must enter English content too.',
            'title_en.required_with' => 'If you enter English content, you must enter an English title too.',
            'content_fr.required_with'   => 'Si vous saisissez un titre en français, vous devez aussi ajouter du contenu.',
            'title_fr.required_with' => 'Si vous saisissez du contenu en français, vous devez aussi ajouter un titre.',
        ]);

        $post->update([
            'title' => array_filter([
                'en' => $request->title_en,
                'fr' => $request->title_fr,
            ]),
            'content' => array_filter([
                'en' => $request->content_en,
                'fr' => $request->content_fr,
            ]),
        ]);

        return redirect()->route('posts.show', $post->id)->with('success', __('validation.post_update_success'));
    }

    public function destroy(Post $post)
    {
        if ($post->user_id !== auth()->id()) {
            return back()->with('error', __('lang.no-authorization'));
        }

        $post->delete();
        return redirect()->route('posts.index')->with('success', __('validation.post_delete_success'));
    }
}
