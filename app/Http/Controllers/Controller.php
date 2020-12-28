<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function setSuccessMsg($msg){
      session()->flash('massage', $msg);
      session()->flash('msg_type', 'success');
      session()->flash('text_color', 'green');
    }

    public function setErrorMsg($msg){
      session()->flash('massage', $msg);
      session()->flash('msg_type', 'danger');
      session()->flash('text_color', 'red');
    }
}
