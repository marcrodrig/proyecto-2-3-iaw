<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{

    protected $fillable = [
        'nombre', 'etiqueta'
    ];

    public function abilities() {
        return $this->belongsToMany(Ability::class)->withTimestamps();
    }

    public function allowTo($ability) {
        /*if(is_string($ability)) {
            $ability = Ability::where('nombre',$ability)->firstOrFail();
        }*/
        $this->abilities()->syncWithoutDetaching($ability);
    }

}
