<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use glossary\Glossary;
use glossary\Lenguage;
use glossary\User;
use Faker\Generator as Faker;

$factory->define(Glossary::class, function (Faker $faker) {
    return [
      'title'=> $faker->sentence(2,true),
      'description'=> $faker->sentence(10,true),
      'user_id'=> User::inRandomOrder()->first(),
      'lenguage_id'=> Lenguage::inRandomOrder()->first(),
    ];
});
