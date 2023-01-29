<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asistencia extends Model
{
    protected $table = 'evento_asistencia'; 

    public function participanInst()
    {
        return $this->hasMany(Musuario::class);
    }
}