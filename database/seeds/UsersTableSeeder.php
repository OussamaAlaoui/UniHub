<?php

use Illuminate\Database\Seeder;
use App\User;
use Illuminate\Support\Facades\DB;
use App\role;
use Illuminate\Support\Facades\Hash;
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
            'name' =>'Oussama Alaoui Ismaili',
            'username'=>'ousalis',
            'email' => 'ousalis99@gmail.com',
            'password' => Hash::make('ousalis99'),
            'bio'=>'developer'
        ]);
     
        $user->roles()->attach($adminRole);
    }
}
