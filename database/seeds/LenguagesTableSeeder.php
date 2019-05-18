<?php

use Illuminate\Database\Seeder;
use glossary\Lenguage;

class LenguagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $lenguages = [
          ['name' => 'English'],
          ['name' => 'Spanish'],
          ['name' => 'Catalan'],
          ['name' => 'French'],
          ['name' => 'German'],
          ['name' => 'Italian'],
          ['name' => 'Chinese'],
          ['name' => 'Hebrew'],
      ];
      foreach($lenguages as $lenguage) {
          Lenguage::create($lenguage);
      }
    }
}
