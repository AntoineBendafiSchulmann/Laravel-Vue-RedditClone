<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Community;
use App\Models\User;
use Inertia\Inertia;


class CommunityController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Communities/Index', [
            'communities' => Community::all()
        ]);
    }

    public function create()
    {
        return Inertia::render('Communities/Create', [
            'communities' => Community::all(),
            'user' => auth()->user(),
        ]);
    }

    public function store(Request $request)
    {
        $community = Community::create($request->all());
        return redirect()->route('communities.show', $community);
    }

    public function show($id)
    {
        return Inertia::render('Communities/Show', [
            'community' => Community::with("posts")->where("id", $id)->first()
        ]);
    }

    public function edit($id)
    {
        return Inertia::render('Communities/Edit', [
            'community' => Community::find($id),
        ]);
    }

    public function update(Request $request, Community $community)
    {
        $community->update($request->form);
        return redirect()->route('communities.show', $community);
    }

    public function destroy($id)
    {
        $community = Community::find($id);
        $community->delete();
        return redirect()->route('communities.index');
    }

}
