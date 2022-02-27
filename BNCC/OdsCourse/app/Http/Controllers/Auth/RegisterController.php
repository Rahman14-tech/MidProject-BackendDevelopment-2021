<?php

namespace App\Http\Controllers\Auth;

use App\Datum;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        return Validator::make($data, [
            'name' => ['string','min:10', 'max:45'],
            'Username' => ['required', 'string','min:3','max:15', 'unique:users'],
            'password' => ['required', 'string', 'min:8','max:20','regex:/^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{8,}$/', 'confirmed'],
            'Address'=>['string'],
            'Age'=>['integer'],
            'Phone_Number'=>['string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     *
     */

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'Username' => $data['Username'],
            'password' => Hash::make($data['password']),
            'Address' => $data['Address'],
            'Age'=>$data['Age'],
            'Phone_Number'=>$data['Phone_Number'],
            'Birth_Date'=>$data['Birth_Date'],
        ]);
    }
}
