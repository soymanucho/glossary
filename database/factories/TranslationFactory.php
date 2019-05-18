<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use glossary\Translation;
use glossary\User;
use glossary\Term;
use Faker\Generator as Faker;

$factory->define(Translation::class, function (Faker $faker) {
    return [
      'user_id'=> User::inRandomOrder()->first(),
      'orig_term_id'=> Term::inRandomOrder()->first(),
      'dest_term_id'=> Term::inRandomOrder()->first(),
    ];
});
