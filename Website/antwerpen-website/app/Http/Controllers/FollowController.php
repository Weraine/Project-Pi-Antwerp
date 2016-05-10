<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class FollowController extends Controller
{
    public function follow(){

        $userId = Auth::id();

        $followingProjectsId = DB::table('user_follows')
                            ->select('user_follows.project_id')
                            ->where('user_follows.user_id', '=', $userId)
                            ->get();

        return view('\project', [
            'projects' => $projects,
        ]);
    }
}
