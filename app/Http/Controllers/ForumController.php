<?php 

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Community;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Models\Commentary;


class ForumController extends Controller
{
        /**
     * Display App Home page .
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Forum' , [
            'canLogin' => Route::has('login'),
            'canRegister' => Route::has('register'),
            'laravelVersion' => Application::VERSION,
            'phpVersion' => PHP_VERSION,
            'communities' => Community::all(),
            'posts' => Post::all(),
            'users' => User::all(),
            'commentaries' => Commentary::all(),
        ]);
    }


}