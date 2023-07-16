<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

// use Illuminate\Support\Facades\Mail;
// use App\Mail\AutoMail;


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
    protected $redirectTo = '/';

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
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'LName' => ['required', 'string', 'max:255'],
            // 'status_work' => ['string','max:255'],
            'Position' => ['required', 'string', 'max:255'],
            'Department'=> ['required', 'string', 'max:255'],
            'Tel' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
            
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

        // $details = [
        //     'title' => 'New user register',
        //     'body' => ('user name that register from website CMblockage is: '. $data['name'].' '.$data['LName'].' and email is: '. $data['email']),
        //     'replyback' => "Do not reply this email"
        // ];

        // Mail::to("cmblockage.cmu@gmail.com") -> send(new AutoMail($details));
        
        return   User::create([
            'name' => $data['name'],
            'LName' =>  $data['LName'],
            'Position' => $data['Position'],
            'Department' => $data['Department'],
            'Tel' => $data['Tel'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'verify' => 1,
            'status_work' => "surveyor01",
        ]);

    }
}
