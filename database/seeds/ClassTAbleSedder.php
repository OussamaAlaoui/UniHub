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
            Class_l::create(['level'=>'3','major'=>'IIR','c_id'=>'1','city'=>'Rabat']);
            Class_l::create(['level'=>'3','major'=>'IIR','c_id'=>'2','city'=>'Rabat']);
            Class_l::create(['level'=>'3','major'=>'IIR','c_id'=>'3','city'=>'Rabat']);
            Class_l::create(['level'=>'3','major'=>'IIR','c_id'=>'4','city'=>'Rabat']);
            Class_l::create(['level'=>'3','major'=>'IIR','c_id'=>'5','city'=>'Rabat']);

            Class_l::create(['level'=>'2','major'=>'AP','c_id'=>'2','city'=>'Rabat']);
            Class_l::create(['level'=>'2','major'=>'AP','c_id'=>'1','city'=>'Rabat']);
            Class_l::create(['level'=>'2','major'=>'AP','c_id'=>'3','city'=>'Rabat']);
            Class_l::create(['level'=>'2','major'=>'AP','c_id'=>'4','city'=>'Rabat']);
            Class_l::create(['level'=>'2','major'=>'AP','c_id'=>'5','city'=>'Rabat']);
            Class_l::create(['level'=>'2','major'=>'AP','c_id'=>'6','city'=>'Rabat']);
        
    
        }
    
}
