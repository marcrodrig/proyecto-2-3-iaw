<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Turno;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Turno::class, function (Faker $faker) {

    return [
        'dia' =>  Carbon::createFromDate(null, rand(6,7), rand(1, 20)),
        'hora' => Carbon::createFromTime(rand(12,23), 0, 0),
        'tipoTurno' => $faker->randomElement(['femenino' ,'masculino', 'mixto']),
    ];
});
