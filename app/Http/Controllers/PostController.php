<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Community;
use App\Models\Commentary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        return Inertia::render('Posts/Index', [
            'posts' => Post::with('community')->with('user')->with('comments')->get(), 
        
            
            
            

        ]);

    }



    public function create()
    {
        return Inertia::render('Posts/Create', [
            'posts' => Post::with('community')->get(),
            'user' => auth()->user(),
            
        
        ]);
    }

    public function store(Request $request)
    {
        $post = Post::create($request->all());
        //pour l'upload de l'image
        if ($request->hasFile('image')) {
             // validate the incoming file
        if (!$request->hasFile('image')) {
            return response()->json(['error' => 'There is no image present.'], 400);
        }

        $request->validate([
            'image' => 'required|file|image|mimes:jpg,jpeg,png'
        ]);

        // save the file in storage
        $path = $request->file('image')->store('public/storage');

        if (!$path) {
            return response()->json(['error' => 'The file could not be saved.'], 500);
        }

        $uploadedFile = $request->file('image');

        }
        return redirect()->route('posts.show', $post);

    }

    public function show($id)
    {
        $post = Post::find($id);
        return Inertia::render('Posts/Show', [
            'post' => Post::with('community')->with(['comments','user','comments.user'])->where('id', $id)->first(),

            //pour afficher l'image depuis le dossier storage
            $post->image = $post->image ? asset('public/storage/' . $post->image ) : null,
        
            
            
        ]);

        
    }


    public function edit($id)
    {
        return Inertia::render('Posts/Edit', [
            'post' => Post::with('community')->find($id),
            'users' => User::all(),
            'communities' => Community::all(),

        ]);
    
    }

    
    public function update(Request $request, Post $post)
    {
        $post->update($request->form);
        return redirect()->route('posts.index', $post);

        //pour l'upload de l'image
        if ($request->hasFile('image')) {
            $request->file('image')->store('public/storage');
            $post->image = $request->file('image')->hashName();
            $post->save();
        }
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        //pour supprimer l'image
        if ($post->image) {
            Storage::delete('public/storage/' . $post->image);
        }
        return redirect()->route('posts.index');
    
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $posts = Post::where('title', 'like', '%'.$search.'%')->get();
        return Inertia::render('Posts/Search', [
            'posts' => $posts,
        ]);
    }




}
