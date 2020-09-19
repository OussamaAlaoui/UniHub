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
         $this->call([RolesTAbleSeeder::class,UsersTableSeeder::class,ClassTAbleSedder::class,Subjectseeder::class]);
      
    }
}
