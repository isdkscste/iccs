<?php 
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use LaravelCaptcha\Facades\Captcha;
//use Illuminate\Support\Facades\Request;
use DataTables;
use App\Helpers\Assessment;
use DB;
use Mail;
use Config;
use URL;
use GuzzleHttp\Client;
use App\Http\Requests;
use Storage;
use Illuminate\Session\TokenMismatchException;


class AdminController extends Controller
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

   
    public function applicationsView(Request $request)
    {
      $userid=\Auth::user()->id;
     
      if ($request->ajax())
      {

        $details=DB::table('application_form')
        ->where('application_form.submit',1)
       //->leftjoin('users','application_form.user_id','users.id')
       //->where('users.usertype',1)
        ->orderby('id','asc')

        ->select('id','user_id','ref_no','post_code','name','category','email','mobile','dob','ug_course','ug_subject','pg_course','pg_subject')
        ->get();
        
      
            return datatables()->of($details)
            ->make(true);
       
      }
      if($userid)
      {
        $Application_count=DB::table('application_form')->get()->count();
        $submit_count=DB::table('application_form')->where('application_form.submit',1)->get()->count();
        $registration_count=DB::table('users')->get()->count();
        return view('admin.admin_dashboard',compact('Application_count','submit_count','registration_count'));

      }
      else
      {
        return redirect('/');
      }
    }
    public function getDetails(Request $request,$id)
    {
 
      return view('admin.view_scientist',compact('id'));
    }

  public function applicationView(Request $request,$id)
    {

     // dd($id);
      //$id=\Auth::user()->id;
     if ($request->ajax())
     {
      $data=[];
      $data=DB::table('application_form')->where('id',$id)->get();
     
      if(count($data)>0)
      {
        return $data;

      }
    }
    return view('admin.view_scientist');

  }
}