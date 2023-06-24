<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use DB;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           
            'mobile' => ['required', 'numeric', 'digits:10', 'unique:users'],
            'captcha' => 'required|captcha'],
        ['captcha.captcha'=>'Invalid captcha.']
    );
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $str = "";
     $length=4;
     $characters = range('1','9');
     $max = count($characters) - 1;
     for ($i = 0; $i < $length; $i++) {
      $rand = mt_rand(0, $max);
      $str .= $characters[$rand];
  }
  $hashed_random_password = $str;
  
  $newpassword=Hash::make($hashed_random_password);

  $sms=$this->send_sms1($data['mobile'],'Dear '.$data['name'].', Password to login to Recruitment Portal  is '.$hashed_random_password.' user name is your registered email id, KSCSTE Recruitment Portal.');
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $newpassword,
            'mobile' => $data['mobile']
        ]);
    }
   public function register(Request $request)
 {
 $this->validator($request->all())->validate();
 
 event(new Registered($user = $this->create($request->all())));
 Session::put('message', 'Registered successfully, please login...! Password has been sent to your registered mobile number!');
 return redirect($this->redirectTo);
 //return redirect($this->redirectTo)->with('message', 'Registered successfully, please login...! Password has been sent to your registered mobile number.');
 }

public function send_sms1($mobile_no,$content)
{
  $api_path = "http://api.esms.kerala.gov.in/webservice/falertservicerevised.php?wsdl";
  $client = new \nusoap_client($api_path, true);     
  $param = array('username'=>"kscste", 'senderid'=>"KSCSTE", 'password'=>"kscste1234", 'message'=>$content, 'number'=>$mobile_no);

  $result = $client->call('SendSMS', $param, '', '', false, true);
  return $result;
}
}
