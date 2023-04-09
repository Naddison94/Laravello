<?php

namespace App\Http\Middleware;

use App\Models\User\Admin;
use Closure;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle($request, Closure $next)
    {
        if (Admin::where('user_id', Auth::id())->first()) {
            return $next($request);
        }

        Session()->flash('error', 'Access denied. You do not have the required permission level to perform this action.');

        return redirect('dashboard');
    }
}
