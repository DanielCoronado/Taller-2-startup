<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    protected $table = 'rol';

    protected $primaryKey = 'id';

    protected $fillable = [
    	'descripcion',
    ];

    public function usuarios() {
    	return $this->hasMany(User::class, 'id_rol');
    }
}
