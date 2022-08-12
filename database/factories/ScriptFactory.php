<?php

use App\Models\Script;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(Script::class, function (Faker $faker,$user_id) {

    return [
        'title' => Str::random(30),
        'description' => Str::random(100), 
        'user_id' => $user_id,
        'section1' => Str::random(100),
    ];
});
