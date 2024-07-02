<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (!auth()->check() || !auth()->user()->hasAnyRole($roles)) {
            return redirect('/403')->with('validate', 'You do not have access to these resources');
        }

        // User is authenticated and has the required roles
        return $next($request);
    }

}
