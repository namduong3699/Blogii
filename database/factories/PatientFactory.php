<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Patient::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'identity_number' => random(10),
        'birthday' => $faker->birthday,
        'address' => $faker->address,
        // 'phone' => $faker->phoneNumber,
        'email' => $faker->unique()->safeEmail
    ];
});