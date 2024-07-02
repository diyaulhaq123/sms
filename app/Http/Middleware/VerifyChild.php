<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyChild
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verify if the logged-in user is a guardian with associated students
        $guardianId = auth()->user()->id;

        $isGuardian = Student::where('guardian_id', $guardianId)
        ->where('id', $request->id)->exists();

        if (!$isGuardian) {
            return redirect('404');
        }

        return $next($request);
    }
}
