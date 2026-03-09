<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PortfolioAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Log access to a txt file
        $logMessage = '[' . now() . '] ' . $request->ip() . ' accessed ' . $request->path() . PHP_EOL;
        file_put_contents(storage_path('logs/portfolio_access.txt'), $logMessage, FILE_APPEND);

        // Simple condition: block access if ?locked=true is passed
        if ($request->query('locked') === 'true') {
            return response('Portfolio is currently unavailable. Please try again later.', 403);
        }

        return $next($request);
    }
}
