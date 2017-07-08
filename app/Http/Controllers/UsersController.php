<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    //show assignee employee

    public function show($id)
    {
        $user = User::findOrFail($id);

        return view('institutions.assignee_show', compact(['user']));
    }
}
