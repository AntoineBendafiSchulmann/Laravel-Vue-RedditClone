<?php 

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index()
    {
        return Inertia::render('Users/Index', [
            'users' => User::with('community')->with('post')->get(),
        ]);
    }

    public function create()
    {
        return Inertia::render('Users/Create', [
            'users' => User::with('community')->get(),
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request)
    {
        $user = User::create($request->all());
        return redirect()->route('users.show', $user);
    }

    public function show($id)
    {
        $user = User::find($id);
        return Inertia::render('Users/Show', [
            'user' => User::with('community')->with('post')->find($id),
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('Users/Edit', [
            'user' => User::with('community')->with('post')->find($id),
            'communities' => Community::all(),
            'posts' => Post::all(),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->all());
        return redirect()->route('users.index', $user);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route('users.index');
    }
}