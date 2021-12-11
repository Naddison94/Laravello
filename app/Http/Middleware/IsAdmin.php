<?php

namespace App\Http\Middleware;

use Closure;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Session('admin') === true) {
            return $next($request);
        }

        Session()->flash('error', 'You do not have admin access.');

        return redirect('dashboard');
    }
}
