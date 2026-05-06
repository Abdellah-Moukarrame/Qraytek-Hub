<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class TeacherMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        if (Auth::user()->role !== 'teacher') {
            abort(403, 'Access denied.');
        }

        
        $teacher = Auth::user()->teacher;

        if ($teacher && $teacher->status === 'pending') {
            Auth::logout();
            return redirect()->route('teacher.pending')
                ->withErrors(['email' => 'Your account is still pending admin approval.']);
        }

        return $next($request);
    }
}
