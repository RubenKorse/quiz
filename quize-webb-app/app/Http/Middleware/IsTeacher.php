<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class IsTeacher
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->is_teacher) {
            return $next($request);
        }
        return redirect('/');
    }
}
