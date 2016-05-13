<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'naam', 'uitleg', 'locatie', 'foto', 'isActief', 'idCategorie'
    ];

    public function categorie()
    {
        return $this->hasOne('App\Categorie', 'idCategorie', 'idCategorie');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'user_follows', 'user_id', 'follow_id');
    }
}
