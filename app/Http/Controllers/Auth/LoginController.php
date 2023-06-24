<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/scientist/Application';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function validateLogin(Request $request)
    {
        request()->validate([
     

        'email' => 'required|email',

        'password' => 'required|min:4',

        'captcha' => 'required|captcha'

    ],

    ['captcha.captcha'=>'Invalid captcha.']);

 }

 protected function authenticated(Request $request, $user)
    {
        if ( $user['usertype']==2 ) 
        {
            //admin pages 20-11-2020


            return redirect('/admin/Admin-Dashboard');
            //admin pages 20-11-2020
        }
        
        return redirect('/scientist/Application');
    }


 public function refreshCaptcha()

 {

    return response()->json(['captcha'=> captcha_img()]);

}

}
