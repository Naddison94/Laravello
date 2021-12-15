<?php

use Illuminate\Support\Facades\Auth;

function isOwner($id)
{
    return $id == Auth::id();
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
