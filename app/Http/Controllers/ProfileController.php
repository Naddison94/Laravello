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

        return view('profile.show', compact('user'));
    }

    public function edit($user_id)
    {
        $user = User::find($user_id);

        return view('profile.edit', compact('user'));
    }

    public function update($user_id, Request $request)
    {
        $fileName = null;
        //later abstract uploads into sub dirs that are a post id, or add some logic for duplicated files in the same dir
        if ($request->file('image')) {
            $fileName = $request->file('image')->getClientOriginalName();
        }


        $user = User::find($user_id);
        $user->avatar = $fileName;

        if ($user->save() && $fileName != false) {
            $request->image->move(public_path("/user/$user->id/avatar/"), $fileName);
        }

        return $user;
    }
}
