<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    public function phases(){
        return $this->hasOne('App\Phase', 'idFase', 'idFase');
    }
}
