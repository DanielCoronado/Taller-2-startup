<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'id_usuario', 'rut', 'nombre', 'apellidos', 'edad',
    ];

    public function usuario(){
    	return $this->belongsTo(User::class, 'id_usuario');
    }

    public function rutinas(){
    	return $this->hasMany(Rutina::class, 'id_cliente');
    }

    public function reserva_horas(){
    	return $this->hasMany(ReservaHoras::class, 'id_cliente');
    }

    public function registro_progreso(){
    	return $this->hasMany(RegistroProgreso::class, 'id_cliente');
    }
}
