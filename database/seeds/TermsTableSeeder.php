<?php

use Illuminate\Database\Seeder;
use glossary\Term;

class TermsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Term::class, 250)->create();
    }
}
