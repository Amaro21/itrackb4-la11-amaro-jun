<nav class="mb-4">
    <a href="{{ route('movies.index') }}"
       class="btn btn-outline-primary {{ request()->routeIs('movies.index', 'movies.show') ? 'active' : '' }}">
       All Movies
    </a>

    <a href="{{ route('movies.featured') }}"
       class="btn btn-outline-primary {{ request()->routeIs('movies.featured') ? 'active' : '' }}">
       Featured Movie
    </a>
</nav>
