<?php

use Illuminate\Database\Seeder;
use App\posttype;
class PosttSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     
        posttype::create(['type_name'=>'Announcement']);
        posttype::create(['type_name'=>'Request']);
        posttype::create(['type_name'=>'Question']);
        posttype::create(['type_name'=>'Debate']);
    }
}
