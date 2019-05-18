<?php

use Illuminate\Database\Seeder;
use glossary\Translation;

class TranslationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Translation::class, 250)->create();
    }
}
