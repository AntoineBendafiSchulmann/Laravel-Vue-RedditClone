<?php

use Inertia\Inertia;
use App\Models\Community;
use App\Models\Post;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Application;
use App\Http\Controllers\CommunityController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;

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



Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard', ['posts' => Post::all()->count(), 'communities' => Community::all()->count()]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');



//routes for communities
Route::get('/communities', [CommunityController::class, 'index'])->name('communities.index');
Route::get('/communities/create', [CommunityController::class, 'create'])->name('communities.create');
Route::post('/communities', [CommunityController::class, 'store'])->name('communities.store');
Route::get('/communities/{community}', [CommunityController::class, 'show'])->name('communities.show');
Route::get('/communities/{community}/edit', [CommunityController::class, 'edit'])->name('communities.edit');
Route::put('/communities/{community}', [CommunityController::class, 'update'])->name('communities.update');
Route::delete('/communities/{community}', [CommunityController::class, 'destroy'])->name('communities.destroy');



require __DIR__.'/auth.php';
