<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'naam', 'uitleg', 'locatie', 'foto', 'isActief', 'idCategorie'
    ];

    public function followers()
    {
        return $this->belongsToMany('Project', 'user_follows', 'follow_id', 'user_id');
    }
}
