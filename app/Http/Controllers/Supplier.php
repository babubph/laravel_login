<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\App_setting;
use App\Models\Suppliers;

class Supplier extends Controller
{
  // New Supplier Form show ---->
  public function newSupplierForm()
  {
    $data['app']= App_setting::find(1);
    return view('admin.supplier.new_supplier',$data);
  }

  // Create A new User ---->
  public function InsertSupplier(Request $request){
    $this->validate($request, [
      'email' => 'email|unique:suppliers,email',
      'contact' => 'required|max:13|min:6|unique:suppliers,contact',
    ]);
    $data=[
      'company_name' => trim($request->input('company_name')),
      'company_type' => trim($request->input('company_type')),
      'name' => trim($request->input('name')),
      'email' => strtolower(trim($request->input('email'))),
      'contact' => $request->input('contact'),
      'address' => $request->input('address'),
      'status' => 1,
    ];
    try {
      Suppliers:: create($data);
      $this->setSuccessMsg('New Supplier Created');
      return redirect()->route('new-supplier');
    } catch(Exception $e){
      $this->setErrorMsg($e->getMessage());
      return redirect()->back();
    }
  }

  // get All Suppliers Data ---->
  public function getAllSuppliers()
  {
    //$data['user']= User::all();
    //$data['user']= User::select('id', 'name', 'email', 'contact', 'status')->where('status',1)->orderBy('id', 'DESC')->take(10)->get();
    $data['supplier']= Suppliers::all();
    $data['app']= App_setting::find(1);
    return view('admin.supplier.all_supplier', $data);
  }

}
