<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User_follow;
use App\User;

class UserfollowsprojectController extends Controller
{
    protected function followProject($id){

        /**
        *$following een array van alle users die een project followen. uit de db.
        *
        *@var array
        */
        $following = User_follow::all();
        $user      = User::orderBy('idUser');


        return view('\project\{id}', [
        'following' => $following,
        'user'      => $user,
    ]);
    }
}
