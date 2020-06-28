<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cliente;
use Faker\Generator as Faker;
use Faker\Provider as Provider;

$factory->define(Cliente::class, function (Faker $faker) {
    $faker->addProvider(new Provider\es_AR\Person($faker));;
    $filepath = public_path('storage');
    $img = Image::make('public/images/default-avatar.jpg');
    $rdm = $faker->unique()->randomDigit;
    $img->save($filepath . '/' . $rdm . '-default-avatar.jpg');
    return [
        'nombre' => $faker->firstName,
        'apellido' => $faker->lastName,
        'DNI' => $faker->numberBetween(20000000, 40000000),
        'telefono' => '29324' . $faker->numberBetween(20000,50000),
        'foto' => $rdm . '-default-avatar.jpg'
    ];
});
