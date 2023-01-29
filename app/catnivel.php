<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class catnivel extends Model
{
    protected $table = 'cat_nivel'; 
    
    public function participantes()
    {
        return $this->hasMany(Musuario::class);
    }

    
  
}
