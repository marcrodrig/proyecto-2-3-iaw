<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Turno;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Turno::class, function (Faker $faker) {
    return [
        'descripcion' => $faker->name,
        'dia' =>  Carbon::createFromDate(null, rand(5,6), rand(1, 20)),
        'horario' => Carbon::createFromTime(rand(12,23), 0, 0)
    ];
});
