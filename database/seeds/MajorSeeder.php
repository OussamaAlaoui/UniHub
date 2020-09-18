<?php

use Illuminate\Database\Seeder;
use App\major;
class MajorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        major::create(['major_name'=>'Computer Science']);
        major::create(['major_name'=>'Computer Networking']);
        major::create(['major_name'=>'Civil Engineering']);
        major::create(['major_name'=>'finance']);
    }
}
