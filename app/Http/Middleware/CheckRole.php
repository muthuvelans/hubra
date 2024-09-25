<?php
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (!Auth::user() || Auth::user()->role !== $role) {
            return redirect('login');
        }

        return $next($request);
    }
}
