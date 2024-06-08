<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $roles)
    {
        if (!Auth::check() || Auth::user()->roles !== $roles) {
            return redirect('/home')->with('error', 'Vous n\'avez pas l\'autorisation d\'accéder à cette page.');
        }

        return $next($request);
    }
}
