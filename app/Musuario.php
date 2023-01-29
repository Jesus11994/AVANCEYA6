<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Musuario extends Model
{
    protected $table = 'participante'; 
    
    public function catalogo()
    {
        return $this->belongsTo(catnivel::class);
    }

    public function catalogoIns()
    {
        return $this->belongsTo(catInstitucion::class);
    }
}
