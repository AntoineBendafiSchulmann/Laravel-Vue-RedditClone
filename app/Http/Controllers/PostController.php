<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::with('community')->get()

        ]);



    }

    public function create()
    {
        return Inertia::render('Posts/Create', [
            'posts' => Post::with('community')->get(),
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        return redirect()->route('posts.show', $post);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return Inertia::render('Posts/Show', [
            'post' => Post::with('community')->find($id),
        ]);

        
    }

    public function edit($id)
    {
        return Inertia::render('Posts/Edit', [
            'post' => Post::with('community')->find($id),
            'communities' => Community::all(),
        ]);
    
    }

    
    public function update(Request $request, Post $post)
    {
        $post->update($request->all());
        return redirect()->route('posts.index', $post);
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('posts.index');
    
    }
    
}
