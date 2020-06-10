<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Turno extends Model
{

    protected $fillable = [
        'descripcion', 'dia', 'horario'
    ];

    protected $dates = [
        'dia'
    ];

    public function getDiaAttribute($value) {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function cliente() {
        return $this->belongsTo(Cliente::class);
    }
}
