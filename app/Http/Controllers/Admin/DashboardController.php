<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

class DashboardController
{
    Public function show()
    {
        $users = User::paginate(4);
        $activeUsersCount = User::count();
        return view('admin.dashboard', compact('users', 'activeUsersCount'));
    }
}
