<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\User;
use App\Admin;
use Auth;
use Input;
use Validator;
use App\models\User as Users;
use App\models\Completed;
use App\models\Scenario;

class AdminController extends Controller
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
   //------------------------SHOW ADMIN PAGES-------------------------------
  public function index()
  {
      return view('admin.home');
  }

  public function createUser(){
    return view('admin.createUser');
  }

  public function createAdmin(){
    return view('admin.createAdmin');
  }

  //------------------------------------------------------------------------------

public function AdminLogout()
  {
      Auth::guard('admin')->logout();
      return redirect('/admin');
  }


//------------------------USER/ADMIN REGISTRATION-------------------------------
//CREATE USER
  public function addUser(Request $request){

    $validator = $this->validator($request->all());

    if ($validator->fails()) {
        $this->throwValidationException(
            $request, $validator
        );
    }
    $user = $this->userCreate($request->all());

    return view('admin.createUser');
  }
//CREATE ADMIN
  public function addAdmin(Request $request){
    $validator = $this->validator($request->all());

    if ($validator->fails()) {
        $this->throwValidationException(
            $request, $validator
        );
    }
    $user = $this->adminCreate($request->all());

    return view('admin.createAdmin');
  }
//------------------------------------------------------------------------------

//-----------------------VALIDATE/CREATE----------------------------------------
//VALIDATOR
  public function validator(array $data)
  {
      return Validator::make($data, [
          'name' => 'required|max:255',
          'email' => 'required|email|max:255|unique:users',
          'required|min:8|confirmed|regex:/^(?=\S*[a-z])(?=\S*[A-Z])(?=\S*[\d])\S*$/',
      ]);
  }
//USER::CREATE
  public function userCreate(array $data)
  {
      return User::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
  }
//ADMIN::CREATE
  public function adminCreate(array $data)
  {
      return Admin::create([
          'name' => $data['name'],
          'email' => $data['email'],
          'password' => bcrypt($data['password']),
      ]);
  }
  //----------------------------------------------------------------------------

//-----------------------ADMIN EDIT/UPDATE--------------------------------------
//ADMIN EDIT
public function edit($id)
{
    $admin = Admin::find($id);
    //dd($id);
    return view('admin.profile', compact("admin"));
}

public function update()
{
  $form_data = Input::all();


  $user = Admin::find($form_data['id']);
  $user->name = $form_data['name'];
  $user->email = $form_data['email'];
  $user->save();
  //dd($user);
  //$user->update($request->all());
   //dd($user);
  return redirect('/admin');
}
  //----------------------------------------------------------------------------
  //-----------------------USER EDIT/UPDATE/DESTROY------------------------------
  public function editUser($id){
      $user = User::find($id);
      //dd($id);
      return view('admin.editUser', compact("user"));
  }

  public function updateUser()
  {
    $form_data = Input::all();


    $user = User::find($form_data['id']);
    $user->name = $form_data['name'];
    $user->email = $form_data['email'];
    $user->certification = $form_data['certification'];
    $user->save();
    //dd($user);
    //$user->update($request->all());
     //dd($user);
    return redirect('/admin/usersview');
  }
  public function deleteUser($id){
	  $user = User::find($id);
    //dd($user);
	if($user != null){
		$user->delete();
	}
	return redirect('/admin/usersview');
}
  //----------------------------------------------------------------------------
//SHOW USERS
  public function showUsers(){
    $users = User::get();
    return view('admin.users')->with('users', $users);
  }
  //----------------------------------------------------------------------------

  //SHOW USERSCORES
  public function showUserScores($id){
	$scores = Completed::where('User_id', '=', $id)
				->get();
	return view('admin.userScores')->with('scores', $scores);
  }
    //----------------------------------------------------------------------------
}
