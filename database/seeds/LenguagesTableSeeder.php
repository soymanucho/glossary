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
          ['name' => 'English', 'color'=>'#41dd71'],
          ['name' => 'Spanish', 'color'=>'#dd4141'],
          ['name' => 'Catalan', 'color'=>'#d49a04'],
          ['name' => 'French', 'color'=>'#41ddd3'],
          ['name' => 'German', 'color'=>'#415add'],
          ['name' => 'Italian', 'color'=>'#7741dd'],
          ['name' => 'Chinese', 'color'=>'#952256'],
          ['name' => 'Hebrew', 'color'=>'#62bf04'],
      ];
      foreach($lenguages as $lenguage) {
          Lenguage::create($lenguage);
      }
    }
}
