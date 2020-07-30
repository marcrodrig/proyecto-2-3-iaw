<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Turno extends Model
{

    protected $fillable = [
        'hora', 'dia', 'tipoTurno'
    ];

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
