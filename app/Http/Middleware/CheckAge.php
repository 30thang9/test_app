<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAge
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check()) {
            $user = auth()->user();

            $age = $user->age;

            $minimumAge = 18;

            if ($age < $minimumAge) {
                return redirect('/not-allowed');
            }
        }

        return $next($request);
    }
}
