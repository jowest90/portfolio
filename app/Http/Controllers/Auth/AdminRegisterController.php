<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Auth;

class AdminRegisterController extends Controller
{

  public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

  public function showRegistrationForm(){
    return view('admin.createUser');
  }

  public function registerUser(Request $request)
  {
      $this->validator($request->all())->validate();

      event(new Registered($user = $this->create($request->all())));

      $this->guard()->login($user);

      return $this->registered($request, $user)
                      ?: redirect($this->redirectPath());

  }


      /**
       * Get a validator for an incoming registration request.
       *
       * @param  array  $data
       * @return \Illuminate\Contracts\Validation\Validator
       */
      public function validator(array $data)
      {
          return Validator::make($data, [
              'name' => 'required|max:255',
              'email' => 'required|email|max:255|unique:users',
              'password' => 'required|min:6|confirmed',
          ]);
      }

      /**
       * Create a new user instance after a valid registration.
       *
       * @param  array  $data
       * @return User
       */

      public function userCreate(array $data)
      {
          return User::create([
              'name' => $data['name'],
              'email' => $data['email'],
              'password' => bcrypt($data['password']),
          ]);
      }
}
