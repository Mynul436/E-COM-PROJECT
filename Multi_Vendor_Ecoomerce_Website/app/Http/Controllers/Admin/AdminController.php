<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{
    //

    public function dashboard()
    {
        return view('admin.dashboard');
    }
     public function login(Request $request){
if($request->isMethod('post')){
     $data=$request->all();

     $rules=[
        'email' => 'required|email|max:255',
        'password' => 'required'];

$customMessage=[
    'email.required'=>'Email Address is required',
    'email.email'=>'Valid Email is required',
    'password.required'=>'Password is required',    
];
$this->validate($request,$rules,$customMessage);



if(Auth::guard('admin')->attempt(['email'=>$data['email'],'password'=>$data['password']])){
    return redirect('admin/dashboard');
    }
    else{
        return redirect('/admin/login')->with('message_error',
        'Invalid Username or Password');
    }
     }
       return view('admin.login');
     }


public function logout(){
    Auth::guard('admin')->logout();
    return redirect('/admin/login');

}



}
