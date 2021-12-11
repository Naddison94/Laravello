<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AvatarController extends Controller
{
    public function create($user_id)
    {
        $user = User::find($user_id);

        return view('partials.avatar.edit', compact('user'));
    }

    public function store()
    {

    }
}
