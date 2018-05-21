<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RegistroProgreso extends Model
{
    protected $table = 'registro_progreso';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'id_cliente', 'altura', 'peso', 'imc', 'fecha_registro',
    ];

    public function cliente() {
    	return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
