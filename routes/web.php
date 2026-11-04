<?php
use App\Http\Controllers\MovieController;
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::get('/movies/filter/{genre?}', function ($genre = 'all') {
    return redirect()->route('movies.index', ['genre' => $genre]);
});

Route::get('/teachers/featured', [TeacherController::class, 'featured'])
    ->name('teachers.featured');

Route::resource('movies', MovieController::class)
    ->middlewareFor('index','check.genre');

Route::resource('teachers', TeacherController::class)
    ->only(['index', 'show']);



