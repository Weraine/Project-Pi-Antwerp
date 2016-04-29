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
    
    protected function getNieuwProject(){
        return view('\admin\nieuw-project');
    }
    
    protected function postNieuwProject()
    {
        
        //dd( Input::all() );   om input data te testen.
        
        /**
        *Data bevat de values van inputfields van het nieuwe project.
        *
        *@var array
        */        
        $data = Input::all();
        
        /**
        *picpath bevat het pad naar de geuploade afbeelding.
        *
        *@var string
        */   
        $picpath = "/pictures/" . $data['foto'];
        
        /**
        *isActief bevat 1 als checkbox aangevinkt is, 0 als deze uitgevinkt is.
        *
        *@var int
        */   
        $isActief = (isset($data['isActief'])) ? 1 : 0;
        
        //dd($data);
        
        Project::create([
            'naam' => $data['naam'],
            'uitleg' => $data['uitleg'],
            'locatie' => $data['locatie'],
            'foto' => $picpath,
            'isActief' => $isActief,
            'idCategorie' => 5
        ]);
        
        
        return view('\admin\admin-panel');
    }
    
    protected function getProjectBewerken($id){
        
        /**
        *id is de idProject van het project dat men wil bewerken.
        *
        *@var int
        */
        
        /**
        *Project is het geselecteerde project uit de database.
        *
        *@var int
        */ 
        $project = Project::where('idProject', '=', $id)->first();
        //dd($project);
        return view('\admin\project-bewerken', [
        'project' => $project
    ]);
    }
    
    protected function postProjectBewerken($id)
    {
        
        //dd( Input::all() );   om input data te testen.
        
        /**
        *Data bevat de values van inputfields van het nieuwe project.
        *
        *@var array
        */        
        $data = Input::all();
        
        /**
        *picpath bevat het pad naar de geuploade afbeelding.
        *
        *@var string
        */   
        $picpath = "/pictures/" . $data['foto'];
        
        /**
        *isActief bevat 1 als checkbox aangevinkt is, 0 als deze uitgevinkt is.
        *
        *@var int
        */   
        $isActief = (isset($data['isActief'])) ? 1 : 0;
        
        /**
        *id is de idProject van het project dat men wil bewerken.
        *
        *@var int
        */ 
        
        //dd($data);
        
        /*Project->where('idProject', $id)
            ->update([
            'naam' => $data['naam'],
            'uitleg' => $data['uitleg'],
            'locatie' => $data['locatie'],
            'foto' => $picpath,
            'isActief' => $isActief,
            'idCategorie' => 5
        ]);*/
        
        
        return view('\admin\project-bewerken');
    }
}
