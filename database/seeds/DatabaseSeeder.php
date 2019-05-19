<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(LenguagesTableSeeder::class);
        $this->call(GlossariesTableSeeder::class);
        $this->call(SubjectsTableSeeder::class);
        $this->call(TermsTableSeeder::class);
        $this->call(GlossaryTermsTableSeeder::class);
        $this->call(GlossarySubjectsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
    }
}
