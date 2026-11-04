@extends('layouts.app')
@section('title', $movie['title'] . ' - Details')
@section('content')
    <h2>Movie Details</h2>

    <div class="card" style="max-width: 500px">
        <div class="card-header bg-dark text-white">
            <h4 class="mb-0">Title: {{ $movie['title'] }}</h4>
        </div>
        <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Genre: {{ $movie->genre->name }}</li>
                    <li class="list-group-item">Rating: {{ $movie['rating'] }}</li>
                    <li class="list-group-item">Year: {{ $movie['year'] }}</li>
            </ul>
        </div>
    </div>
@endsection
