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
         $this->call([RolesTAbleSeeder::class,UsersTableSeeder::class,MajorSeeder::class,ClassTAbleSedder::class,PosttSeeder::class,Subjectseeder::class]);
      
    }
}
