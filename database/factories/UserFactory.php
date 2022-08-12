<?php

use App\Models\User;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(User::class, function (Faker $faker,$email) {

    return [
        'name' => $faker->name,
        'email' => $email, //$faker->unique()->safeEmail,
        'provider' => 'google',
        'provider_id' => '105969942916631305031'
    ];
});
