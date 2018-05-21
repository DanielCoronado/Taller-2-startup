<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rutina extends Model
{
    protected $table = 'rutina';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'id_tipo_rutina', 'id_cliente', 'nombre_rutina', 'descripcion', 'fecha_inicio', 'fecha_termino',
    ];

    public function tipo_rutina() {
    	return $this->belongsTo(TipoRutina::class, 'id_tipo_rutina');
    }

    public function cliente() {
    	return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
