<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class LogRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        $line = date('H:i:s') . '  '
            . $request->method() . '  '
            . $request->path() . '  '
            . $response->getStatusCode() . PHP_EOL;

        file_put_contents(
            storage_path('app/requests.log'),
            $line,
            FILE_APPEND
        );

        return $response;

    }
}
