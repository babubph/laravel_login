<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AuthController extends Controller
{
  public function LoginForm(){
    return view('admin.login.login');
  }

  public function UsersForm(){
    return view('admin.login.user_form');
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
        'email' => strtolower($request->input('email')),
        'contact' => $request->input('contact'),
        'password' => bcrypt($request->input('password')),
      ];
      try {
        User:: create($data);
        $this->setSuccessMsg('User Account Created');
        return redirect()->route('login');
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
      if(auth()->attempt($cradentials)){
        //return redirect()->route('home');
        echo "OK";
      }else{
        $this->setErrorMsg('Invalid Users');
        return redirect()->back();
      }


    }
  }
