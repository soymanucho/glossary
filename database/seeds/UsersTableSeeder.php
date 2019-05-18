<?php

use Illuminate\Database\Seeder;
use glossary\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $users = factory(User::class, 5)->create();

      $user = new glossary\User();
      $user->password = Hash::make('admin');
      $user->email = 'admin@admin.com';
      $user->name = 'Administrador';
      $user->save();

    }
}
