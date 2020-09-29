<?php

use Illuminate\Database\Seeder;
use App\Class_l;
class ClassTAbleSedder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
  
        public function run()
        {
            Class_l::truncate();
            Class_l::create(['level'=>'3','major'=>'CS','c_id'=>'1']);
            Class_l::create(['level'=>'3','major'=>'CS','c_id'=>'2']);
            Class_l::create(['level'=>'3','major'=>'CS','c_id'=>'3']);
            Class_l::create(['level'=>'3','major'=>'CS','c_id'=>'4']);
            Class_l::create(['level'=>'3','major'=>'FI','c_id'=>'5']);

            Class_l::create(['level'=>'2','major'=>'CE','c_id'=>'2']);
            Class_l::create(['level'=>'2','major'=>'CE','c_id'=>'1']);
            Class_l::create(['level'=>'2','major'=>'CE','c_id'=>'3']);
            Class_l::create(['level'=>'2','major'=>'CF','c_id'=>'4']);
            Class_l::create(['level'=>'2','major'=>'CF','c_id'=>'5']);
            Class_l::create(['level'=>'2','major'=>'FI','c_id'=>'6']);
        
    
        }
    
}
