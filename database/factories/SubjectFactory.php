<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use glossary\Subject;
use Faker\Generator as Faker;

$factory->define(Subject::class, function (Faker $faker) {
    return [
      'name'=> $faker->word(),
    ];
});
