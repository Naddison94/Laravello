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

function getUserAvatar($user)
{
    return $user->avatar ? "/user/$user->id/avatar/$user->avatar" :  'https://picsum.photos/32/32/?random';
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

function getMonthlyMetrics($collections)
{
    $arrCurrentMonth = [];
    foreach ($collections as $collection) {
        if ($collection->created_at->format('M') == Carbon::now()->format('M')) {
            $arrCurrentMonth = $collection;
        }
    }

    return ($arrCurrentMonth);
}
