<?php

use App\Models\User\User;
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
    return $user->avatar ? "/user/$user->id/avatar/$user->avatar" : 'https://picsum.photos/32/32/?random';
}

function getUserBanner($user)
{
    return $user->banner
        ? "/user/$user->id/banner/$user->banner"
        : 'https://images.unsplash.com/photo-1605379399642-870262d3d051?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=2000&q=80';
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
