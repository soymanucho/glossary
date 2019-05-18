<?php

use Illuminate\Database\Seeder;
use glossary\Glossary;

class GlossariesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(Glossary::class, 50)->create();
    }
}
