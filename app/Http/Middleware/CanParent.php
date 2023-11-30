<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanParent
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user has 'can:parent' permission
        if (auth()->user()->can('can:parent')) {
            return $next($request);
        }
        

        // If the user doesn't have 'can:parent' permission, return a 403 Forbidden response
        abort(403, 'Unauthorized');
    }
}
