<?php

use App\Http\Controllers\commentController;
use App\Http\Controllers\FooterController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\userdatacontroller;
use App\Http\Controllers\formController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\moviedatacontroller;
use App\Http\Controllers\MovnavController;
use App\Http\Controllers\TvnavController;
use App\Http\Controllers\EmailController;
use App\Http\Controllers\SmoreController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth'])->group(function () {
    Route::get('/recently-added', [SmoreController::class, 'Recently'])->name('recently');
    Route::get('/movies', [SmoreController::class, 'movie'])->name('movie');
    Route::get('/tv-series', [SmoreController::class, 'tv'])->name('tv');

    Route::get('/edit-profile', [usercontroller::class, 'edit'])->name('edit.profile');
    Route::post('/update-profile', [usercontroller::class, 'update'])->name('update.profile');
    Route::get('/movies/{title}', [MovieController::class, 'play'])->name('movie.play');
    Route::get('/movies/{id}', [MovieController::class, 'playid'])->name('movie.playid');
    Route::get('/movies/{title}/comments', [MovieController::class, 'playcommentall'])->name('movie.comments.all');

    Route::post('/movies/{title}/like', [MovieController::class, 'likeMovie'])->name('movies.like');

    Route::get('/about', [FooterController::class, 'about'])->name('about');
    
    Route::get('/movie-trending', [MovnavController::class, 'trending'])->name('movie.trending');
    Route::get('/movie-popular', [MovnavController::class, 'popular'])->name('movie.popular');
    Route::get('/movie-liked', [MovnavController::class, 'liked'])->name('movie.liked');

    Route::get('/tv-trending', [TvnavController::class, 'trending'])->name('tv.trending');
    Route::get('/tv-popular', [TvnavController::class, 'popular'])->name('tv.popular');
    Route::get('/tv-liked', [TvnavController::class, 'liked'])->name('tv.liked');

    Route::get('/genre-action', [GenreController::class, 'action'])->name('genre.action');
    Route::get('/genre-adventure', [GenreController::class, 'adventure'])->name('genre.adventure');
    Route::get('/genre-comedy', [GenreController::class, 'comedy'])->name('genre.comedy');
    Route::get('/genre-romance', [GenreController::class, 'romance'])->name('genre.romance');
    Route::get('/genre-horror', [GenreController::class, 'horror'])->name('genre.horror');
    Route::get('/genre-mystery', [GenreController::class, 'mystery'])->name('genre.mystery');
    Route::get('/genre-drama', [GenreController::class, 'drama'])->name('genre.drama');

    Route::get('/Contact', [EmailController::class, 'index'])->name('Contact');
    Route::post('/Contact/Sent', [EmailController::class, 'SendEmail'])->name('Contactsent');
});

Route::get('/form', [formController::class, 'index'])->name('form');
Route::post('/submit-form-and-redirect', [formController::class, 'storeAndRedirect'])->name('submit.form');
    
Route::middleware(['admin'])->group(function () {
    Route::get('/user-database', [userdatacontroller::class, 'index'])->name('database');
    Route::delete('/user/{id}', [userdatacontroller::class, 'destroy'])->name('user.delete');
    Route::get('/user/{id}/edit', [userdatacontroller::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [userdatacontroller::class, 'update'])->name('user.update');

    Route::get('/movie-database', [moviedatacontroller::class, 'index'])->name('movdatabase');
    Route::delete('/movie/{id}', [moviedatacontroller::class, 'destroy'])->name('movie.delete');
    Route::get('/movies/{id}/edit', [moviedataController::class, 'edit'])->name('movie.edit');
    Route::post('/movies/{id}', [moviedataController::class, 'update'])->name('movie.update');


    Route::delete('/comment/{id}', [commentController::class, 'destroy'])->name('comment.delete');

    Route::get('/movie-database/more', [moviedatacontroller::class, 'more'])->name('mov.showmore');
    Route::get('/movie-database/less', [moviedatacontroller::class, 'less'])->name('mov.showless');
});
Route::post('/movies/{id}/comment', [MovieController::class, 'storeComment'])->name('movie.comment')->middleware('auth');

Route::get('/search', [MovieController::class, 'search'])->name('search');

