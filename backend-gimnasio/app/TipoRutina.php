<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoRutina extends Model
{
    protected $table = 'tipo_rutina';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'nombre_tipo',
    ];

    public function rutinas(){
    	return $this->hasMany(Rutina::class, 'id_tipo_rutina');
    }
}
