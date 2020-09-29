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
        major::create(['major_name'=>'CS']);
        major::create(['major_name'=>'CN']);
        major::create(['major_name'=>'CE']);
        major::create(['major_name'=>'FI']);
    }
}
