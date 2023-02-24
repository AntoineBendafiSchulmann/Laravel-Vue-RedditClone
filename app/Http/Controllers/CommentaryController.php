<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Commentary;
use Illuminate\Http\Request;

class CommentaryController extends Controller
{

    public function index()
    {
        return Inertia::render('Commentaries/Index', [
            'commentaries' => Commentary::with(['post','user'])->get()
            
        ]);
        
    }


    public function create()
    {
        return Inertia::render('Commentaries/Create', [
            'commentaries' => Commentary::with('post')->get(),
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request)
    {
        $user= auth()->user();
        $commentary = Commentary::create(array_merge($request->all(),['user_id'=>$user->id]));
        return back();
    }

    public function show($id)
    {
        $commentary = Commentary::find($id);
        return Inertia::render('Commentaries/Show', [
            'commentary' => Commentary::with(['post','user'])->where('id', $id)->first(),
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('Commentaries/Edit', [
            'commentary' => Commentary::with(['post','user'])->find($id),
            'posts' => Post::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $commentary = Commentary::find($id);
        $commentary->update($request->all());
        return redirect()->route('commentaries.index', $commentary);
    }

    public function destroy($id)
    {
        $commentary = Commentary::find($id);
        $commentary->delete();
        return redirect()->route('commentaries.index');
    }
}