<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use DB;
use Session;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;
 public function resetpassword(Request $request)
    {

     $email=$request->email;
     $mobile=$request->mobile;

     DB::beginTransaction();
     $user = DB::table('users')->where('email', '=', $request->email)->where('mobile', '=', $request->mobile)
     ->get();

    //Check if the user exists
     if (count($user) < 1) {
        return redirect()->back()->with('message',"User does not exists.!");
    }
    else
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



      $data = [
          "password" => $newpassword
      ];

      $update = DB::table('users')->where('email', '=', $email)
      ->where('mobile', '=', $mobile)->update($data);
      if($update)
      {
        DB::commit();
       // echo $hashed_random_password;
        $sms=$this->send_sms1($mobile,'Dear '.$user[0]->name.', Password to login to Recruitment Portal  is '.$hashed_random_password.' user name is your registered email id, KSCSTE Recruitment Portal.');
        Session::put('message',"Your password has been reset. OTP is sent to the registered moibile No." );
        return redirect()->back();
        
    }

    else
    {
       DB::rollback();
       return redirect()->back()->with('errors',"Error. Please try again.!");
       
   }

}
}
function send_sms1($mobile_no,$content)
{
    $api_path = "http://api.esms.kerala.gov.in/webservice/falertservicerevised.php?wsdl";
    $client = new \nusoap_client($api_path, true);     
    $param = array('username'=>"kscste", 'senderid'=>"KSCSTE", 'password'=>"kscste1234", 'message'=>$content, 'number'=>$mobile_no);

    $result = $client->call('SendSMS', $param, '', '', false, true);
    return $result;
}
}
