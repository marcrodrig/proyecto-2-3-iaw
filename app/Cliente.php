<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{

    protected $fillable = [
        'nombre'
    ];

    public function turnos() {
        return $this->hasMany(Turno::class);
    }
}
