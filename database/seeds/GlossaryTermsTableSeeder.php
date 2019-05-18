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
      $glossaries = Glossary::all();

      Term::all()->each(function ($term) use ($glossaries) {
          $term->glossaries()->attach(
              $glossaries->random(rand(1, 3))->pluck('id')->toArray()
          );
      });
    }
}
