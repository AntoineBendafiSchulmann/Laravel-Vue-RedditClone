<?php 

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Community;
use App\Models\Commentary;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;


class WelcomeController extends Controller
{
        /**
     * Display App Home page .
     *
     * @return \Inertia\Response
     */
    public function index(): \Inertia\Response
    {
        return Inertia::render('Welcome' , [
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