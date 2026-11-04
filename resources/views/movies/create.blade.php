@extends('layouts.app')

@section('title', 'Add Movies')

@section('content')
    <div class="card">
        <div class="card-body">
            <h3 class="card-title">Add Movies</h3>
            <form method="POST" action="{{ route('movies.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title')}}"></input>
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
                                @selected(old('genre_id') == $genre->id)>{{ $genre->name }}</option>
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
                        <option value="1" @selected(old('rating') == '1')>1</option>
                        <option value="2" @selected(old('rating') == '2')>2</option>
                        <option value="3" @selected(old('rating') == '3')>3</option>
                        <option value="4" @selected(old('rating') == '4')>4</option>
                        <option value="5" @selected(old('rating') == '5')>5</option>
                    </select>
                    @error('rating')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Year</label>
                    <input type="numeric" name="year" class="form-control" value="{{ old('year')}}"></input>
                     @error('year')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Blockbuster</label>
                    <select name="is_blockbuster" class="form-select">
                        <option value="">Select status</option>
                        <option value="1" @selected(old('is_blockbuster') == '1')>Yes</option>
                        <option value="0" @selected(old('is_blockbuster') == '0')>No</option>
                    </select>
                    @error('is_blockbuster')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Director</label>
                    <input type="text" name="director" class="form-control" value="{{ old('director')}}"></input>
                    @error('director')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('movies.index')}}" class="btn btn-secondary">Cancel</a>
            </form>
        </div>
    </div>
@endsection
