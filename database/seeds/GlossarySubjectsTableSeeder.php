<?php

use Illuminate\Database\Seeder;
use glossary\Glossary;
use glossary\Subject;

class GlossarySubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $glossaries = Glossary::all();

      Subject::all()->each(function ($subject) use ($glossaries) {
          $subject->glossaries()->attach(
              $glossaries->random(rand(1, 3))->pluck('id')->toArray()
          );
      });
    }
}
