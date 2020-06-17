<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = [
        'nombre', 'apellido', 'DNI', 'telefono', 'foto'
    ];

    public function turnos() {
        return $this->hasMany(Turno::class);
    }
}
