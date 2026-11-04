<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckGenre
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $genre  = $request->query('genre', 'all');
        $allowed = ['all', 'Action', 'Adventure', 'Sci-Fi'];

        if (! in_array($genre, $allowed)) {
            return redirect()->route('movies.index');
        }

        return $next($request);
    }
}
