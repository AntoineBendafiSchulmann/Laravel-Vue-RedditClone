<?php

use App\Models\Post;
use App\Models\User;
use Inertia\Inertia;
use App\Models\Community;
use App\Models\Commentary;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\AppController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForumController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\CommentaryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [AppController::class, 'index'])->name('home');

Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');


Route::get('/forum', [ForumController::class, 'index'])->name('forum');



Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', ['posts' => Post::all()->count(), 'communities' => Community::all()->count(), 'users' => User::all()->count(), 'commentaries' => Commentary::all()->count()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('communities', CommunityController::class);

Route::resource('posts', PostController::class);
Route::get('/search', [PostController::class, 'search'])->name('search');

Route::resource('users', UserController::class);

Route::get('/logout', [AppController::class, 'logout'])->name('logout');

Route::resource('commentaries', CommentaryController::class);


require __DIR__.'/auth.php';
