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
use App\User;
use App\Phase;
use App\Question;
use App\User_follow;
use App\Categorie;
use Illuminate\Database\DatabaseManager;
use Illuminate\Http\Request;

//!!!!!!!!NIEUWE CLASSES ALTIJD INCLUDEN DOOR "USE"!!!!!!!!//

Route::get('/', function () {
    /**
    *Array bevat alle projecten en hun data.
    *
    *@var array
    */
    $projecten = DB::table('projects')
                    ->join('categories', 'projects.idCategorie', '=', 'categories.idCategorie')
                    ->select('categories.naam as catNaam', 'categories.icon_class', 'projects.*')
                    ->get();

    $categories = Categorie::all();

    //duplicates filteren
    $locaties = array_unique(DB::table('projects')
                ->select('projects.locatie')
                ->get(), SORT_REGULAR);



    return view('projecten', [
        'projecten' => $projecten,
        'categories' => $categories,
        'locaties' => $locaties,
    ]);
});

Route::get('/project/{id}', function($id) {

    /**
    *Array bevat de data van een enkel project.
    *
    *@var $project
    *
    *Array dat de fases bevat.
    *
    *@var $phases
    *
    *
    *
    *@var $projectFollow
    *
    *
    */
    /**
    *Array bevat de data van een enkel project.
    *
    *@var array
    */
    //get project by id
    $project = Project::where('idProject', '=', $id)->first();
    //get phases of project
    $phases = Phase::where('idProject', '=', $id)->get();
    //get all categories
    $categorien = Categorie::orderBy('idCategorie', 'asc')->get();

    //get questions per phase
    foreach($phases as $key => $phase){
        $questions[$key] = Question::with('phases')->where('idFase', '=', $phase->idFase)->get();
    }

    //dd($questions);

    //dd($questions[1][0]->vraag);
    //$questions = Question::where('idFase', '=', $phaseId)->get();


    return view('project', [
        'project' => $project,
        'phases' => $phases,
        'categorien' => $categorien,
        'questions' => $questions
    ]);
});


// Authentication Routes...
Route::get('/auth/login', 'Auth\AuthController@getLogin');
Route::post('/auth/login', 'Auth\AuthController@postLogin');
/*Route::get('auth/logout', 'Auth\AuthController@getLogout');*/
Route::get('/auth/logout', function()
{
    Auth::logout();
    return Redirect::to('/auth/login');
});
// Registration Routes...
Route::get('/auth/register', 'Auth\AuthController@getRegister');
Route::post('/auth/register', 'Auth\AuthController@postRegister');

/*--Profiel--*/
Route::get('/dashboard', 'HomeController@dash');

/*Admin*/
Route::get('/admin', 'AdminController@panel');

/*nieuw project aanmaken*/
Route::get('/admin/nieuwproject', 'AdminController@getNieuwProject');
Route::post('/admin/nieuwproject', 'AdminController@postNieuwProject');

/*project bewerken*/
Route::get('/admin/project-bewerken/{id}', 'AdminController@getProjectBewerken');
Route::post('/admin/project-bewerken/{id}', 'AdminController@postProjectBewerken');
