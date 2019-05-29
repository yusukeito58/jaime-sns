<?php

use Faker\Generator as Faker;

$factory->define(App\Post::class, function (Faker $faker) {
    return [
        'id' => str_random(12),
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
        'content' => 'test message',
        'photo_filename' => 'dummy_post_photo.jpg',
        'created_at' => $faker->dateTime(),
        'updated_at' => $faker->dateTime(),
    ];
});
