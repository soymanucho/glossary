<?php

use Illuminate\Database\Seeder;
use glossary\Subject;

class SubjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Subject::class, 100)->create();
    }
}
