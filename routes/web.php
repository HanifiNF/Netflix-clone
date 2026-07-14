<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\FooterController;
use Faker\Guesser\Name;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\UserDataController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\MovieDataController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminMovieImportController;
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

    Route::get('/edit-profile', [UserController::class, 'edit'])->name('edit.profile');
    Route::post('/update-profile', [UserController::class, 'update'])->name('update.profile');
    Route::get('/movies/{id}', [MovieController::class, 'play'])->name('movie.play')->whereNumber('id');
    Route::get('/movies/{id}/comments', [MovieController::class, 'playcommentall'])->name('movie.comments.all')->whereNumber('id');

    Route::post('/movies/{id}/like', [MovieController::class, 'likeMovie'])->name('movies.like')->whereNumber('id');

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

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/user-database', [UserDataController::class, 'index'])->name('database');
    Route::delete('/user/{id}', [UserDataController::class, 'destroy'])->name('user.delete');
    Route::get('/user/{id}/edit', [UserDataController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserDataController::class, 'update'])->name('user.update');

    Route::get('/movie-database', [MovieDataController::class, 'index'])->name('movdatabase');
    Route::delete('/movie/{id}', [MovieDataController::class, 'destroy'])->name('movie.delete');
    Route::get('/movies/{id}/edit', [MovieDataController::class, 'edit'])->name('movie.edit');
    Route::post('/movies/{id}', [MovieDataController::class, 'update'])->name('movie.update');

    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.delete');

    Route::get('/movie-database/more', [MovieDataController::class, 'more'])->name('mov.showmore');
    Route::get('/movie-database/less', [MovieDataController::class, 'less'])->name('mov.showless');

    Route::get('/form', [FormController::class, 'index'])->name('form');
    Route::post('/submit-form-and-redirect', [FormController::class, 'storeAndRedirect'])->name('submit.form');

    Route::get('/admin/import', [AdminMovieImportController::class, 'create'])->name('admin.import');
    Route::post('/admin/import', [AdminMovieImportController::class, 'store']);
});
Route::post('/movies/{id}/comment', [MovieController::class, 'storeComment'])->name('movie.comment')->middleware('auth');

Route::get('/search', [MovieController::class, 'search'])->name('search');

