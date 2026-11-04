<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Movie;
use App\Models\Genre;
class MovieController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $genre_id = $request->query('genre_id');
        $year     = $request->query('year');

        $genres = Genre::all();
        DB::enableQueryLog();

        $query = Movie::with('genre');

        if ($genre_id) {
            $query = $query->where('genre_id', $genre_id);
        }

        if ($year) {
            $query = $query->where('year', $year);
        }

        $movies = $query->get();

        return view('movies.index', compact('movies', 'genres', 'genre_id', 'year'));
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genre::all();

        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'          => 'required|max:50',
            'genre_id'       => 'required|exists:genres,id',
            'rating'         => 'required|integer|min:1|max:5',
            'year'           => 'required|integer|min:1999|max:2026',
            'is_blockbuster' => 'required|boolean',
            'director'       => 'nullable|max:100',
        ]);

        Movie::create($validated);


        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        return view('movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        $genres = Genre::all();

        return view('movies.edit', compact('movie', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Movie $movie)
    {
        $validated = $request->validate([
            'title'          => 'required|max:50',
            'genre_id'       => 'required|exists:genres,id',
            'rating'         => 'required|integer|min:1|max:5',
            'year'           => 'required|integer|min:1999|max:2026',
            'is_blockbuster' => 'required|boolean',
            'director'       => 'nullable|max:100',
        ]);

        $movie->update($validated);

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();

        return redirect()
            ->route('movies.index')
            ->with('success', 'Movie deleted successfully');
    }

    public function featured()
    {
        $movie = Movie::firstOrFail();

        return view('movies.featured', compact('movie'));
    }

}
