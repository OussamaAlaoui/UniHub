<?php

use Illuminate\Database\Seeder;
use App\role;
class RolesTAbleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        role::truncate();
        role::create(['name'=>'admin']);
        role::create(['name'=>'delegate']);
        role::create(['name'=>'professor']);
        role::create(['name'=>'student']);
        role::create(['name'=>'moderator']);

    }
}
