@extends('layouts.app')

@section('title', 'Edit Movie')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Edit Movie</h3>
            <form method="POST" action="{{ route('movies.update', $movie) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $movie->title) }}">
                    @error('title')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Genre</label>
                    <select name="genre_id" class="form-select">
                        <option value="">Select genre</option>
                        @foreach ($genres as $genre)
                            <option value="{{ $genre->id }}"
                                @selected(old('genre_id', $movie->genre_id) == $genre->id)
                            >{{ $genre->name }}</option>
                        @endforeach
                    </select>
                    @error('genre_id')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Rating</label>
                    <select name="rating" class="form-select">
                        <option value="">Select rating</option>
                        @for ($i = 1; $i <= 5; $i++)
                            <option value="{{ $i }}" @selected(old('rating', $movie->rating) == $i)>{{ $i }}</option>
                        @endfor
                    </select>
                    @error('rating')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="number" name="year" class="form-control" value="{{ old('year', $movie->year) }}">
                    @error('year')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Blockbuster</label>
                    <select name="is_blockbuster" class="form-select">
                        <option value="">Select status</option>
                        <option value="1" @selected(old('is_blockbuster', (int) $movie->is_blockbuster) == '1')>Yes</option>
                        <option value="0" @selected(old('is_blockbuster', (int) $movie->is_blockbuster) == '0')>No</option>
                    </select>
                    @error('is_blockbuster')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Director</label>
                    <input type="text" name="director" class="form-control" value="{{ old('director', $movie->director) }}">
                    @error('director')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{ route('movies.index') }}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
