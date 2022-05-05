<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group\Group;

class GroupController extends Controller
{
    public function index()
    {
        $groups = Group::all();

        return view('group.index', compact('groups'));
    }
}
