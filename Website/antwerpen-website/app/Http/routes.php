<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use App\Project;
use Illuminate\Http\Request;

Route::get('/', function () {

    $projecten = Project::orderBy('idProject', 'asc')->get();

    return view('projecten', [
        'projecten' => $projecten
    ]);
});

Route::get('/project/{id}', function($id) {

    $project = Project::where("idProject", "=", $id);

    return view('project', [
        'project' => $project
    ]);
});
