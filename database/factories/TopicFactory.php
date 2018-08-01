<?php

use App\Models\Topic;
use Faker\Generator as Faker;

$factory->define(Topic::class, function (Faker $faker) {
    $sentence = $faker->sentence();
    // 随机取这个月以内的某个时间。
    $updatedAt = $faker->dateTimeThisMonth();
    // 将更新时间传入是保证创建时间永远比更新时间还早。
    $createdAt = $faker->dateTimeThisMonth($updatedAt);
    return [
        'title'      => $sentence,
        'body'       => $faker->text(),
        'excerpt'    => $sentence,
        'created_at' => $createdAt,
        'updated_at' => $updatedAt,
    ];
});