<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
      return view('admin.users.all_users');
    }
}
