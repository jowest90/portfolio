<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Admin;
use Input;

class AdminController extends BaseController
{
  /**
   * Create a new controller instance.
   *
   * @return void
   */
  public function __construct()
  {
      $this->middleware('auth:admin');
  }



  /**
   * Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      return view('admin.admin');
  }

  public function createUser(){
    return view('admin.createUser');
  }

  public function createAdmin(){
    return view('admin.createAdmin');
  }

  public function userScore(){
    return view('admin.userScore');
  }

  public function addUser(Request $request){
    $this->validator($request->all())->validate();

    event(new Registered($user = $this->userCreate($request->all())));

    //$this->guard()->login($user);
    //Session::flash('flash message', 'User has been created');

    return view('admin.createUser');
  }

  public function addAdmin(Request $request){
    $this->validator($request->all())->validate();

    event(new Registered($user = $this->adminCreate($request->all())));

    //$this->guard()->login($user);
    //Session::flash('flash message', 'Admin has been created');

    return view('admin.createAdmin');
  }

  public function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'password' => 'required|min:6|confirmed',
      ]);
  }

  public function userCreate(array $data)
  {
      return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
  }

  public function adminCreate(array $data)
  {
      return Admin::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
  }

}
