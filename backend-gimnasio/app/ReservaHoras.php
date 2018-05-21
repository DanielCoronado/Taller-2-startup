<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReservaHoras extends Model
{
    protected $table = 'reserva_horas';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'id_cliente', 'hora_inicio', 'hora_termino', 'fecha_reserva', 'descripcion',
    ];

    public function cliente() {
    	return $this->belongsTo(Cliente::class, 'id_cliente');
    }
}
