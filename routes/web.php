<?php

use Illuminate\Support\Facades\Route;


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

// Route::get('/', function () {
//     return view('welcome');
// });

// if the user comes to /hello with GET request method,
//handle the request by the index method
//of the App\Http\Controllers\IndexController class

Route::view('/', 'welcome');
Route::get('/hello', ['App\Http\Controllers\IndexController', 'index']);


Route::get('/top20movies', ['App\Http\Controllers\IndexController', 'top20movies']);
//Route::get('/actor/popular/now', ['App\Http\Controllers\ActorController', 'popular']);
Route::get('/top-rated-movies', ['App\Http\Controllers\MovieController', 'topRated']);
Route::get('/top-rated-games', ['App\Http\Controllers\VideogameController', 'topRated']);
Route::get('/movies/shawshank-redemption', ['App\Http\Controllers\MovieController', 'shawshank']);
Route::get('/about-us', ['App\Http\Controllers\AboutController', 'aboutUs'])->name('about_us');



//Route::get('/movies', ['App\Http\Controllers\MovieController', 'index']);
Route::get('/movies', ['App\Http\Controllers\MovieController', 'search']);
Route::get('/movies/create', ['App\Http\Controllers\MovieController', 'create'])->name('movie.create');
Route::post('/movies', ['App\Http\Controllers\MovieController', 'store'])->name('movie.store');
Route::get('/movies/{movieId}/detail', ['App\Http\Controllers\MovieController', 'detail'])->whereNumber('movie_id')->name('movie.detail');
Route::get('/movies/{movieId}/edit', ['App\Http\Controllers\MovieController', 'edit'])->name('movie.edit');
Route::put('/movies/{movieId}', ['App\Http\Controllers\MovieController', 'update'])->name('movie.update');
Route::delete('/movies/{movieId}', ['App\Http\Controllers\MovieController', 'destroy'])->name('movie.delete');

Route::get('/actor/popular', ['App\Http\Controllers\ActorController', 'popular'])->name('people.popular');
Route::get('/actor/detail/{actor_id}', ['App\Http\Controllers\ActorController', 'detail'])->whereNumber('actor_id')->name('people.detail');

Route::post('/movies/rate', ['App\Http\Controllers\ReviewController', 'store']);
Route::delete('/movies/rate/{rateId}', ['App\Http\Controllers\ReviewController', 'destroy'])->name('review.delete');
