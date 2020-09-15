<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Model\Comment::class, function (Faker $faker) {
    return [
        'post_id' => factory(App\Model\Post::class)->create()->id,
        'user_id' => factory(App\User::class)->create()->id,
        'content' => $faker->paragraph(1),
        'created_at' => new DateTime,
        'updated_at' => new DateTime,
    ];
});
