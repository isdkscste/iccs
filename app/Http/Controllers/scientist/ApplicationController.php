<?php

namespace App\Http\Controllers\scientist;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use LaravelCaptcha\Facades\Captcha;
//use Illuminate\Support\Facades\Request;
use App\Helpers\Assessment;
use DB;
use Mail;
use Config;
use URL;
use GuzzleHttp\Client;
use App\Http\Requests;
use Storage;
use Illuminate\Session\TokenMismatchException;


class ApplicationController extends Controller
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

    public function applicationView(Request $request)
    {
      $userid=\Auth::user()->id;
      $data=[];
      $cd="";
      $data=DB::table('application_form')->where('user_id',$userid)->orderBy('updated_at', 'desc')->get();
    // dd($data);
     if(count($data)>0)
        {

          $cd=$data[0]->post_code;

        }
      
      if ($request->ajax())
      {


       // dd($data[0]->post_code);
        if(count($data)>0)
        {

          return $data;

        }
      }
      return view('scientist.application',compact('cd'));

    }



    public function applicationView1(Request $request)
    {
      $userid=\Auth::user()->id;
      $cd=$request->post_code;
      if ($request->ajax())
      {

        $data=[];
        $data=DB::table('application_form')->where('user_id',$userid)->where('post_code',$request->post_code)->get();


        return $data;

      }

      return view('scientist.application',compact('cd'));


    }
    public function applicationSubmit(Request $request)
    {


    //dd($request->all());
      $userid=\Auth::user()->id;
      $pc=$request->post_code_hidden;
     
  //start generating reff_no
  $html = $pc;
$needle = "/";
$lastPos = 0;
$positions = array();

while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
    $positions[] = $lastPos;
    $lastPos = $lastPos + strlen($needle);
}

$sub = substr($pc, $positions[0], $positions[1]);
$ref_sub=str_replace('/', '', $sub);
//trim($sub,"/");
//End generating reff_no
      $userdata=DB::table('users')->where('id',$userid)->first();
      $infodata1='';
      $infodata2='';
      $infodata3='';
      $infodata4='';
      $infodata5='';
      $infodata6='';
      $infodata7='';
      $infodata8='';
      $infodata9='';
      $infodata10='';
      $infodata11='';
      $infodata12='';
      $infodata13='';
      $infodata14='';
      $infodata15='';
      $infodata16='';
      $infodata17='';
      $infodata18='';
      $infodata19='';
      $infodata20='';
      $infodata21='';
      $infodata22='';
      $infodata23='';
      $msg='';
      $datas=[];
      $reff_no="ICCS100".$ref_sub.$userid;
      $reff_path='/public/uploads/iccs/'.$reff_no;
      $prv=DB::table('application_form')->where('user_id',$userid)->where('post_code',$pc)->get();
      $f1=0;
      $f2=0;
      $f3=0;
      $f4=0;
      $f5=0;
      $f6=0;
      $f7=0;
      $f8=0;
      $f9=0;
      $f10=0;
      $f11=0;
      $f12=0;
      $f13=0;
      $f14=0;
      $f15=0;
      $f16=0;
      $f17=0;
      $f18=0;
      $f19=0;
      $f20=0;
      $f21=0;
      $f22=0;
      $f23=0;
      $success1=1;
      $success2=1;
      $success3=1;
      $success4=1;
      $success5=1;
      $success6=1;
      $success7=1;
      $success8=1;
      $success9=1;
      $success10=1;
      $success11=1;
      $success12=1;
      $success13=1;
      $success14=1;

      $success15=1;
      $success16=1;
      $success17=1;
      $success18=1;
      $success19=1;
      $success20=1;
      $success21=1;
      $success22=1;

      $success23=1;
      $post_code123=str_replace('/', '_', $request->post_code_hidden);
      if($request->hasFile('casteprooffile'))
      {
        $f1=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->category_file!=NULL)
        {
          $infodata1=$prv[0]->category_file;
          $f1=2;
        }

      }

      if($request->hasFile('idprooffile'))
      {
        $f2=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->id_proof_file!=NULL)
        {
          $infodata2=$prv[0]->id_proof_file;
          $f2=2;
        }

      }
      if($request->hasFile('photo'))
      {
        $f3=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->photo!=NULL)
        {
          $infodata3=$prv[0]->photo;
          $f3=2;
        }

      }
      if($request->hasFile('signature'))
      {
        $f4=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->sign!=NULL)
        {
          $infodata4=$prv[0]->sign;
          $f4=2;
        }

      }
      if($request->hasFile('ug_certificate'))
      {
        $f16=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->ug_file1!=NULL)
        {
          $infodata16=$prv[0]->ug_file1;
          $f16=2;
        }

      }
      if($request->hasFile('ug_marklist'))
      {
        $f17=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->ug_file2!=NULL)
        {
          $infodata17=$prv[0]->ug_file2;
          $f17=2;
        }

      }
      if($request->hasFile('pg_certificate'))
      {
        $f5=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->pg_file1!=NULL)
        {
          $infodata5=$prv[0]->pg_file1;
          $f5=2;
        }

      }
      if($request->hasFile('pg_marklist'))
      {
        $f6=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->pg_file2!=NULL)
        {
          $infodata6=$prv[0]->pg_file2;
          $f6=2;
        }

      }
      if($request->hasFile('phd_certificate'))
      {
        $f7=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->phd_file!=NULL)
        {
          $infodata7=$prv[0]->phd_file;
          $f7=2;
        }

      }
      if($request->hasFile('phd_summary'))
      {
        $f18=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->phd_summary!=NULL)
        {
          $infodata18=$prv[0]->phd_summary;
          $f18=2;
        }

      }
      if($request->hasFile('pub_upload'))
      {
        $f8=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->paper_list!=NULL)
        {
          $infodata8=$prv[0]->paper_list;
          $f8=2;
        }

      }
      if($request->hasFile('exp_upload1'))
      {
        $f9=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->exp_file1!=NULL)
        {
          $infodata9=$prv[0]->exp_file1;
          $f9=2;
        }

      }
      if($request->hasFile('exp_upload2'))
      {
        $f10=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->exp_file2!=NULL)
        {
          $infodata10=$prv[0]->exp_file2;
          $f10=2;
        }

      }
      if($request->hasFile('exp_upload3'))
      {
        $f11=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->exp_file3!=NULL)
        {
          $infodata11=$prv[0]->exp_file3;
          $f11=2;
        }

      }
      if($request->hasFile('exp_upload4'))
      {
        $f19=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->exp_file4!=NULL)
        {
          $infodata19=$prv[0]->exp_file4;
          $f19=2;
        }

      }
      if($request->hasFile('exp_upload5'))
      {
        $f20=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->exp_file5!=NULL)
        {
          $infodata20=$prv[0]->exp_file5;
          $f20=2;
        }

      }
      if($request->hasFile('awards_file'))
      {
        $f21=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->awards_file!=NULL)
        {
          $infodata21=$prv[0]->awards_file;
          $f21=2;
        }

      }
      if($request->hasFile('pi_copi_file'))
      {
        $f22=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->pi_copi_file!=NULL)
        {
          $infodata22=$prv[0]->pi_copi_file;
          $f22=2;
        }

      }
      if($request->hasFile('conferences_file'))
      {
        $f23=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->conferences_file!=NULL)
        {
          $infodata23=$prv[0]->conferences_file;
          $f23=2;
        }

      }

      if($request->hasFile('post_exp_upload1'))
      {
        $f12=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->phd_exp_file1!=NULL)
        {
          $infodata12=$prv[0]->phd_exp_file1;
          $f12=2;
        }

      }
      if($request->hasFile('post_exp_upload2'))
      {
        $f13=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->phd_exp_file2!=NULL)
        {
          $infodata13=$prv[0]->phd_exp_file2;
          $f13=2;
        }

      }
      if($request->hasFile('post_exp_upload3'))
      {
        $f14=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->phd_exp_file3!=NULL)
        {
          $infodata14=$prv[0]->phd_exp_file3;
          $f14=2;
        }

      }
      if($request->hasFile('noc'))
      {
        $f15=1;
      }
      else if (count($prv)>0)
      {
        if($prv[0]->noc!=NULL)
        {
          $infodata15=$prv[0]->noc;
          $f15=2;
        }

      }
      if ($f1==1 )
      {
        $rule = ['casteprooffile' => 'required|mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();
        foreach ($errors->get('casteprooffile') as $message) 
        {
          $msg.=$message;

        }

        $success1=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {

        $file1 =$request->file('casteprooffile');
        $filename1="Caste".'_'.$reff_no;
        $extension1 = $file1->getClientOriginalExtension();
        $newfilename1=$filename1.'.'.$extension1;
        $newfilename1 = preg_replace('/\s+/', '', $newfilename1);
        if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path1 =$reff_path.'/'.$newfilename1;
      $documentmoved1=Storage::put($path1,file_get_contents($file1->getRealPath()));
    }
      else
      {
    
      $path1 =$reff_path.'/'.$newfilename1;

      $documentmoved1=Storage::put($path1,file_get_contents($file1->getRealPath()));
    }

        if($documentmoved1)
        {

          $infodata1= $newfilename1;
        }


      }
    }

    if ( $f2==1)
    {

      $rule = [
        'idprooffile'=>'required|mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('idprooffile') as $message) 
        {
          $msg.=$message;

        }
        $success2=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file2 =$request->file('idprooffile');
        $filename2="Idproof".'_'.$reff_no;
        $extension2 = $file2->getClientOriginalExtension();
        $newfilename2=$filename2.'.'.$extension2;
        $newfilename2 = preg_replace('/\s+/', '', $newfilename2);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path2 =$reff_path.'/'.$newfilename2;
       $documentmoved2=Storage::put($path2,file_get_contents($file2->getRealPath()));
      }
       else
       {
      
       $path2 =$reff_path.'/'.$newfilename2;
      
       $documentmoved2=Storage::put($path2,file_get_contents($file2->getRealPath()));
      }
        if($documentmoved2)
        {
// dd($documentmoved2);
          $infodata2= $newfilename2;
        }
      }
    }
    if ( $f3==1)
    {

      $rule = [
        'photo'=>'required|mimes:jpeg,jpg|max:30|dimensions:min_width=150,min_height=200'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('photo') as $message) 
        {
          $msg.=$message;

        }
        $success3=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file3 =$request->file('photo');
        $filename3="Photo".'_'.$reff_no;
        $extension3 = $file3->getClientOriginalExtension();
        $newfilename3=$filename3.'.'.$extension3;
        $newfilename3 = preg_replace('/\s+/', '', $newfilename3);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path3 =$reff_path.'/'.$newfilename3;
       $documentmoved3=Storage::put($path3,file_get_contents($file3->getRealPath()));
     }
       else
       {
     
       $path3 =$reff_path.'/'.$newfilename3;
 
       $documentmoved3=Storage::put($path3,file_get_contents($file3->getRealPath()));
     }
 

        if($documentmoved3)
        {
// dd($documentmoved2);
          $infodata3= $newfilename3;
        }
      }
    }

    if ( $f4==1)
    {

      $rule = [
        'signature'=>'required|mimes:jpeg,jpg|max:300|dimensions:min_width=150,min_height=100'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('signature') as $message) 
        {
          $msg.=$message;

        }
        $success4=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file4 =$request->file('signature');
        $filename4="Sign".'_'.$reff_no;
        $extension4 = $file4->getClientOriginalExtension();
        $newfilename4=$filename4.'.'.$extension4;
        $newfilename4 = preg_replace('/\s+/', '', $newfilename4);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path4 =$reff_path.'/'.$newfilename4;
       $documentmoved4=Storage::put($path4,file_get_contents($file4->getRealPath()));
      }
       else
       {
      
       $path4 =$reff_path.'/'.$newfilename4;
      
       $documentmoved4=Storage::put($path4,file_get_contents($file4->getRealPath()));
      }

        if($documentmoved4)
        {
// dd($documentmoved2);
          $infodata4= $newfilename4;
        }
      }
    }
    if ( $f5==1)
    {

      $rule = [
        'pg_certificate'=>'required|mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('pg_certificate') as $message) 
        {
          $msg.=$message;

        }
        $success5=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file5 =$request->file('pg_certificate');
        $filename5="Pg_certificate".'_'.$reff_no;
        $extension5 = $file5->getClientOriginalExtension();
        $newfilename5=$filename5.'.'.$extension5;
        $newfilename5= preg_replace('/\s+/', '', $newfilename5);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path5 =$reff_path.'/'.$newfilename5;
       $documentmoved5=Storage::put($path5,file_get_contents($file5->getRealPath()));
     }
       else
       {
     
       $path5 =$reff_path.'/'.$newfilename5;
 
       $documentmoved5=Storage::put($path5,file_get_contents($file5->getRealPath()));
     }
 

        if($documentmoved5)
        {
// dd($documentmoved2);
          $infodata5= $newfilename5;
        }
      }
    }
    if ( $f6==1)
    {

      $rule = [
        'pg_marklist'=>'required|mimes:pdf|max:1000'
      ];

      $validator =Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('pg_marklist') as $message) 
        {
          $msg.=$message;

        }
        $success6=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file6 =$request->file('pg_marklist');
        $filename6="Pg_marklist".'_'.$reff_no;
        $extension6= $file6->getClientOriginalExtension();
        $newfilename6=$filename6.'.'.$extension6;
        $newfilename6= preg_replace('/\s+/', '', $newfilename6);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path6 =$reff_path.'/'.$newfilename6;
       $documentmoved6=Storage::put($path6,file_get_contents($file6->getRealPath()));
     }
       else
       {
     
       $path6 =$reff_path.'/'.$newfilename6;
 
       $documentmoved6=Storage::put($path6,file_get_contents($file6->getRealPath()));
     }

        if($documentmoved6)
        {
// dd($documentmoved2);
          $infodata6= $newfilename6;
        }
      }
    }
    if ( $f7==1)
    {

      $rule = [
        'phd_certificate'=>'mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('phd_certificate') as $message) 
        {
          $msg.=$message;

        }
        $success7=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file7 =$request->file('phd_certificate');
        $filename7="Phd_certificate".'_'.$reff_no;
        $extension7= $file7->getClientOriginalExtension();
        $newfilename7=$filename7.'.'.$extension7;
        $newfilename7=  preg_replace('/\s+/', '', $newfilename7);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path7 =$reff_path.'/'.$newfilename7;
       $documentmoved7=Storage::put($path7,file_get_contents($file7->getRealPath()));
      }
       else
       {
      
       $path7 =$reff_path.'/'.$newfilename7;
      
       $documentmoved7=Storage::put($path7,file_get_contents($file7->getRealPath()));
      }

        if($documentmoved7)
        {
// dd($documentmoved2);
          $infodata7= $newfilename7;
        }
      }
    }


    if ( $f8==1)
    {

      $rule = [
        'pub_upload'=>'required|mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('pub_upload') as $message) 
        {
          $msg.=$message;

        }
        $success8=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file8 =$request->file('pub_upload');
        $filename8="publication_list".'_'.$reff_no;
        $extension8= $file8->getClientOriginalExtension();
        $newfilename8=$filename8.'.'.$extension8;
        $newfilename8=  preg_replace('/\s+/', '', $newfilename8);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path8 =$reff_path.'/'.$newfilename8;
       $documentmoved8=Storage::put($path8,file_get_contents($file8->getRealPath()));
     }
       else
       {
     
       $path8 =$reff_path.'/'.$newfilename8;
 
       $documentmoved8=Storage::put($path8,file_get_contents($file8->getRealPath()));
     }
 
        if($documentmoved8)
        {
// dd($documentmoved2);
          $infodata8= $newfilename8;
        }
      }
    }
    if ( $f9==1)
    {

      $rule = [
        'exp_upload1'=>'mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('exp_upload1') as $message) 
        {
          $msg.=$message;

        }
        $success9=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file9 =$request->file('exp_upload1');
        $filename9="Research_experience1".'_'.$reff_no;
        $extension9= $file9->getClientOriginalExtension();
        $newfilename9=$filename9.'.'.$extension9;
        $newfilename9=  preg_replace('/\s+/', '', $newfilename9);
        if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path9 =$reff_path.'/'.$newfilename9;
      $documentmoved9=Storage::put($path9,file_get_contents($file9->getRealPath()));
    }
      else
      {
    
      $path9 =$reff_path.'/'.$newfilename9;

      $documentmoved9=Storage::put($path9,file_get_contents($file9->getRealPath()));
    }

        if($documentmoved9)
        {
// dd($documentmoved2);
          $infodata9= $newfilename9;
        }
      }
    }

    if ( $f10==1)
    {

      $rule = [
        'exp_upload2'=>'mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);;
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('exp_upload2') as $message) 
        {
          $msg.=$message;

        }
        $success10=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file10 =$request->file('exp_upload2');
        $filename10="Research_experience2".'_'.$reff_no;
        $extension10= $file10->getClientOriginalExtension();
        $newfilename10=$filename10.'.'.$extension10;
        $newfilename10=  preg_replace('/\s+/', '', $newfilename10);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path10 =$reff_path.'/'.$newfilename10;
       $documentmoved10=Storage::put($path10,file_get_contents($file10->getRealPath()));
     }
       else
       {
     
       $path10 =$reff_path.'/'.$newfilename10;
 
       $documentmoved10=Storage::put($path10,file_get_contents($file10->getRealPath()));
     }

        if($documentmoved10)
        {
// dd($documentmoved2);
          $infodata10= $newfilename10;
        }
      }
    }
    if ( $f11==1)
    {

      $rule = [
        'exp_upload3'=>'mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('exp_upload3') as $message) 
        {
          $msg.=$message;

        }
        $success11=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file11 =$request->file('exp_upload3');
        $filename11="Research_experience3".'_'.$reff_no;
        $extension11= $file11->getClientOriginalExtension();
        $newfilename11=$filename11.'.'.$extension11;
        $newfilename11=  preg_replace('/\s+/', '', $newfilename11);
        if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path11 =$reff_path.'/'.$newfilename11;
      $documentmoved11=Storage::put($path11,file_get_contents($file11->getRealPath()));
    }
      else
      {
    
      $path11 =$reff_path.'/'.$newfilename11;

      $documentmoved11=Storage::put($path11,file_get_contents($file11->getRealPath()));
    }

        if($documentmoved11)
        {
// dd($documentmoved2);
          $infodata11= $newfilename11;
        }
      }
    }

    if ( $f12==1)
    {

      $rule = [
        'post_exp_upload1'=>'mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('post_exp_upload1') as $message) 
        {
          $msg.=$message;

        }
        $success12=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file12 =$request->file('post_exp_upload1');
        $filename12="Post_doctoral_experience1".'_'.$reff_no;
        $extension12= $file12->getClientOriginalExtension();
        $newfilename12=$filename12.'.'.$extension12;
        $newfilename12=  preg_replace('/\s+/', '', $newfilename12);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path12 =$reff_path.'/'.$newfilename12;
       $documentmoved12=Storage::put($path12,file_get_contents($file12->getRealPath()));
      }
       else
       {
      
       $path12 =$reff_path.'/'.$newfilename12;
      
       $documentmoved12=Storage::put($path12,file_get_contents($file12->getRealPath()));
      }
        if($documentmoved12)
        {
// dd($documentmoved2);
          $infodata12= $newfilename12;
        }
      }
    }
    if ( $f13==1)
    {

      $rule = [
        'post_exp_upload2'=>'mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('post_exp_upload2') as $message) 
        {
          $msg.=$message;

        }
        $success13=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file13 =$request->file('post_exp_upload2');
        $filename13="Post_doctoral_experience2".'_'.$reff_no;
        $extension13= $file13->getClientOriginalExtension();
        $newfilename13=$filename13.'.'.$extension13;
        $newfilename13=  preg_replace('/\s+/', '', $newfilename13);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path13 =$reff_path.'/'.$newfilename13;
       $documentmoved13=Storage::put($path13,file_get_contents($file13->getRealPath()));
     }
       else
       {
     
       $path13 =$reff_path.'/'.$newfilename13;
 
       $documentmoved13=Storage::put($path13,file_get_contents($file13->getRealPath()));
     }

        if($documentmoved13)
        {
// dd($documentmoved2);
          $infodata13= $newfilename13;
        }
      }
    }
    if ( $f14==1)
    {

      $rule = [
        'post_exp_upload3'=>'mimes:pdf|max:1000'
      ];

      $validator = Validator::make($request->all(),$rule);
      $i=0;

      if ($validator->fails())
      {
        $errors=$validator->errors();


        foreach ($errors->get('post_exp_upload3') as $message) 
        {
          $msg.=$message;

        }
        $success14=0;
        $data = array(
          'status' => false,
          'message' => $msg );
        echo json_encode($data); exit;
      }
      else
      {


        $file14 =$request->file('post_exp_upload3');
        $filename14="Post_doctoral_experience3".'_'.$reff_no;
        $extension14= $file14->getClientOriginalExtension();
        $newfilename14=$filename14.'.'.$extension14;
        $newfilename14=  preg_replace('/\s+/', '', $newfilename14);
        if(! Storage::exists($reff_path))
        {
         Storage::makeDirectory($reff_path, 0777, true,true);
       $path14 =$reff_path.'/'.$newfilename14;
       $documentmoved14=Storage::put($path14,file_get_contents($file14->getRealPath()));
     }
       else
       {
     
       $path14 =$reff_path.'/'.$newfilename14;
 
       $documentmoved14=Storage::put($path14,file_get_contents($file14->getRealPath()));
     }

        if($documentmoved14)
        {
// dd($documentmoved2);
          $infodata14= $newfilename14;
        }
      }
    }
    if ($f15==1 )
    {
      $rule = ['noc' => 'mimes:pdf|max:1000'
    ];

    $validator = Validator::make($request->all(),$rule);
    $i=0;

    if ($validator->fails())
    {
      $errors=$validator->errors();
      foreach ($errors->get('noc') as $message) 
      {
        $msg.=$message;

      }

      $success15=0;
      $data = array(
        'status' => false,
        'message' => $msg );
      echo json_encode($data); exit;
    }
    else
    {

      $file15 =$request->file('noc');
      $filename15="NOC".'_'.$reff_no;
      $extension15 = $file15->getClientOriginalExtension();
      $newfilename15=$filename15.'.'.$extension15;
      $newfilename15 = preg_replace('/\s+/', '', $newfilename15);
      if(! Storage::exists($reff_path))
      {
       Storage::makeDirectory($reff_path, 0777, true,true);
     $path15 =$reff_path.'/'.$newfilename15;
     $documentmoved15=Storage::put($path15,file_get_contents($file15->getRealPath()));
   }
     else
     {
   
     $path15 =$reff_path.'/'.$newfilename15;

     $documentmoved15=Storage::put($path15,file_get_contents($file15->getRealPath()));
   }
      if($documentmoved15)
      {

        $infodata15= $newfilename15;
      }


    }
  }
  if ($f16==1 )
  {
    $rule = ['ug_certificate' => 'mimes:pdf|max:1000'
  ];

  $validator = Validator::make($request->all(),$rule);
  $i=0;

  if ($validator->fails())
  {
    $errors=$validator->errors();
    foreach ($errors->get('ug_certificate') as $message) 
    {
      $msg.=$message;

    }

    $success16=0;
    $data = array(
      'status' => false,
      'message' => $msg );
    echo json_encode($data); exit;
  }
  else
  {

    $file16 =$request->file('ug_certificate');
    $filename16="Ug_certificate".'_'.$reff_no;
    $extension16 = $file16->getClientOriginalExtension();
    $newfilename16=$filename16.'.'.$extension16;
    $newfilename16 = preg_replace('/\s+/', '', $newfilename16);
    if(! Storage::exists($reff_path))
    {
     Storage::makeDirectory($reff_path, 0777, true,true);
   $path16=$reff_path.'/'.$newfilename16;
   $documentmoved16=Storage::put($path16,file_get_contents($file16->getRealPath()));
 }
   else
   {
 
   $path16 =$reff_path.'/'.$newfilename16;

   $documentmoved16=Storage::put($path16,file_get_contents($file16->getRealPath()));
 }
    if($documentmoved16)
    {

      $infodata16= $newfilename16;
    }


  }
}

if ($f17==1 )
{
  $rule = ['ug_marklist' => 'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{
  $errors=$validator->errors();
  foreach ($errors->get('ug_marklist') as $message) 
  {
    $msg.=$message;

  }

  $success17=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}
else
{

  $file17 =$request->file('ug_marklist');
  $filename17="Ug_marklist".'_'.$reff_no;
  $extension17 = $file17->getClientOriginalExtension();
  $newfilename17=$filename17.'.'.$extension17;
  $newfilename17 = preg_replace('/\s+/', '', $newfilename17);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path17 =$reff_path.'/'.$newfilename17;
      $documentmoved17=Storage::put($path17,file_get_contents($file17->getRealPath()));
    }
      else
      {
    
      $path17 =$reff_path.'/'.$newfilename17;

      $documentmoved17=Storage::put($path17,file_get_contents($file17->getRealPath()));
    }


  if($documentmoved17)
  {

    $infodata17= $newfilename17;
  }


}
}
if ($f18==1 )
{
  $rule = ['phd_summary' => 'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{
  $errors=$validator->errors();
  foreach ($errors->get('phd_summary') as $message) 
  {
    $msg.=$message;

  }

  $success18=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}
else
{

  $file18 =$request->file('phd_summary');
  $filename18="Phd_summary".'_'.$reff_no;
  $extension18 = $file18->getClientOriginalExtension();
  $newfilename18=$filename18.'.'.$extension18;
  $newfilename18 = preg_replace('/\s+/', '', $newfilename18);
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path18 =$reff_path.'/'.$newfilename18;
 $documentmoved18=Storage::put($path18,file_get_contents($file18->getRealPath()));
}
 else
 {

 $path18 =$reff_path.'/'.$newfilename18;

 $documentmoved18=Storage::put($path18,file_get_contents($file18->getRealPath()));
}

  if($documentmoved18)
  {

    $infodata18= $newfilename18;
  }


}
}
if ($f19==1 )
{
  $rule = ['exp_upload4' => 'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{
  $errors=$validator->errors();
  foreach ($errors->get('exp_upload4') as $message) 
  {
    $msg.=$message;

  }

  $success19=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}
else
{

  $file19 =$request->file('exp_upload4');
  $filename19="Research_experience4".'_'.$reff_no;
  $extension19 = $file19->getClientOriginalExtension();
  $newfilename19=$filename19.'.'.$extension19;
  $newfilename19 = preg_replace('/\s+/', '', $newfilename19);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path19 =$reff_path.'/'.$newfilename19;
      $documentmoved19=Storage::put($path19,file_get_contents($file19->getRealPath()));
    }
      else
      {
    
      $path19=$reff_path.'/'.$newfilename19;

      $documentmoved19=Storage::put($path19,file_get_contents($file19->getRealPath()));
    }
  if($documentmoved19)
  {

    $infodata19= $newfilename19;
  }


}
}

if ($f20==1 )
{
  $rule = ['exp_upload5' => 'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{
  $errors=$validator->errors();
  foreach ($errors->get('exp_upload5') as $message) 
  {
    $msg.=$message;

  }

  $success20=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}
else
{

  $file20 =$request->file('exp_upload5');
  $filename20="Research_experience5".'_'.$reff_no;
  $extension20 = $file20->getClientOriginalExtension();
  $newfilename20=$filename20.'.'.$extension20;
  $newfilename20 = preg_replace('/\s+/', '', $newfilename20);
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path20 =$reff_path.'/'.$newfilename20;
 $documentmoved20=Storage::put($path20,file_get_contents($file20->getRealPath()));
}
 else
 {

 $path20 =$reff_path.'/'.$newfilename20;

 $documentmoved20=Storage::put($path20,file_get_contents($file20->getRealPath()));
}

  if($documentmoved20)
  {

    $infodata20= $newfilename20;
  }


}
}
if ($f21==1 )
{
  $rule = ['awards_file' => 'mimes:pdf|max:3000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{
  $errors=$validator->errors();
  foreach ($errors->get('awards_file') as $message) 
  {
    $msg.=$message;

  }

  $success21=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}
else
{

  $file21 =$request->file('awards_file');
  $filename21="Awards_file".'_'.$reff_no;
  $extension21 = $file21->getClientOriginalExtension();
  $newfilename21=$filename21.'.'.$extension21;
  $newfilename21 = preg_replace('/\s+/', '', $newfilename21);
 
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path21 =$reff_path.'/'.$newfilename21;
 $documentmoved21=Storage::put($path21,file_get_contents($file21->getRealPath()));
}
 else
 {

 $path21 =$reff_path.'/'.$newfilename21;

 $documentmoved21=Storage::put($path21,file_get_contents($file21->getRealPath()));
}

  if($documentmoved21)
  {

    $infodata21= $newfilename21;
  }


}
}
if ($f22==1 )
{
  $rule = ['pi_copi_file' => 'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{
  $errors=$validator->errors();
  foreach ($errors->get('pi_copi_file') as $message) 
  {
    $msg.=$message;

  }

  $success22=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}
else
{

  $file22 =$request->file('pi_copi_file');
  $filename22="Pi_copi_file".'_'.$reff_no;
  $extension22 = $file22->getClientOriginalExtension();
  $newfilename22=$filename22.'.'.$extension22;
  $newfilename22 = preg_replace('/\s+/', '', $newfilename22);
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path22 =$reff_path.'/'.$newfilename22;
 $documentmoved22=Storage::put($path22,file_get_contents($file22->getRealPath()));
}
 else
 {

 $path22 =$reff_path.'/'.$newfilename22;

 $documentmoved22=Storage::put($path22,file_get_contents($file22->getRealPath()));
}
  if($documentmoved22)
  {

    $infodata22= $newfilename22;
  }


}
}

if ($f23==1 )
{
  $rule = ['conferences_file' => 'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{
  $errors=$validator->errors();
  foreach ($errors->get('conferences_file') as $message) 
  {
    $msg.=$message;

  }

  $success23=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}
else
{

  $file23 =$request->file('conferences_file');
  $filename23="Conferences_file".'_'.$reff_no;
  $extension23 = $file23->getClientOriginalExtension();
  $newfilename23=$filename23.'.'.$extension23;
  $newfilename23 = preg_replace('/\s+/', '', $newfilename23);
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path23 =$reff_path.'/'.$newfilename23;
 $documentmoved23=Storage::put($path23,file_get_contents($file23->getRealPath()));
}
 else
 {

 $path23 =$reff_path.'/'.$newfilename23;

 $documentmoved23=Storage::put($path23,file_get_contents($file23->getRealPath()));
}
  if($documentmoved23)
  {

    $infodata23= $newfilename23;
  }


}
}

if($request->dob!='')
$dob=date('Y-m-d',strtotime($request->dob));
else
$dob=NULL;
if($request->exp_from1!='')
$exp_from1=date('Y-m-d',strtotime($request->exp_from1));
else
$exp_from1=NULL;
if($request->exp_to1!='')
$exp_to1=date('Y-m-d',strtotime($request->exp_to1));
else
$exp_to1=NULL;

if($request->exp_from2!='')
$exp_from2=date('Y-m-d',strtotime($request->exp_from2));
else
$exp_from2=NULL;
if($request->exp_to2!='')
$exp_to2=date('Y-m-d',strtotime($request->exp_to2));
else
$exp_to2=NULL;

if($request->exp_from3!='')
$exp_from3=date('Y-m-d',strtotime($request->exp_from3));
else
$exp_from3=NULL;
if($request->exp_to3!='')
$exp_to3=date('Y-m-d',strtotime($request->exp_to3));
else
$exp_to3=NULL;

if($request->exp_from4!='')
$exp_from4=date('Y-m-d',strtotime($request->exp_from4));
else
$exp_from4=NULL;
if($request->exp_to4!='')
$exp_to4=date('Y-m-d',strtotime($request->exp_to4));
else
$exp_to4=NULL;
if($request->exp_from5!='')
$exp_from5=date('Y-m-d',strtotime($request->exp_from5));
else
$exp_from5=NULL;
if($request->exp_to5!='')
$exp_to5=date('Y-m-d',strtotime($request->exp_to5));
else
$exp_to5=NULL;
if($request->post_exp_from1!='')
$post_exp_from1=date('Y-m-d',strtotime($request->post_exp_from1));
else
$post_exp_from1=NULL;
if($request->post_exp_to1!='')
$post_exp_to1=date('Y-m-d',strtotime($request->post_exp_to1));
else
$post_exp_to1=NULL;

if($request->post_exp_from2!='')
$post_exp_from2=date('Y-m-d',strtotime($request->post_exp_from2));
else
$post_exp_from2=NULL;
if($request->post_exp_to2!='')
$post_exp_to2=date('Y-m-d',strtotime($request->post_exp_to2));
else
$post_exp_to2=NULL;

if($request->post_exp_from3!='')
$post_exp_from3=date('Y-m-d',strtotime($request->post_exp_from3));
else
$post_exp_from3=NULL;
if($request->post_exp_to3!='')
$post_exp_to3=date('Y-m-d',strtotime($request->post_exp_to3));
else
$post_exp_to3=NULL;

if($success1==1 && $success2==1 && $success3==1 && $success4==1&&$success5==1 && $success6==1 && $success7==1 && $success8==1 && $success9==1 && $success10==1 && $success11==1 && $success12==1&&$success13==1 && $success14==1 && $success15==1&& $success16==1&&$success17==1 && $success18==1 && $success19==1&& $success20==1&& $success21==1&&$success22==1 && $success23==1 )
{


// new
  // $appl=DB::table('application_form')->where('submit',1)->select('appl_no')->max('appl_no');
   // if($appl!=null){



      //$appl_no=$appl+1;


    //}
    //else{
     // $appl_no=100001;
    //}

// new

  $todayDate = date("Y-m-d H:i:s");

  DB::beginTransaction();
  if($request->curnt=="No")
  {
    $infodata15='';
  }
  $datas=array(
    'user_id'=>$userid,
    'ref_no'=>$reff_no,
   // 'appl_no'=>$appl_no,
    'post_code'=>$request->post_code_hidden,
    'title'=>$request->title,
    'name'=>$request->name,
    'fname'=>$request->fname,
    'gender'=>$request->gender,
    'nationality'=>$request->nationality,
    
    'category'=>$request->category,
    'caste'=>$request->caste,
    'category_file'=>$infodata1,
    'dob'=>$dob,
    'marital_status'=>$request->marital_status,
    'mobile'=>$request->mobile,
    'email'=>$request->email,
    'p_address'=>$request->address1,
    'c_address'=>$request->address2,
    'id_proof'=>$request->idproof,
    'id_proof_file'=>$infodata2,
    'photo'=>$infodata3,
    'sign'=>$infodata4,
    'ug_course'=>$request->ug_course,
    'ug_subject'=>$request->ug_subject,
    'ug_university'=>$request->ug_institution,
    'ug_year'=>$request->ug_year,
    'ug_mark'=>$request->ug_percentage,
    'ug_file1'=>$infodata16,
    'ug_file2'=>$infodata17,
    'pg_course'=>$request->pg_course,
    'pg_subject'=>$request->pg_subject,
    'pg_university'=>$request->pg_institution,
    'pg_year'=>$request->pg_year,
    'pg_mark'=>$request->pg_percentage,
    'pg_file1'=>$infodata5,
    'pg_file2'=>$infodata6,
    'phd_university'=>$request->phd_institution,
    'phd_subject'=>$request->phd_subject,
    'phd_title'=>$request->phd_title,
    'phd_year'=>$request->phd_year,
    'phd_file'=>$infodata7,
    'phd_summary'=>$infodata18,
    'scholar_link'=>$request->pub_scholar,
    'corpus_id'=>$request->pub_corpus,
    'paper_list'=>$infodata8,
    'exp_institute1'=>$request->exp_institute1,
    'exp_designation1'=>$request->exp_desig1,
    'exp_from1'=>$exp_from1,
    'exp_to1'=>$exp_to1,
    'exp_duration1'=>$request->exp_duration1,
    'exp_duties1'=>$request->exp_duties1,
    'exp_file1'=>$infodata9,
    'exp_institute2'=>$request->exp_institute2,
    'exp_designation2'=>$request->exp_desig2,
    'exp_from2'=>$exp_from2,
    'exp_to2'=>$exp_to2,
    'exp_duration2'=>$request->exp_duration2,
    'exp_duties2'=>$request->exp_duties2,
    'exp_file2'=>$infodata10,
    'exp_institute3'=>$request->exp_institute3,
    'exp_designation3'=>$request->exp_desig3,
    'exp_from3'=>$exp_from3,
    'exp_to3'=>$exp_to3,
    'exp_duration3'=>$request->exp_duration3,
    'exp_duties3'=>$request->exp_duties3,
    'exp_file3'=>$infodata11,
    'exp_institute4'=>$request->exp_institute4,
    'exp_designation4'=>$request->exp_desig4,
    'exp_from4'=>$exp_from4,
    'exp_to4'=>$exp_to4,
    'exp_duration4'=>$request->exp_duration4,
    'exp_duties4'=>$request->exp_duties4,
    'exp_file4'=>$infodata19,
    'exp_institute5'=>$request->exp_institute5,
    'exp_designation5'=>$request->exp_desig5,
    'exp_from5'=>$exp_from5,
    'exp_to5'=>$exp_to5,
    'exp_duration5'=>$request->exp_duration5,
    'exp_duties5'=>$request->exp_duties5,
    'exp_file5'=>$infodata20,
    'phd_exp_institute1'=>$request->post_exp_institute1,
    'phd_exp_fundagency1'=>$request->post_exp_fund1,
    'phd_exp_from1'=>$post_exp_from1,
    'phd_exp_to1'=>$post_exp_to1,
    'phd_exp_duration1'=>$request->post_exp_duration1,
    'phd_exp_duties1'=>$request->post_exp_duties1,
    'phd_exp_file1'=>$infodata12,
    
    'phd_exp_institute2'=>$request->post_exp_institute2,
    
    'phd_exp_fundagency2'=>$request->post_exp_fund2,
    'phd_exp_from2'=>$post_exp_from2,
    'phd_exp_to2'=>$post_exp_to2,
    'phd_exp_duration2'=>$request->post_exp_duration2,
    'phd_exp_duties2'=>$request->post_exp_duties2,
    'phd_exp_file2'=>$infodata13,
    'phd_exp_institute3'=>$request->post_exp_institute3,
    
    'phd_exp_fundagency3'=>$request->post_exp_fund3,
    'phd_exp_from3'=>$post_exp_from3,

    'phd_exp_to3'=>$post_exp_to3,
    'phd_exp_duration3'=>$request->post_exp_duration3,
    'phd_exp_duties3'=>$request->post_exp_duties3,
    'phd_exp_file3'=>$infodata14,
    'awards_file'=>$infodata21,
    'pi_copi_file'=>$infodata22,
    'conferences_file'=>$infodata23,
    
    'paper_count'=>$request->paper_count,
    
    'skills'=>$request->skill,
    'relevant'=>$request->relevant,
    'contribution'=>$request->vision,
    'ref_name1'=>$request->Ref_name1,
    'ref_addr1'=>$request->Ref_postheld1,
    'ref_phone1'=>$request->Ref_phone1,
    'ref_email1'=>$request->Ref_email1,
    
    'ref_name2'=>$request->Ref_name2,
    'ref_addr2'=>$request->Ref_postheld2,
    'ref_phone2'=>$request->Ref_phone2,
    'ref_email2'=>$request->Ref_email2,
    
    'ref_name3'=>$request->Ref_name3,
    'ref_addr3'=>$request->Ref_postheld3,
    'ref_phone3'=>$request->Ref_phone3,
    'ref_email3'=>$request->Ref_email3,
    
    'noc'=>$infodata15 ,
    'curnt'=>$request->curnt ,
    'submit'=>1,
    'updated_at'=>$todayDate ,
  );
if (count($prv)>0) {
  $an=$prv[0]->id;
  $p=$prv[0]->post_code;
// dd($datas);

  $save=DB::table('application_form')->where('id',$an)->where('post_code',$p)->update($datas);
  // dd($save);
  $num=$an;
}
else
{
 $save=DB::table('application_form')->insertGetId($datas,'id');
 $num=$save;
}   
if($save)
{
  // $appl=DB::table('application_form')->where('submit',1)->select('appl_no')->max('appl_no');
  //dd($appl);
//$appl=DB::table('application_form')->where('submit',1)->where('id',$num);

  DB::commit();

$post="Scientist";
  $sms=$this->send_sms1($userdata->mobile,"Your application for the post ".$post."(". $pc.") has been submitted successfully with Application Number ".$reff_no." KSCSTE Recruitment Portal");

  $data = array( 'status'=>true,
    'message'=>'Your application for the post Scientist('.$pc.') has been submitted successfully with Application Number '.$reff_no
  );
  echo json_encode($data); 

}

else
{
  DB::rollback();
  $data = array( 'status'=>false,
    'message'=>'Error..! Try again.'
  );
  echo json_encode($data); 
}

}

else
{
 $data = array( 'status'=>false,
  'message'=>'Please upload mandatory files.'
);
 echo json_encode($data); 
}

}

public function applicationSave(Request $request)
{
 // dd($request->all());
 
  $userid = \Auth::user()->id;
  $pc=$request->post_code_hidden;
  //start generating reff_no
  $html = $pc;
$needle = "/";
$lastPos = 0;
$positions = array();

while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
    $positions[] = $lastPos;
    $lastPos = $lastPos + strlen($needle);
}

$sub = substr($pc, $positions[0], $positions[1]);
$ref_sub=str_replace('/', '', $sub);
//trim($sub,"/");
//End generating reff_no
  $datas=[]; 
//$userid=\Auth::user()->id;
  $userdata=DB::table('users')->where('id',$userid)->first();
  $infodata1='';
  $infodata2='';
  $infodata3='';
  $infodata4='';
  $infodata5='';
  $infodata6='';
  $infodata7='';
  $infodata8='';
  $infodata9='';
  $infodata10='';
  $infodata11='';
  $infodata12='';
  $infodata13='';
  $infodata14='';
  $infodata15='';
  $infodata16='';
  $infodata17='';
  $infodata18='';
  $infodata19='';
  $infodata20='';
  $infodata21='';
  $infodata22='';
  $infodata23='';
  $msg='';

  $prv=DB::table('application_form')->where('user_id',$userid)->where('post_code',$pc)->get();
  $reff_no="ICCS100".$ref_sub.$userid;
  $reff_path='/public/uploads/iccs/'.$reff_no;

  $success1=1;
  $success2=1;
  $success3=1;
  $success4=1;
  $success5=1;
  $success6=1;
  $success7=1;
  $success8=1;
  $success9=1;
  $success10=1;
  $success11=1;
  $success12=1;
  $success13=1;
  $success14=1;
  $success15=1;
  $success16=1;
  $success17=1;
  $success18=1;
  $success19=1;
  $success20=1;
  $success21=1;
  $success22=1;
  $success23=1;
  $post_code123=str_replace('/', '_', $request->post_code_hidden);
  //dd($abc);
  if ($request->hasFile('noc') )
  {
    $rule = ['noc' => 'mimes:pdf|max:1000'
  ];
// dd("ff");
  $validator = Validator::make($request->all(),$rule);
  $i=0;
// dd($validator->fails());
  if ($validator->fails())
  {  
    $errors=$validator->errors();
    foreach ($errors->get('noc') as $message) 
    {
      $msg.=$message;
    }

    
    $success15=0;
    $data = array(
      'status' => false,
      'message' => $msg );
    echo json_encode($data); exit;
  }

  else
  {
    $success15=1;
// dd();
    $file15 =$request->file('noc');
    $filename15="NOC".'_'.$reff_no;
    $extension15 = $file15->getClientOriginalExtension();
    $newfilename15=$filename15.'.'.$extension15;
    $newfilename15 = preg_replace('/\s+/', '', $newfilename15);

    if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path15 =$reff_path.'/'.$newfilename15;
      $documentmoved15=Storage::put($path15,file_get_contents($file15->getRealPath()));
    }
      else
      {
    
      $path15 =$reff_path.'/'.$newfilename15;

      $documentmoved15=Storage::put($path15,file_get_contents($file15->getRealPath()));
    }
     // dd($documentmoved1);

    if($documentmoved15)
    {

      $infodata15= $newfilename15;
    }


  }
}

if ($request->hasFile('casteprooffile') )
{
  $rule = ['casteprooffile' => 'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('casteprooffile') as $message) 
  {
    $msg.=$message;

  }
  $success1=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;


}
else
{
  $success1=1;
  $file1 =$request->file('casteprooffile');
  $filename1="Caste".'_'.$reff_no;
  $extension1 = $file1->getClientOriginalExtension();
  $newfilename1=$filename1.'.'.$extension1;
  $newfilename1 = preg_replace('/\s+/', '', $newfilename1);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path1 =$reff_path.'/'.$newfilename1;
      $documentmoved1=Storage::put($path1,file_get_contents($file1->getRealPath()));
    }
      else
      {
    
      $path1 =$reff_path.'/'.$newfilename1;

      $documentmoved1=Storage::put($path1,file_get_contents($file1->getRealPath()));
    }
     // dd($documentmoved1);
  
  if($documentmoved1)
  {

    $infodata1= $newfilename1;
  }


}
}


if ($request->hasFile('idprooffile') )
{  
  $rule = ['idprooffile' => 'mimes:pdf|max:1000'
];
 // dd();
$validator = Validator::make($request->all(),$rule);
$i=0;
if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('idprooffile') as $message) 
  {
    $msg.=$message;

  }
  $success2=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
  

}
else
{
  $success2=1;

  $file2 =$request->file('idprooffile');
  $filename2="Idproof".'_'.$reff_no;
  $extension2 = $file2->getClientOriginalExtension();
  $newfilename2=$filename2.'.'.$extension2;
  $newfilename2 = preg_replace('/\s+/', '', $newfilename2);
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path2 =$reff_path.'/'.$newfilename2;
 $documentmoved2=Storage::put($path2,file_get_contents($file2->getRealPath()));
}
 else
 {

 $path2 =$reff_path.'/'.$newfilename2;

 $documentmoved2=Storage::put($path2,file_get_contents($file2->getRealPath()));
}

  if($documentmoved2)
  {

    $infodata2= $newfilename2;
  }


}
}
if ($request->hasFile('photo') )
{
  $rule = ['photo' =>' mimes:jpeg,jpg|max:30|dimensions:min_width=150,min_height=200'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('photo') as $message) 
  {
    $msg.=$message;

  }

  
  $success3=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;

  
  
}

else
{
  $success3=1;

  $file3 =$request->file('photo');
  $filename3="Photo".'_'.$reff_no;
  $extension3 = $file3->getClientOriginalExtension();
  $newfilename3=$filename3.'.'.$extension3;
  $newfilename3 = preg_replace('/\s+/', '', $newfilename3);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path3 =$reff_path.'/'.$newfilename3;
      $documentmoved3=Storage::put($path3,file_get_contents($file3->getRealPath()));
    }
      else
      {
    
      $path3 =$reff_path.'/'.$newfilename3;

      $documentmoved3=Storage::put($path3,file_get_contents($file3->getRealPath()));
    }

  if($documentmoved3)
  {

    $infodata3= $newfilename3;
  }


}
}

if ($request->hasFile('signature') )
{

  $rule = ['signature' =>' required|mimes:jpeg,jpg|max:30|dimensions:min_width=150,min_height=100'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('signature') as $message) 
  {
    $msg.=$message;

  }

  

  $success4=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;

}
else
{
  $success4=1;

  $file4 =$request->file('signature');
  $filename4="Sign".'_'.$reff_no;
  $extension4 = $file4->getClientOriginalExtension();
  $newfilename4=$filename4.'.'.$extension4;
  $newfilename4 = preg_replace('/\s+/', '', $newfilename4);
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path4 =$reff_path.'/'.$newfilename4;
 $documentmoved4=Storage::put($path4,file_get_contents($file4->getRealPath()));
}
 else
 {

 $path4 =$reff_path.'/'.$newfilename4;

 $documentmoved4=Storage::put($path4,file_get_contents($file4->getRealPath()));
}


  if($documentmoved4)
  {
    //dd("dfds");

    $infodata4= $newfilename4;
  }


}
}



if ($request->hasFile('ug_certificate') )
{
  $rule = ['ug_certificate' => 'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('ug_certificate') as $message) 
  {
    $msg.=$message;

  }
  $success16=0;
  $data = array(
   'status' => false,
   'message' => $msg );
  echo json_encode($data); exit;


}
else
{
  $success16=1;
  $file16 =$request->file('ug_certificate');
  $filename16="Ug_certificate".'_'.$reff_no;
  $extension16 = $file16->getClientOriginalExtension();
  $newfilename16=$filename16.'.'.$extension16;
  $newfilename16 = preg_replace('/\s+/', '', $newfilename16);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path16=$reff_path.'/'.$newfilename16;
      $documentmoved16=Storage::put($path16,file_get_contents($file16->getRealPath()));
    }
      else
      {
    
      $path16 =$reff_path.'/'.$newfilename16;

      $documentmoved16=Storage::put($path16,file_get_contents($file16->getRealPath()));
    }
  
  if($documentmoved16)
  {

    $infodata16= $newfilename16;
  }


}
}


if ($request->hasFile('ug_marklist') )
{

  $rule = ['ug_marklist' =>' mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('ug_marklist') as $message) 
  {
    $msg.=$message;

  }

  
  $success17=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;


}
else
{
  $success17=1;

  $file17 =$request->file('ug_marklist');
  $filename17="Ug_marklist".'_'.$reff_no;
  $extension17 = $file17->getClientOriginalExtension();
  $newfilename17=$filename17.'.'.$extension17;
  $newfilename17= preg_replace('/\s+/', '', $newfilename17);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path17 =$reff_path.'/'.$newfilename17;
      $documentmoved17=Storage::put($path17,file_get_contents($file17->getRealPath()));
    }
      else
      {
    
      $path17 =$reff_path.'/'.$newfilename17;

      $documentmoved17=Storage::put($path17,file_get_contents($file17->getRealPath()));
    }

  if($documentmoved17)
  {

   $infodata17= $newfilename17;
 }


}
}

if ($request->hasFile('pg_certificate') )
{
  $rule = ['pg_certificate' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('pg_certificate') as $message) 
  {
    $msg.=$message;

  }
  $success5=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;

}
else
{
  $success5=1;

  $file5 =$request->file('pg_certificate');
  $filename5="Pg_certificate".'_'.$reff_no;
  $extension5 = $file5->getClientOriginalExtension();
  $newfilename5=$filename5.'.'.$extension5;
  $newfilename5 = preg_replace('/\s+/', '', $newfilename5);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path5 =$reff_path.'/'.$newfilename5;
      $documentmoved5=Storage::put($path5,file_get_contents($file5->getRealPath()));
    }
      else
      {
    
      $path5 =$reff_path.'/'.$newfilename5;

      $documentmoved5=Storage::put($path5,file_get_contents($file5->getRealPath()));
    }

  if($documentmoved5)
  {

    $infodata5= $newfilename5;
  }


}
}



if ($request->hasFile('pg_marklist') )
{
  $rule = ['pg_marklist' =>' mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('pg_marklist') as $message) 
  {
    $msg.=$message;

  }

  $success6=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success6=1;

  $file6 =$request->file('pg_marklist');
  $filename6="Pg_marklist".'_'.$reff_no;
  $extension6 = $file6->getClientOriginalExtension();
  $newfilename6=$filename6.'.'.$extension6;
  $newfilename6= preg_replace('/\s+/', '', $newfilename6);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path6 =$reff_path.'/'.$newfilename6;
      $documentmoved6=Storage::put($path6,file_get_contents($file6->getRealPath()));
    }
      else
      {
    
      $path6 =$reff_path.'/'.$newfilename6;

      $documentmoved6=Storage::put($path6,file_get_contents($file6->getRealPath()));
    }

  if($documentmoved6)
  {

   $infodata6= $newfilename6;
 }


}
}



if ($request->hasFile('phd_certificate') )
{
  $rule = ['phd_certificate' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('phd_certificate') as $message) 
  {
    $msg.=$message;

  }


  $success7=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success7=1;

  $file7 =$request->file('phd_certificate');
  $filename7="Phd_certificate".'_'.$reff_no;
  $extension7= $file7->getClientOriginalExtension();
  $newfilename7=$filename7.'.'.$extension7;
  $newfilename7 = preg_replace('/\s+/', '', $newfilename7);
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path7 =$reff_path.'/'.$newfilename7;
 $documentmoved7=Storage::put($path7,file_get_contents($file7->getRealPath()));
}
 else
 {

 $path7 =$reff_path.'/'.$newfilename7;

 $documentmoved7=Storage::put($path7,file_get_contents($file7->getRealPath()));
}
  if($documentmoved7)
  {

    $infodata7= $newfilename7;
  }


}
}


if ($request->hasFile('phd_summary') )
{
  $rule = ['phd_summary' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('phd_summary') as $message) 
  {
    $msg.=$message;

  }

  
  $success18=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success18=1;

  $file18 =$request->file('phd_summary');
  $filename18="Phd_summary".'_'.$reff_no;
  $extension18= $file18->getClientOriginalExtension();
  $newfilename18=$filename18.'.'.$extension18;
  $newfilename18 = preg_replace('/\s+/', '', $newfilename18);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path18 =$reff_path.'/'.$newfilename18;
      $documentmoved18=Storage::put($path18,file_get_contents($file18->getRealPath()));
    }
      else
      {
    
      $path18 =$reff_path.'/'.$newfilename18;

      $documentmoved18=Storage::put($path18,file_get_contents($file18->getRealPath()));
    }
  if($documentmoved18)
  {

    $infodata18= $newfilename18;
  }


}
}





if ($request->hasFile('pub_upload') )
{
  $rule = ['pub_upload' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('pub_upload') as $message) 
  {
    $msg.=$message;

  }

  
  $success8=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success8=1;

  $file8 =$request->file('pub_upload');
  $filename8="publication_list".'_'.$reff_no;
  $extension8 = $file8->getClientOriginalExtension();
  $newfilename8=$filename8.'.'.$extension8;
  $newfilename8 = preg_replace('/\s+/', '', $newfilename8);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path8 =$reff_path.'/'.$newfilename8;
      $documentmoved8=Storage::put($path8,file_get_contents($file8->getRealPath()));
    }
      else
      {
    
      $path8 =$reff_path.'/'.$newfilename8;

      $documentmoved8=Storage::put($path8,file_get_contents($file8->getRealPath()));
    }

  if($documentmoved8)
  {

    $infodata8= $newfilename8;
  }


}
}

if ($request->hasFile('exp_upload1') )
{
  $rule = ['exp_upload1' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('exp_upload1') as $message) 
  {
    $msg.=$message;

  }


  $success9=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success9=1;

  $file9 =$request->file('exp_upload1');
  $filename9="Research_experience1".'_'.$reff_no;
  $extension9 = $file9->getClientOriginalExtension();
  $newfilename9=$filename9.'.'.$extension9;
  $newfilename9 = preg_replace('/\s+/', '', $newfilename9);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path9 =$reff_path.'/'.$newfilename9;
      $documentmoved9=Storage::put($path9,file_get_contents($file9->getRealPath()));
    }
      else
      {
    
      $path9 =$reff_path.'/'.$newfilename9;

      $documentmoved9=Storage::put($path9,file_get_contents($file9->getRealPath()));
    }

  if($documentmoved9)
  {

    $infodata9= $newfilename9;
  }


}
}


if ($request->hasFile('exp_upload2') )
{
  $rule = ['exp_upload2' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('exp_upload2') as $message) 
  {
    $msg.=$message;

  }


  $success10=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}


else
{
  $success10=1;

  $file10 =$request->file('exp_upload2');
  $filename10="Research_experience2".'_'.$reff_no;
  $extension10= $file10->getClientOriginalExtension();
  $newfilename10=$filename10.'.'.$extension10;
  $newfilename10 = preg_replace('/\s+/', '', $newfilename10);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path10 =$reff_path.'/'.$newfilename10;
      $documentmoved10=Storage::put($path10,file_get_contents($file10->getRealPath()));
    }
      else
      {
    
      $path10 =$reff_path.'/'.$newfilename10;

      $documentmoved10=Storage::put($path10,file_get_contents($file10->getRealPath()));
    }

  if($documentmoved10)
  {

    $infodata10= $newfilename10;
  }


}
}

if ($request->hasFile('exp_upload3') )
{
  $rule = ['exp_upload3' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('exp_upload3') as $message) 
  {
    $msg.=$message;

  }

  $success11=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success11=1;

  $file11=$request->file('exp_upload3');
  $filename11="Research_experience3".'_'.$reff_no;
  $extension11 = $file11->getClientOriginalExtension();
  $newfilename11=$filename11.'.'.$extension11;
  $newfilename11 = preg_replace('/\s+/', '', $newfilename11);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path11 =$reff_path.'/'.$newfilename11;
      $documentmoved11=Storage::put($path11,file_get_contents($file11->getRealPath()));
    }
      else
      {
    
      $path11 =$reff_path.'/'.$newfilename11;

      $documentmoved11=Storage::put($path11,file_get_contents($file11->getRealPath()));
    }

  if($documentmoved11)
  {

    $infodata11= $newfilename11;
  }


}
}
if ($request->hasFile('exp_upload4') )
{
  $rule = ['exp_upload4' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('exp_upload4') as $message) 
  {
    $msg.=$message;

  }


  $success19=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success19=1;

  $file19=$request->file('exp_upload4');
  $filename19="Research_experience4".'_'.$reff_no;
  $extension19 = $file19->getClientOriginalExtension();
  $newfilename19=$filename19.'.'.$extension19;
  $newfilename19 = preg_replace('/\s+/', '', $newfilename19);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path19 =$reff_path.'/'.$newfilename19;
      $documentmoved19=Storage::put($path19,file_get_contents($file19->getRealPath()));
    }
      else
      {
    
      $path19=$reff_path.'/'.$newfilename19;

      $documentmoved19=Storage::put($path19,file_get_contents($file19->getRealPath()));
    }
  if($documentmoved19)
  {

    $infodata19= $newfilename19;
  }


}
}

if ($request->hasFile('exp_upload5') )
{
  $rule = ['exp_upload5' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('exp_upload5') as $message) 
  {
    $msg.=$message;

  }

  
  $success20=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success20=1;

  $file20=$request->file('exp_upload5');
  $filename20="Research_experience5".'_'.$reff_no;
  $extension20 = $file20->getClientOriginalExtension();
  $newfilename20=$filename20.'.'.$extension20;
  $newfilename20 = preg_replace('/\s+/', '', $newfilename20);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path20 =$reff_path.'/'.$newfilename20;
      $documentmoved20=Storage::put($path20,file_get_contents($file20->getRealPath()));
    }
      else
      {
    
      $path20 =$reff_path.'/'.$newfilename20;

      $documentmoved20=Storage::put($path20,file_get_contents($file20->getRealPath()));
    }

  if($documentmoved20)
  {

    $infodata20= $newfilename20;
  }


}
}



if ($request->hasFile('awards_file') )
{
  $rule = ['awards_file' =>'mimes:pdf|max:3000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('awards_file') as $message) 
  {
    $msg.=$message;

  }

  
  $success21=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success21=1;

  $file21=$request->file('awards_file');
  $filename21="Award_File".'_'.$reff_no;
  $extension21 = $file21->getClientOriginalExtension();
  $newfilename21=$filename21.'.'.$extension21;
  $newfilename21 = preg_replace('/\s+/', '', $newfilename21);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path21 =$reff_path.'/'.$newfilename21;
      $documentmoved21=Storage::put($path21,file_get_contents($file21->getRealPath()));
    }
      else
      {
    
      $path21 =$reff_path.'/'.$newfilename21;

      $documentmoved21=Storage::put($path21,file_get_contents($file21->getRealPath()));
    }

  if($documentmoved21)
  {

    $infodata21= $newfilename21;
  }


}
}


if ($request->hasFile('pi_copi_file') )
{
  $rule = ['pi_copi_file' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('pi_copi_file') as $message) 
  {
    $msg.=$message;

  }

  
  $success22=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}


else
{
  $success22=1;

  $file22=$request->file('pi_copi_file');
  $filename22="Pi_copi_File".'_'.$reff_no;
  $extension22 = $file22->getClientOriginalExtension();
  $newfilename22=$filename22.'.'.$extension22;
  $newfilename22 = preg_replace('/\s+/', '', $newfilename22);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path22 =$reff_path.'/'.$newfilename22;
      $documentmoved22=Storage::put($path22,file_get_contents($file22->getRealPath()));
    }
      else
      {
    
      $path22 =$reff_path.'/'.$newfilename22;

      $documentmoved22=Storage::put($path22,file_get_contents($file22->getRealPath()));
    }

  if($documentmoved22)
  {

    $infodata22= $newfilename22;
  }


}
}

if ($request->hasFile('conferences_file') )
{
  $rule = ['conferences_file' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('conferences_file') as $message) 
  {
    $msg.=$message;

  }

  
  $success23=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success23=1;

  $file23=$request->file('conferences_file');
  $filename23="Conferences_file".'_'.$reff_no;
  $extension23 = $file23->getClientOriginalExtension();
  $newfilename23=$filename23.'.'.$extension23;
  $newfilename23 = preg_replace('/\s+/', '', $newfilename23);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path23 =$reff_path.'/'.$newfilename23;
      $documentmoved23=Storage::put($path23,file_get_contents($file23->getRealPath()));
    }
      else
      {
    
      $path23 =$reff_path.'/'.$newfilename23;

      $documentmoved23=Storage::put($path23,file_get_contents($file23->getRealPath()));
    }

  if($documentmoved23)
  {

    $infodata23= $newfilename23;
  }


}
}





if ($request->hasFile('post_exp_upload1') )
{
  $rule = ['post_exp_upload1' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('post_exp_upload1') as $message) 
  {
    $msg.=$message;

  }

  $success12=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success12=1;

  $file12 =$request->file('post_exp_upload1');
  $filename12="Post_doctoral_experience1".'_'.$reff_no;
  $extension12 = $file12->getClientOriginalExtension();
  $newfilename12=$filename12.'.'.$extension12;
  $newfilename12 = preg_replace('/\s+/', '', $newfilename12);
  if(! Storage::exists($reff_path))
  {
   Storage::makeDirectory($reff_path, 0777, true,true);
 $path12 =$reff_path.'/'.$newfilename12;
 $documentmoved12=Storage::put($path12,file_get_contents($file12->getRealPath()));
}
 else
 {

 $path12 =$reff_path.'/'.$newfilename12;

 $documentmoved12=Storage::put($path12,file_get_contents($file12->getRealPath()));
}

  if($documentmoved12)
  {

    $infodata12= $newfilename12;
  }


}
}


if ($request->hasFile('post_exp_upload2') )
{
  $rule = ['post_exp_upload2' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('post_exp_upload2') as $message) 
  {
    $msg.=$message;

  }

  
  $success13=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success13=1;

  $file13 =$request->file('post_exp_upload2');
  $filename13="Post_doctoral_experience2".'_'.$reff_no;
  $extension13= $file13->getClientOriginalExtension();
  $newfilename13=$filename13.'.'.$extension13;
  $newfilename13 = preg_replace('/\s+/', '', $newfilename13);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path13 =$reff_path.'/'.$newfilename13;
      $documentmoved13=Storage::put($path13,file_get_contents($file13->getRealPath()));
    }
      else
      {
    
      $path13 =$reff_path.'/'.$newfilename13;

      $documentmoved13=Storage::put($path13,file_get_contents($file13->getRealPath()));
    }

  if($documentmoved13)
  {

    $infodata13= $newfilename13;
  }


}
}
if ($request->hasFile('post_exp_upload3') )
{
  $rule = ['post_exp_upload3' =>'mimes:pdf|max:1000'
];

$validator = Validator::make($request->all(),$rule);
$i=0;

if ($validator->fails())
{ 
  $errors=$validator->errors();
  foreach ($errors->get('post_exp_upload3') as $message) 
  {
    $msg.=$message;

  }

  
  $success14=0;
  $data = array(
    'status' => false,
    'message' => $msg );
  echo json_encode($data); exit;
}

else
{
  $success14=1;

  $file14 =$request->file('post_exp_upload3');
  $filename14="Post_doctoral_experience3".'_'.$reff_no;
  $extension14= $file14->getClientOriginalExtension();
  $newfilename14=$filename14.'.'.$extension14;
  $newfilename14 = preg_replace('/\s+/', '', $newfilename14);
  if(! Storage::exists($reff_path))
       {
        Storage::makeDirectory($reff_path, 0777, true,true);
      $path14 =$reff_path.'/'.$newfilename14;
      $documentmoved14=Storage::put($path14,file_get_contents($file14->getRealPath()));
    }
      else
      {
    
      $path14 =$reff_path.'/'.$newfilename14;

      $documentmoved14=Storage::put($path14,file_get_contents($file14->getRealPath()));
    }
  if($documentmoved14)
  {

    $infodata14= $newfilename14;
  }


}
}


if($request->dob!='')
$dob=date('Y-m-d',strtotime($request->dob));
else
$dob=NULL;
if($request->exp_from1!='')
$exp_from1=date('Y-m-d',strtotime($request->exp_from1));
else
$exp_from1=NULL;
if($request->exp_to1!='')
$exp_to1=date('Y-m-d',strtotime($request->exp_to1));
else
$exp_to1=NULL;

if($request->exp_from2!='')
$exp_from2=date('Y-m-d',strtotime($request->exp_from2));
else
$exp_from2=NULL;
if($request->exp_to2!='')
$exp_to2=date('Y-m-d',strtotime($request->exp_to2));
else
$exp_to2=NULL;

if($request->exp_from3!='')
$exp_from3=date('Y-m-d',strtotime($request->exp_from3));
else
$exp_from3=NULL;
if($request->exp_to3!='')
$exp_to3=date('Y-m-d',strtotime($request->exp_to3));
else
$exp_to3=NULL;

if($request->exp_from4!='')
$exp_from4=date('Y-m-d',strtotime($request->exp_from4));
else
$exp_from4=NULL;
if($request->exp_to4!='')
$exp_to4=date('Y-m-d',strtotime($request->exp_to4));
else
$exp_to4=NULL;
if($request->exp_from5!='')
$exp_from5=date('Y-m-d',strtotime($request->exp_from5));
else
$exp_from5=NULL;
if($request->exp_to5!='')
$exp_to5=date('Y-m-d',strtotime($request->exp_to5));
else
$exp_to5=NULL;
if($request->post_exp_from1!='')
$post_exp_from1=date('Y-m-d',strtotime($request->post_exp_from1));
else
$post_exp_from1=NULL;
if($request->post_exp_to1!='')
$post_exp_to1=date('Y-m-d',strtotime($request->post_exp_to1));
else
$post_exp_to1=NULL;

if($request->post_exp_from2!='')
$post_exp_from2=date('Y-m-d',strtotime($request->post_exp_from2));
else
$post_exp_from2=NULL;
if($request->post_exp_to2!='')
$post_exp_to2=date('Y-m-d',strtotime($request->post_exp_to2));
else
$post_exp_to2=NULL;

if($request->post_exp_from3!='')
$post_exp_from3=date('Y-m-d',strtotime($request->post_exp_from3));
else
$post_exp_from3=NULL;
if($request->post_exp_to3!='')
$post_exp_to3=date('Y-m-d',strtotime($request->post_exp_to3));
else
$post_exp_to3=NULL;






if($success1==1 && $success2==1 && $success3==1 && $success4==1&&$success5==1 && $success6==1 && $success7==1 && $success8==1 && $success9==1 && $success10==1 && $success11==1 && $success12==1&&$success13==1 && $success14==1 && $success15==1 && $success16==1 && $success17==1 && $success18==1 && $success19==1 && $success20==1&&$success21==1 && $success22==1 && $success23==1)
{

  $todayDate = date("Y-m-d H:i:s");



  if (count($prv)>0) {

    $an=$prv[0]->id;


    if($infodata1=='')
    {

      $infodata1=$prv[0]->category_file;


    }
    if($infodata2=='')
    {

      $infodata2=$prv[0]->id_proof_file;

    }
    if($infodata3=='')
    {

      $infodata3=$prv[0]->photo;


    }
    if($infodata4=='')
    {

      $infodata4=$prv[0]->sign;

    }
    if($infodata5=='')
    {

      $infodata5=$prv[0]->pg_file1;


    }
    if($infodata6=='')
    {

      $infodata6=$prv[0]->pg_file2;

    }
    if($infodata7=='')
    {

      $infodata7=$prv[0]->phd_file;


    }
    if($infodata8=='')
    {

      $infodata8=$prv[0]->paper_list;

    }
    if($infodata9=='')
    {

      $infodata9=$prv[0]->exp_file1;


    }
    if($infodata10=='')
    {

      $infodata10=$prv[0]->exp_file2;

    }
    if($infodata11=='')
    {

      $infodata11=$prv[0]->exp_file3;


    }
    if($infodata12=='')
    {

      $infodata12=$prv[0]->phd_exp_file1;

    }
    if($infodata13=='')
    {

      $infodata13=$prv[0]->phd_exp_file2;

    }
    if($infodata14=='')
    {

      $infodata14=$prv[0]->phd_exp_file3;

    }
    if($infodata15=='')
    {

      $infodata15=$prv[0]->noc;

    }


    if($infodata16=='')
    {

      $infodata16=$prv[0]->ug_file1;


    }
    if($infodata17=='')
    {

      $infodata17=$prv[0]->ug_file2;

    }
    if($infodata18=='')
    {

      $infodata18=$prv[0]->phd_summary;


    }
    if($infodata19=='')
    {

      $infodata19=$prv[0]->exp_file4;

    }
    if($infodata20=='')
    {

      $infodata20=$prv[0]->exp_file5;

    }
    if($infodata21=='')
    {

      $infodata21=$prv[0]->awards_file;

    }
    if($infodata22=='')
    {

      $infodata22=$prv[0]->pi_copi_file;

    }
    if($infodata23=='')
    {

      $infodata23=$prv[0]->conferences_file;

    }
    

    $datas=array(
      'user_id'=>$userid,
      'ref_no'=>$reff_no,

      'post_code'=>$request->post_code_hidden,
      'title'=>$request->title,
      'name'=>$request->name,
      'fname'=>$request->fname,
      'gender'=>$request->gender,
      'nationality'=>$request->nationality,

      'category'=>$request->category,
      'caste'=>$request->caste,
      'category_file'=>$infodata1,
      'dob'=>$dob,
      'marital_status'=>$request->marital_status,
      'mobile'=>$request->mobile,
      'email'=>$request->email,
      'p_address'=>$request->address1,
      'c_address'=>$request->address2,
      'id_proof'=>$request->idproof,
      'id_proof_file'=>$infodata2,
      'photo'=>$infodata3,
      'sign'=>$infodata4,
      'ug_course'=>$request->ug_course,
      'ug_subject'=>$request->ug_subject,
      'ug_university'=>$request->ug_institution,
      'ug_year'=>$request->ug_year,
      'ug_mark'=>$request->ug_percentage,
      'ug_file1'=>$infodata16,
      'ug_file2'=>$infodata17,
      'pg_course'=>$request->pg_course,
      'pg_subject'=>$request->pg_subject,
      'pg_university'=>$request->pg_institution,
      'pg_year'=>$request->pg_year,
      'pg_mark'=>$request->pg_percentage,
      'pg_file1'=>$infodata5,
      'pg_file2'=>$infodata6,
      'phd_university'=>$request->phd_institution,
      'phd_subject'=>$request->phd_subject,
      'phd_title'=>$request->phd_title,
      'phd_year'=>$request->phd_year,
      'phd_file'=>$infodata7,
      'phd_summary'=>$infodata18,
      'scholar_link'=>$request->pub_scholar,
      'corpus_id'=>$request->pub_corpus,
      'paper_list'=>$infodata8,
      'exp_institute1'=>$request->exp_institute1,
      'exp_designation1'=>$request->exp_desig1,
      'exp_from1'=>$exp_from1,
      'exp_to1'=>$exp_to1,
      'exp_duration1'=>$request->exp_duration1,
      'exp_duties1'=>$request->exp_duties1,
      'exp_file1'=>$infodata9,
      'exp_institute2'=>$request->exp_institute2,
      'exp_designation2'=>$request->exp_desig2,
      'exp_from2'=>$exp_from2,
      'exp_to2'=>$exp_to2,
      'exp_duration2'=>$request->exp_duration2,
      'exp_duties2'=>$request->exp_duties2,
      'exp_file2'=>$infodata10,
      'exp_institute3'=>$request->exp_institute3,
      'exp_designation3'=>$request->exp_desig3,
      'exp_from3'=>$exp_from3,
      'exp_to3'=>$exp_to3,
      'exp_duration3'=>$request->exp_duration3,
      'exp_duties3'=>$request->exp_duties3,
      'exp_file3'=>$infodata11,
      'exp_institute4'=>$request->exp_institute4,
      'exp_designation4'=>$request->exp_desig4,
      'exp_from4'=>$exp_from4,
      'exp_to4'=>$exp_to4,
      'exp_duration4'=>$request->exp_duration4,
      'exp_duties4'=>$request->exp_duties4,
      'exp_file4'=>$infodata19,
      'exp_institute5'=>$request->exp_institute5,
      'exp_designation5'=>$request->exp_desig5,
      'exp_from5'=>$exp_from5,
      'exp_to5'=>$exp_to5,
      'exp_duration5'=>$request->exp_duration5,
      'exp_duties5'=>$request->exp_duties5,
      'exp_file5'=>$infodata20,
      'phd_exp_institute1'=>$request->post_exp_institute1,
      'phd_exp_fundagency1'=>$request->post_exp_fund1,
      'phd_exp_from1'=>$post_exp_from1,
      'phd_exp_to1'=>$post_exp_to1,
      'phd_exp_duration1'=>$request->post_exp_duration1,
      'phd_exp_duties1'=>$request->post_exp_duties1,
      'phd_exp_file1'=>$infodata12,

      'phd_exp_institute2'=>$request->post_exp_institute2,

      'phd_exp_fundagency2'=>$request->post_exp_fund2,
      'phd_exp_from2'=>$post_exp_from2,
      'phd_exp_to2'=>$post_exp_to2,
      'phd_exp_duration2'=>$request->post_exp_duration2,
      'phd_exp_duties2'=>$request->post_exp_duties2,
      'phd_exp_file2'=>$infodata13,
      'phd_exp_institute3'=>$request->post_exp_institute3,

      'phd_exp_fundagency3'=>$request->post_exp_fund3,
      'phd_exp_from3'=>$post_exp_from3,

      'phd_exp_to3'=>$post_exp_to3,
      'phd_exp_duration3'=>$request->post_exp_duration3,
      'phd_exp_duties3'=>$request->post_exp_duties3,
      'phd_exp_file3'=>$infodata14,
      'awards_file'=>$infodata21,
      'pi_copi_file'=>$infodata22,
      'conferences_file'=>$infodata23,

      'paper_count'=>$request->paper_count,

      'skills'=>$request->skill,
      'relevant'=>$request->relevant,
      'contribution'=>$request->vision,
      'ref_name1'=>$request->Ref_name1,
      'ref_addr1'=>$request->Ref_postheld1,
      'ref_phone1'=>$request->Ref_phone1,
      'ref_email1'=>$request->Ref_email1,

      'ref_name2'=>$request->Ref_name2,
      'ref_addr2'=>$request->Ref_postheld2,
      'ref_phone2'=>$request->Ref_phone2,
      'ref_email2'=>$request->Ref_email2,

      'ref_name3'=>$request->Ref_name3,
      'ref_addr3'=>$request->Ref_postheld3,
      'ref_phone3'=>$request->Ref_phone3,
      'ref_email3'=>$request->Ref_email3,

      'noc'=>$infodata15 ,
      'curnt'=>$request->curnt ,
      'draft'=>1,
      'updated_at'=>$todayDate ,
    );
//dd($datas);
$update=DB::table('application_form')->where('id',$an)->update($datas);


}
else
{
  if($request->curnt=="No")
  {
    $infodata15='';
  }

  $datas=array(
    'user_id'=>$userid,
    'ref_no'=>$reff_no,
    
    'post_code'=>$request->post_code_hidden,
    'title'=>$request->title,
    'name'=>$request->name,
    'fname'=>$request->fname,
    
    'gender'=>$request->gender,
    'nationality'=>$request->nationality,
    
    'category'=>$request->category,
    'caste'=>$request->caste,
    'category_file'=>$infodata1,
    'dob'=>$dob,
    'marital_status'=>$request->marital_status,
    'mobile'=>$request->mobile,
    'email'=>$request->email,
    'p_address'=>$request->address1,
    'c_address'=>$request->address2,
    'id_proof'=>$request->idproof,
    'id_proof_file'=>$infodata2,
    'photo'=>$infodata3,
    'sign'=>$infodata4,
    'ug_course'=>$request->ug_course,
    'ug_subject'=>$request->ug_subject,
    'ug_university'=>$request->ug_institution,
    'ug_year'=>$request->ug_year,
    'ug_mark'=>$request->ug_percentage,
    'ug_file1'=>$infodata16,
    'ug_file2'=>$infodata17,
    'pg_course'=>$request->pg_course,
    'pg_subject'=>$request->pg_subject,
    'pg_university'=>$request->pg_institution,
    'pg_year'=>$request->pg_year,
    'pg_mark'=>$request->pg_percentage,
    'pg_file1'=>$infodata5,
    'pg_file2'=>$infodata6,
    'phd_university'=>$request->phd_institution,
    'phd_subject'=>$request->phd_subject,
    'phd_title'=>$request->phd_title,
    'phd_year'=>$request->phd_year,
    'phd_file'=>$infodata7,
    'phd_summary'=>$infodata18,
    'scholar_link'=>$request->pub_scholar,
    'corpus_id'=>$request->pub_corpus,
    'paper_list'=>$infodata8,
    'exp_institute1'=>$request->exp_institute1,
    'exp_designation1'=>$request->exp_desig1,
    'exp_from1'=>$exp_from1,
    'exp_to1'=>$exp_to1,
    'exp_duration1'=>$request->exp_duration1,
    'exp_duties1'=>$request->exp_duties1,
    'exp_file1'=>$infodata9,
    'exp_institute2'=>$request->exp_institute2,
    'exp_designation2'=>$request->exp_desig2,
    'exp_from2'=>$exp_from2,
    'exp_to2'=>$request->exp_to2,
    'exp_duration2'=>$request->exp_duration2,
    'exp_duties2'=>$request->exp_duties2,
    'exp_file2'=>$infodata10,
    'exp_institute3'=>$request->exp_institute3,
    'exp_designation3'=>$request->exp_desig3,
    'exp_from3'=>$exp_from3,
    'exp_to3'=>$exp_to3,
    'exp_duration3'=>$request->exp_duration3,
    'exp_duties3'=>$request->exp_duties3,
    'exp_file3'=>$infodata11,
    'exp_institute4'=>$request->exp_institute2,
    'exp_designation4'=>$request->exp_desig2,
    'exp_from4'=>$exp_from4,
    'exp_to4'=>$exp_to4,
    'exp_duration4'=>$request->exp_duration2,
    'exp_duties4'=>$request->exp_duties2,
    'exp_file4'=>$infodata19,
    'exp_institute5'=>$request->exp_institute5,
    'exp_designation5'=>$request->exp_desig5,
    'exp_from5'=>$exp_from5,
    'exp_to5'=>$exp_to5,
    'exp_duration5'=>$request->exp_duration5,
    'exp_duties5'=>$request->exp_duties5,
    'exp_file5'=>$infodata20,
    
    'phd_exp_institute1'=>$request->post_exp_institute1,
    
    'phd_exp_fundagency1'=>$request->post_exp_fund1,
    'phd_exp_from1'=>$post_exp_from1,
    'phd_exp_to1'=>$post_exp_to1,
    'phd_exp_duration1'=>$request->post_exp_duration1,
    'phd_exp_duties1'=>$request->post_exp_duties1,
    'phd_exp_file1'=>$infodata12,
    
    'phd_exp_institute2'=>$request->post_exp_institute2,
    
    'phd_exp_fundagency2'=>$request->post_exp_fund2,
    'phd_exp_from2'=>$post_exp_from2,
    'phd_exp_to2'=>$post_exp_to2,
    'phd_exp_duration2'=>$request->post_exp_duration2,
    'phd_exp_duties2'=>$request->post_exp_duties2,
    'phd_exp_file2'=>$infodata13,
    'phd_exp_institute3'=>$request->post_exp_institute3,
    
    'phd_exp_fundagency3'=>$request->post_exp_fund3,
    'phd_exp_from3'=>$post_exp_from3,

    'phd_exp_to3'=>$post_exp_to3,
    'phd_exp_duration3'=>$request->post_exp_duration3,
    'phd_exp_duties3'=>$request->post_exp_duties3,
    'phd_exp_file3'=>$infodata14,
    'awards_file'=>$infodata21,
    'pi_copi_file'=>$infodata22,
    'conferences_file'=>$infodata23,
    
    'paper_count'=>$request->paper_count,
    'skills'=>$request->skill,
    'relevant'=>$request->relevant,
    'contribution'=>$request->vision,
    'ref_name1'=>$request->Ref_name1,
    'ref_addr1'=>$request->Ref_postheld1,
    'ref_phone1'=>$request->Ref_phone1,
    'ref_email1'=>$request->Ref_email1,
    //'ref_mobile1'=>$request->Ref_mobile1,
    'ref_name2'=>$request->Ref_name2,
    'ref_addr2'=>$request->Ref_postheld2,
    'ref_phone2'=>$request->Ref_phone2,
    'ref_email2'=>$request->Ref_email2,
    //'ref_mobile2'=>$request->Ref_mobile2,
    'ref_name3'=>$request->Ref_name3,
    'ref_addr3'=>$request->Ref_postheld3,
    'ref_phone3'=>$request->Ref_phone3,
    'ref_email3'=>$request->Ref_email3,
    //'ref_mobile3'=>$request->Ref_mobile3,
    
    'draft'=>1,
    'updated_at'=>$todayDate ,
    'noc'=>$infodata15 ,
    'curnt'=>$request->curnt ,
  );

$save=DB::table('application_form')->insert($datas);

}
$data = array( 'status'=>true,
  'message'=>'Application Saved Successfully.','pcode'=>$pc
);
echo json_encode($data); 


}

else
{
 $data = array( 'status'=>false,
  'message'=>'Error'
);
 echo json_encode($data); 
}
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