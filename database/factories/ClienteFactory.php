<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;

$factory->define(Cliente::class, function (Faker $faker) {
    $filepath = public_path('storage');
    $img = Image::make('public/images/default-avatar.jpg');
    $img->save($filepath . '/default-avatar.jpg');
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'DNI' => $faker->numberBetween(20000000, 40000000),
        'telefono' => $faker->randomNumber(6),
        'foto' => 'default-avatar.jpg'
    ];
});
