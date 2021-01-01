<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function Dashboard()
    {
      return view('admin.dashboard');
    }

    public function NewUsers_form()
    {
      return view('admin.users.new_users');
    }

    public function getUsers()
    {
      //$data['user']= User::all();
      //$data['user']= User::select('id', 'name', 'email', 'contact', 'status')->where('status',1)->orderBy('id', 'DESC')->take(10)->get();
      $data['user']= User::select('id', 'name', 'email', 'contact', 'status')->get();
      return view('admin.users.all_users', $data);
    }

    public function DeleteUser($id)
    {
      $user = User::find($id);
      $user->delete();

      $this->setSuccessMsg('User Delete Successfully');
      return redirect()->route('all-users');
    }
}
