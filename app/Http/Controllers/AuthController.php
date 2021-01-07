<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Helpers\UserSystemInfoHelper;
use App\Models\User;
use App\Models\User_log;
use App\Models\App_setting;

class AuthController extends Controller
{

  // Show Login Form ---->
  public function LoginForm(){
    $data['app']= App_setting::find(1);
    return view('admin.login.login',$data);
  }

  // Forget Password form ---->
  public function ForgetPassword(){
    $data['app']= App_setting::find(1);
    return view('admin.login.forget_password',$data);
  }

  // Create A new User ---->
  public function InsertUser(Request $request){
    $this->validate($request, [
      'name' => 'required',
      'email' => 'required|email|unique:users,email',
      'contact' => 'required|max:13|min:6|unique:users,contact',
      'password' => 'min:6|required_with:confirm_password|same:confirm_password',
      'confirm_password' => 'min:6'
    ]);

      $data=[
        'name' => trim($request->input('name')),
        'email' => strtolower(trim($request->input('email'))),
        'contact' => $request->input('contact'),
        'user_type' => $request->input('user_type'),
        'password' => bcrypt($request->input('password')),
        'status' => $request->input('status') == 1 ? '1' : '0',
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

    // Attempt Login Process ---->
    public function LoginProccess(Request $request){
      $this->validate($request, [
        'email' => 'required|email',
        'password' => 'required|min:6',
      ]);

      //$cradentials = $request->except(['_token']);
      //$cradentials = $request->only('email', 'password');
      if (Auth::attempt([
          'email'    => $request->email,
          'password' => $request->password,
          'status'   => 1,
        ])) {
          // Find User ID via user email
          $email=$request->email;
          $user=User::query()->where('email', 'LIKE', "%{$email}%")->get();

          // get Browser Data
          $data=[
            'user_id'     => $user[0]->id,
            'user_ip'     => UserSystemInfoHelper::get_ip(),
            'browser'     => UserSystemInfoHelper::get_browsers(),
            'device_name' => UserSystemInfoHelper::get_device(),
            'os'          => UserSystemInfoHelper::get_os(),
          ];
          User_log:: create($data);

          return redirect()->route('dashboard');
      }else{
        $this->setErrorMsg('Invalid users | Access Denied');
        return redirect()->route('login');
      }
    }

    // User Logout ---->
    public function LogOut()
    {
      auth()->logout();
      $this->setSuccessMsg('Logout Successfully');
      return redirect()->route('login');
    }

    // Dashboard ---->
    public function Dashboard()
    {
      $data['app']= App_setting::find(1);
      return view('admin.dashboard',$data);
    }

    // New User Form ---->
    public function NewUsers_form()
    {
      $data['app']= App_setting::find(1);
      return view('admin.users.new_users',$data);
    }

    // get All user Data ---->
    public function getUsers()
    {
      //$data['user']= User::all();
      //$data['user']= User::select('id', 'name', 'email', 'contact', 'status')->where('status',1)->orderBy('id', 'DESC')->take(10)->get();
      $data['user']= User::select('id', 'name', 'email', 'contact', 'status', 'user_type')->get();
      $data['app']= App_setting::find(1);
      return view('admin.users.all_users', $data);
    }

    // Delete User ---->
    public function DeleteUser($id)
    {
      $user = User::find($id);
      $user->delete();

      $this->setSuccessMsg('User Delete Successfully');
      return redirect()->route('all-users');
    }

    // User Edit Form show ---->
    public function EditUser($id)
    {
      $data['user']= User::find($id);
      $data['app']= App_setting::find(1);
      return view('admin.users.edit_users',$data);
    }

    // Update user Data ---->
    public function UpdateUser($id, Request $request)
    {
      try {
        $user = User:: find($id);
        $user->update([
          'name' => trim($request->input('name')),
          'email' => strtolower(trim($request->input('email'))),
          'contact' => $request->input('contact'),
          'user_type' => $request->input('user_type'),
        ]);

        $this->setSuccessMsg('User Account Updated');
        return redirect()->route('edit-user',$id);
      } catch(Exception $e){
        $this->setErrorMsg($e->getMessage());
        return redirect()->back();
      }

    }

    //User Active ---->
    public function UserActive($id, Request $request)
    {
      $user = User:: find($id);
      $user->update([
        'status' => 1,
      ]);
      return redirect()->route('all-users');
    }

   //User Inactive ---->
    public function UserInActive($id, Request $request)
    {
      $user = User:: find($id);
      $user->update([
        'status' => 0,
      ]);
      return redirect()->route('all-users');
    }

    // Passwor Change Form ---->
    public function PasswordChange($id)
    {
      $data['app']= App_setting::find(1);
      $data['user'] = User:: find($id);
      return view('admin.users.password_change',$data);
    }

    // Update Password ---->
    public function UpdatePassword($id, Request $request)
    {
      $this->validate($request, [
        'password' => 'min:6|required_with:confirm_password|same:confirm_password',
        'confirm_password' => 'min:6'
      ]);

      try {
        $user = User:: find($id);
        $user->update([
          'password' => bcrypt($request->input('password')),
        ]);
        $this->setSuccessMsg('Password Updated');
        return redirect()->route('password-change',$id);
      } catch(Exception $e){
        $this->setErrorMsg($e->getMessage());
        return redirect()->back();
      }

    }

  }
