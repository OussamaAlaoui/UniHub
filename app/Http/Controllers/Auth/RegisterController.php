<?php

namespace App\Http\Controllers\Auth;
use App\role;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Student;
use App\Class_l;



class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        
        //dd($data);
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'username'=>['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:3', 'confirmed'],
            'student_id'=>['required', 'string', 'max:255'],
            'guardian_email' => ['required', 'string', 'email', 'max:255', 'unique:students'],
            'class'=>['required', 'string', 'max:10'],
             


        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
       
        
        $studentRole=role::where('name','student')->first();
      
       $user=user::create([
            'name' => $data['name'],
            'username'=>$data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
       
     student::create([
            'student_id'=>$data['student_id'],
            'guardian_email'=>$data['guardian_email'],
              'class'=>$data['class'],
          
             'user_id'=>$user->id,
        ]);
     $user->roles()->attach($studentRole);
      return $user;
       
    }
  
   
    // protected function create_student(array $data)
    // {
    //      return student::create([
    //         'student_id' =>$data['student_id'],
    //         'class' =>$data['class'],
    //        'guardian_email'=>$data['guardian_email'],
    //     ]);
    // }
}
