<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
  public function LoginForm(){
    return view('admin.login.login');
  }

  
  public function ForgetPassword(){
    return view('admin.login.forget_password');
  }

  public function InsertUser(Request $request){
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'contact' => 'required|max:13|min:6|unique:users,contact',
      'password' => 'required|min:6',
    ]);

      $data=[
        'name' => $request->input('name'),
        'email' => strtolower(trim($request->input('email'))),
        'contact' => $request->input('contact'),
        'password' => bcrypt($request->input('password')),
        'status' => 1,
      ];
      try {
        User:: create($data);
        $this->setSuccessMsg('User Account Created');
        return redirect()->route('new-users');
      } catch(Exception $e){
        $this->setErrorMsg($e->getMessage());
        return redirect()->back();
      }
    }

    public function LoginProccess(Request $request){
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6',
      ]);

      $cradentials = $request->except(['_token']);
      //$cradentials = $request->only('email', 'password');
      if(auth()->attempt($cradentials)){
        return redirect()->route('dashboard');
      }else{
        $this->setErrorMsg('Invalid users | Access Denied');
        return redirect()->route('login');
      }
    }

    public function LogOut()
    {
      auth()->logout();
      $this->setSuccessMsg('Logout Successfully');
      return redirect()->route('login');
    }
  }
