<?php
/**
 * Filename: AdminMiddleware.php
 * Description: This middleware is used to handle the user and admin 
 * Author: Muthu Velan
 * Date: 25-09-2024
 * Version: 1.0
 */
namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle($request, Closure $next)
    {
        if (Auth::user()->is_admin) {
            return $next($request);
        }
        return redirect('/home')->with('error', 'Unauthorized access.');
    }
}
