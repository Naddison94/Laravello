<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

function isOwner($id)
{
    return $id == Auth::id();
}

function setUserActivity()
{
    $user = User::find(Auth::id());
    $user->last_active = Carbon::now();
    $user->save();
}

function getFileName()
{

}

function resizeFile()
{

}

function uploadPath()
{

}

function uploadFile()
{

}
