<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User\Friends;
use Illuminate\Http\Request;

class FriendsController extends Controller
{
    public function index($user_id)
    {
        $friends = Friends::where('user_id', $user_id)->get();
        return view('user.')
    }
}
