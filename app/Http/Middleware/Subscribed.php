<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Subscribed
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is makes 3 resumes then he need to subscribe

        $user  = $request->user();
        if (!$user) {
            return redirect()->route('login');
        }

        if ($user->resumes()->count() >= 3) {
            if (! $request->user()?->subscribed()) {
                // Redirect user to billing page and ask them to subscribe...
                return redirect('/pricing');
            }
        }
        return $next($request);
    }
}
