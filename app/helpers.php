<?php

use Illuminate\Support\Facades\Auth;

function isOwner($id)
{
    return $id == Auth::id();
}
