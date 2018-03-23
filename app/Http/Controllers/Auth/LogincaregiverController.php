<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User_caregiver;
use Auth;

class LogincaregiverController extends Controller
{
  public function __construct()
  {
    $this->middleware('guest:caregiver',['except'=>['logout']]);
  }

  public function showLoginForm()
     {
       return view('auth.logincare');
     }

     public function login(Request $request)
     {
       // Validate the form data
       $this->validate($request, [
         'email'   => 'required|email',
         'password' => 'required|min:6'
       ]);
//dd(bcrypt($request->password));
       // Attempt to log the user in
       if (Auth::guard('caregiver')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
         // if successful, then redirect to their intended location
         return redirect()->intended(route('caregiver.dashboard'));
       }

       // if unsuccessful, then redirect back to the login with the form data
       return redirect()->back()->withInput($request->only('email', 'remember'));
     }

     public function logout()
     {
         Auth::guard('caregiver')->logout();
         return redirect('/authcare/login');
     }
 }
