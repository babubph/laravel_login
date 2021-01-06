<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App_setting;
use App\Models\User_log;


class AdminController extends Controller
{
  // User Profile show ---->
  public function getUsersProfile()
  {
    $data['app']= App_setting::find(1);
    return view('admin.users.user_profile',$data);
  }

  // App Settings Form show ---->
  public function AppSettingsForm()
  {
    $data['app']= App_setting::find(1);
    return view('admin.app_settings_form',$data);
  }

  // Update App Settings Data ---->
  public function UpdateAppSettings(Request $request)
  {

    try {
      $user = App_setting:: find(1);
      $user->update([
        'app_title' => trim($request->input('name')),
        'email' => strtolower(trim($request->input('email'))),
        'contact' => $request->input('contact'),
        'address' => $request->input('address'),
        'meta_dis' => $request->input('meta_dis'),
        'meta_keyword' => $request->input('meta_keyword'),
      ]);

      $imageName = 'app_logo.png';
      if(!empty($request->logo_image)){
      $request->logo_image->move(public_path('images'), $imageName);
      }

      $this->setSuccessMsg('Apps Data Updated');
      return redirect()->route('app-settings');
    } catch(Exception $e){
      $this->setErrorMsg($e->getMessage());
      return redirect()->back();
    }
  }

  // Get All User Logs ---->
  public function getUsersLog()
  {
    $data['log'] = User_log::with(['user'])->latest()
    ->paginate(5);
    //dd($data);
    //$data['log']= User_log::select('id', 'user_id', 'user_ip', 'browser', 'device_name', 'os', 'created_at')->orderBy('created_at', 'DESC')->paginate(8);
    $data['app']= App_setting::find(1);
    return view('admin.users.user_logs',$data);
  }


}
