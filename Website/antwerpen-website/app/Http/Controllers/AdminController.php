<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Input;

use App\Project;

class AdminController extends Controller
{
    public function __construct(){
        $this->middleware('admin');
    }

    
    protected function panel(){
        return view('\admin\admin-panel');
    }
    
    protected function newproject()
    {
        
        //dd( Input::all() );   om input data te testen.

         $data = Input::all();

       
        $picpath = "/pictures/" . $data['foto'];

        Project::create([
            'naam' => $data['naam'],
            'uitleg' => $data['uitleg'],
            'locatie' => $data['locatie'],
            'foto' => $picpath,
            'isActief' => 0,
            'idCategorie' => 5
        ]);
        
        
        return view('\admin\admin-panel');
    }
}
