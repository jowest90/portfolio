<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{

  public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
    }

  public function showLoginForm(){
    return view('auth.adminLogin');
  }

  public function login(Request $request){
    //validate credentials
    $this->validate($request, ['email' => 'required|email',
                              'password' => 'required|min:6']);

    //attempt Admin login
    if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // redirect to default location
        return redirect()->intended(route('admin.dashboard'));
      }


    //redirect to login w/ form data
    return redirect()->back()->withInput($request->only('email', 'remember'));
  }

  public function logout()
  {
      Auth::guard('admin')->logout();
      return redirect('/admin');
  }
}
