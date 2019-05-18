<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use glossary\Term;
use glossary\Lenguage;
use Faker\Generator as Faker;

$factory->define(Term::class, function (Faker $faker) {
    return [
      'name'=> $faker->word(),
      'definition'=> $faker->sentence(15,true),
      'lenguage_id'=> Lenguage::inRandomOrder()->first(),
    ];
});
