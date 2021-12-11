<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    use softdeletes;

    public function show($user_id)
    {
        $user = User::find($user_id);

        return view('profile', compact('user'));
    }
}
