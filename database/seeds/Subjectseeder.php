<?php

use Illuminate\Database\Seeder;
use App\Subject;
class Subjectseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        Subject::create(['subject_name'=>'English']);
        Subject::create(['subject_name'=>'Compilation']);
        Subject::create(['subject_name'=>'OPP']);
        Subject::create(['subject_name'=>'French']);
        Subject::create(['subject_name'=>'Math']);
        Subject::create(['subject_name'=>'UML']);
        Subject::create(['subject_name'=>'OS']);
        Subject::create(['subject_name'=>'Law']);
    }
}
