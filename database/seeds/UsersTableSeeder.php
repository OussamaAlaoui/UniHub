<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use App\role;
use Illuminate\Support\Facades\Hash;
use App\Student;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        DB::table('roleusers')->truncate();
        $adminRole=role::where('name','admin')->first();
        $studentRole=role::where('name','student')->first();
        $professorRole=role::where('name','professor')->first();
        $delegateRole=role::where('name','delegate')->first();
        $user=user::create([
            'first_name' =>'Oussama',
            'last_name'=>'Alaoui Ismaili',
            'email' => 'ousalis99@gmail.com',
            'password' => Hash::make('ous99'),
            'bio'=>'developer'
        ]);
     
        $user->roles()->attach($adminRole);
        $user1=user::create([
            'first_name' =>'Dan',
            'last_name'=>'Ariely',
            'email' => 'dan@gmail.com',
            'password' => Hash::make('dan1'),
            'bio'=>'writer'
        ]);

        student::create([
            'student_id'=>"A1",
            'user_id'=>$user1->id,
            'class'=>"3CS1",
            'guardian_email'=>"danpar@gmail.com",
            'is_activated'=>1

        ]);
        $user1->roles()->attach($studentRole);
    }
}
