<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catInstitucion extends Model
{
    protected $table = 'cat_institucion'; 

    public function participanInst()
    {
        return $this->hasMany(Musuario::class);
    }
}
