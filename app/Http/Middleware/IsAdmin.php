<?php

namespace App\Http\Middleware;

use App\Models\UserAdmin;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Auth::user() && UserAdmin::find(Auth::id())) {
            return $next($request);
        }

        Session()->flash('error', 'You do not have admin access.');

        return redirect('dashboard');
    }
}
