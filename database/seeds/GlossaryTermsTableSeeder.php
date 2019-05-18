<?php

use Illuminate\Database\Seeder;
use glossary\Glossary;
use glossary\Term;

class GlossaryTermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $terms = Term::all();

      Glossary::all()->each(function ($glossary) use ($terms) {
          $glossary->terms()->attach(
              $terms->random(rand(3, 5))->pluck('id')->toArray()
          );
      });
    }
}
