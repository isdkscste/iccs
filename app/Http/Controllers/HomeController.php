<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Auth;
use Illuminate\Support\Facades\Input;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('auth.login');
    }
   
    public function changePassword(Request $request)
    {

       if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {

        return redirect('/scientist/Application')->with('message', 'Current password does not match..!');

    }
    $validator = Validator::make($request->all(), ['old_password' => 'required',
        'new_password' => 'required|string|min:4']);
    $msg='';
    if ($validator->fails())
    {
      $errors=$validator->errors();
      foreach ($errors->get('new_password') as $message) 
      {
        $msg.=$message;

    }
    foreach ($errors->get('old_password') as $message) 
    {
        $msg.=$message;

    }

    return redirect('/scientist/Application')->with('error', $msg);
}


$user = Auth::user();
$user->password = Hash::make($request->get('new_password'));
$user->save();
if($user)
{
    return redirect('/scientist/Application')->with('success', "Password changed successfully..!");

}
else
{
    return redirect('/scientist/Application')->with('error', "Error. Please try again..!");

}
}

public function changePassword1(Request $request)
    {

       if (!(Hash::check($request->get('old_password'), Auth::user()->password))) 
       {


        return redirect('/admin/Admin-Dashboard')->with('message', 'Current password does not match..!');

        }
    $validator = Validator::make($request->all(), ['old_password' => 'required',
        'new_password' => 'required|string|min:4']);
    $msg='';
    if ($validator->fails())
    {
      $errors=$validator->errors();
      foreach ($errors->get('new_password') as $message) 
      {
        $msg.=$message;

    }
    foreach ($errors->get('old_password') as $message) 
    {
        $msg.=$message;

    }

    return redirect('/admin/Admin-Dashboard')->with('error', $msg);
 }


$user = Auth::user();
$user->password = Hash::make($request->get('new_password'));
$user->save();
if($user)
{
    return redirect('/admin/Admin-Dashboard')->with('success', "Password changed successfully..!");

}
else
{
    return redirect('/admin/Admin-Dashboard')->with('error', "Error. Please try again..!");

}
}
}
