<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Employee;
use Faker\Generator as Faker;


$factory->define(Employee::class, function (Faker $faker) {
    $abilities = array("Php", "Js", "Java", "Html", "Css", "Laravel","Angular","Node","Linux","Servidores");
    return [
        'name'      => $faker->name,
        'last_name' => $faker->lastName,
        'age'       => $faker->randomDigit,
        'email'     => $faker->email,
        'abilities' => $abilities[array_rand($abilities,1)],
    ];
});
