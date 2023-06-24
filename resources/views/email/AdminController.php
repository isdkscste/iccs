<?php

namespace App\Http\Controllers\admin;
use Yajra\Datatables\Facades\Datatables;
use App\Models\Consumer\ConsumerModel;
use App\Models\Consumer\ConsumerDetailsModel;
use App\Models\Consumer\CardtypeModel;
use App\Models\Consumer\EofficeModel;
use App\Models\Consumer\DesignationModel;
use App\Models\Consumer\OfficedetailModel;
use App\Models\Consumer\PapertypeModel;
use App\Models\Consumer\TownModel;
use App\Models\Consumer\MakemachineModel;
use App\Models\Consumer\MaintenancemodeModel;
use App\Models\Stock\ItemsModel;
use App\Models\Consumer\WorkingnatureModel;
use App\Models\Consumer\Machine_listModel;

use App\Models\Consumer\DesignationtypeModel;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use Waavi\Sanitizer\Sanitizer;
use Illuminate\Support\Str;
use Validator;
use Session;
use DB;
use Carbon\Carbon;


/*
   * This Controller is for managing HEI Nature.
   *
   *
  *In this controller we can save, clear, edit, update and delete the details of HEI Nature.
  *
  *
 */

class AdminController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
      if ($request->ajax())
      {
        $data1=array();
        $scope=Session::get('scope_admin');

        $officecode=Session::get('officecode_admin');
        $status=$request->status;
        $fromdate=$request->fromdate;
        $todate=$request->todate;
       //dd($todate);
        if(($status=="Profile Submitted" || $status=="Profile Resubmitted") && $fromdate && $todate)
        {
          if($scope==1)
        {//dd($fromdate);
         $data1=DB::table('consumer.consumerdetails')
         ->where('active_flag', '=', 0 )
         ->where('final_messages', '=', $status ) 
         ->whereBetween('time_submit',[$fromdate,$todate])

         ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')

         ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')

         ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
         ->get();
       }
       else
       {

        $data1=DB::table('consumer.consumerdetails')
        ->where('regionid', '=', $officecode ) 
        ->where('active_flag', '=', 0 ) 
        ->where('final_messages', '=', $status ) 
        ->whereBetween('time_submit',[$fromdate,$todate])  
        ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
        ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
        ->get();
      }
    }
else if($status=="online_not" )
    {
 
      if($scope==1)
        {//dd($fromdate);
         $data1=DB::table('consumer.consumerdetails')
         ->where('active_flag', '=', 0 )
         ->where('online_card', '=', 1 ) 
         //->whereBetween('time_submit',[$fromdate,$todate])

         ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')

         ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')

         ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
         ->get();
       }
       else
       {

        $data1=DB::table('consumer.consumerdetails')
        ->where('regionid', '=', $officecode ) 
        ->where('active_flag', '=', 0 ) 
        ->where('online_card', '=', 1 ) 
        //->whereBetween('time_submit',[$fromdate,$todate])  
        ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
        ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
        ->get();
      }

    }
    else if($status=="df_sb" )
    {

      if($scope==1)
      {
       $data1=DB::table('consumer.consumerdetails')
       ->where('active_flag', '=', 0 )
       ->where('consumer.forecasting_status.status_flag', '=', 1 )  
      // ->where('final_messages', '=', $status ) 
       //->whereBetween('time_return',[$fromdate,$todate])
       ->leftjoin('consumer.forecasting_status','consumer.forecasting_status.entry_user','consumer.consumerdetails.consumerid')
       ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
       ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
       ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
       ->get();
     }
     else
     {

       $data1=DB::table('consumer.consumerdetails')
       ->where('regionid', '=', $officecode ) 
      //->where('final_messages', '=', $status ) 
       ->where('active_flag', '=', 0 )   
      //->whereBetween('time_return',[$fromdate,$todate])
       ->where('consumer.forecasting_status.status_flag', '=', 1 )  

       ->leftjoin('consumer.forecasting_status','consumer.forecasting_status.entry_user','consumer.consumerdetails.consumerid')
       ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') 
       ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
       ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
       ->get();

     }


   }
   else if($status=="df_sb_not" )
   {

    if($scope==1)
    {
     $data1=DB::table('consumer.consumerdetails')
     ->where('active_flag', '=', 0 )
     ->whereNotIn('consumer.consumerdetails.consumerid',function ($query2)  {
       $query2->select('entry_user')->from('consumer.forecasting_status')
       ->where('consumer.forecasting_status.status_flag',1)
       ->where('consumer.forecasting_status.entry_user','!=',null)
       ;})
     ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
     ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
     ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
     ->get();
   }
   else
   {

     $data1=DB::table('consumer.consumerdetails')
     ->where('regionid', '=', $officecode ) 
      //->where('final_messages', '=', $status ) 
     ->where('active_flag', '=', 0 )   
      //->whereBetween('time_return',[$fromdate,$todate])
     ->whereNotIn('consumer.consumerdetails.consumerid',function ($query2)  {
       $query2->select('entry_user')->from('consumer.forecasting_status')
       ->where('consumer.forecasting_status.status_flag',1)
       ->where('consumer.forecasting_status.entry_user','!=',null)
       ;})

     ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') 
     ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
     ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
     ->get();

   }


 }
 else if($status=="opening_sb" )
 {

  if($scope==1)
  {
   $data1=DB::table('consumer.consumerdetails')
   ->where('active_flag', '=', 0 )
   ->where('consumer.openingstock_status.status_flag', '=', 1 )  
      // ->where('final_messages', '=', $status ) 
       //->whereBetween('time_return',[$fromdate,$todate])
   ->leftjoin('consumer.openingstock_status','consumer.openingstock_status.entry_user','consumer.consumerdetails.consumerid')
   ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
   ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
   ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
   ->get();
 }
 else
 {

   $data1=DB::table('consumer.consumerdetails')
   ->where('regionid', '=', $officecode ) 
      //->where('final_messages', '=', $status ) 
   ->where('active_flag', '=', 0 )   
      //->whereBetween('time_return',[$fromdate,$todate])
   ->where('consumer.openingstock_status.status_flag', '=', 1 )  

   ->leftjoin('consumer.openingstock_status','consumer.openingstock_status.entry_user','consumer.consumerdetails.consumerid')

   ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') 
   ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
   ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
   ->get();

 }


}
else if($status=="opening_sb_not" )
{

  if($scope==1)
  {
   $data1=DB::table('consumer.consumerdetails')
   ->where('active_flag', '=', 0 )
   ->whereNotIn('consumer.consumerdetails.consumerid',function ($query2)  {
     $query2->select('entry_user')->from('consumer.openingstock_status')
     ->where('consumer.openingstock_status.status_flag',1)
     ->where('consumer.openingstock_status.entry_user','!=',null)
     ;})
   ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
   ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
   ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
   ->get();
 }
 else
 {

   $data1=DB::table('consumer.consumerdetails')
   ->where('regionid', '=', $officecode ) 
      //->where('final_messages', '=', $status ) 
   ->where('active_flag', '=', 0 )   
      //->whereBetween('time_return',[$fromdate,$todate])
   ->whereNotIn('consumer.consumerdetails.consumerid',function ($query2)  {
     $query2->select('entry_user')->from('consumer.openingstock_status')
     ->where('consumer.openingstock_status.status_flag',1)
     ->where('consumer.openingstock_status.entry_user','!=',null)
     ;})

   ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') 
   ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
   ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
   ->get();

 }


}
else if($status=="Returned" && $fromdate && $todate)
{
  if($scope==1)
  {
   $data1=DB::table('consumer.consumerdetails')
   ->where('active_flag', '=', 0 )
   ->where('final_messages', '=', $status ) 
   ->whereBetween('time_return',[$fromdate,$todate])
   ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
   ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
   ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
   ->get();
 }
 else
 {

  $data1=DB::table('consumer.consumerdetails')
  ->where('regionid', '=', $officecode ) 
  ->where('final_messages', '=', $status ) 
  ->where('active_flag', '=', 0 )   
  ->whereBetween('time_return',[$fromdate,$todate])
  ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') 
  ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
  ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
  ->get();
}
}
else if($status=="Approved" && $fromdate && $todate)
{
  if($scope==1)
  {
   $data1=DB::table('consumer.consumerdetails')
   ->where('active_flag', '=', 0 )
   ->where('final_messages', '=', $status ) 
   ->whereBetween('time_approve',[$fromdate,$todate])
   ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
   ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
   ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
   ->get();
 }
 else
 {

  $data1=DB::table('consumer.consumerdetails')
  ->where('regionid', '=', $officecode ) 
  ->where('final_messages', '=', $status ) 
  ->where('active_flag', '=', 0 ) 
  ->whereBetween('time_approve',[$fromdate,$todate])  
  ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') 
  ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
  ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
  ->get();
}
}
else if($status=="Registered" && $fromdate && $todate)
{
  if($scope==1)
  {
   $data1=DB::table('consumer.consumerdetails')
   ->where('active_flag', '=', 0 )
   ->where('final_messages', '=', $status ) 
   ->whereBetween('time_register',[$fromdate,$todate])
   ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
   ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
   ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
   ->get();
 }
 else
 {

  $data1=DB::table('consumer.consumerdetails')
  ->where('regionid', '=', $officecode ) 
  ->where('final_messages', '=', $status ) 
  ->where('active_flag', '=', 0 )  
  ->whereBetween('time_register',[$fromdate,$todate]) 
  ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') 
  ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')       
  ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
  ->get();
}
}
else if($status)
{
 if($scope==1)
         {//dd(true);
           $data1=DB::table('consumer.consumerdetails')
           ->where('final_messages', '=', $status )->where('active_flag', '=', 0 ) 

           ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
           ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
           ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
           ->get();
         }
         else
         {

          $data1=DB::table('consumer.consumerdetails')
          ->where('regionid', '=', $officecode )  
          ->where('final_messages', '=', $status )  
          ->where('active_flag', '=', 0 )   
          ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')    ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')   
          ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
          ->get();
        }
      }
      else
      {
       if($scope==1)
       {
         $data1=DB::table('consumer.consumerdetails')
         ->where('active_flag', '=', 0 ) 

         ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
         ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')
         ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
         ->get();
       }
       else
       {

        $data1=DB::table('consumer.consumerdetails')
        ->where('regionid', '=', $officecode )  

        ->where('active_flag', '=', 0 )   
        ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district') ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')      
        ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.final_messages','consumer.consumerdetails.messages','administration.town.townname','administration.users.usermobile','consumer.consumerdetails.email','online_card')
        ->get();
      }
    }
    return datatables($data1)->toJson();
  }
  if(Session::get('user_id_admin'))
  {
   return view('admin.pages.admindashboard')->with('page_title','Admin Dashboard');
 }
 else
 {
  return view('errors.403')->with('page_title','Error');
}


}
public function checkDept(Request $request)
{
  if ($request->ajax())
  {
    $departid=$request->departid;

    $getdepartid=DB::table('consumer.profile_permission')->where('departid','=',$departid)->where('status','=',1)
    ->select('id')->first();
    if(is_null($getdepartid))
    {
      $status=0;
    }
    else
    {
      $status=1;
    }
    echo json_encode($status);
  }

}
public function checkStatus(Request $request)
{
  $cnsmr_id=Session::get('consumerid_admin');
  $card_status=DB::table('consumer.consumerdetails')
  ->where('consumerid','=',$cnsmr_id)
  ->select('time_submit','time_return','time_register','time_approve')
  ->get();

  if($card_status[0]->time_submit)
    $card_status[0]->time_submit = date ( 'M d, Y h:i A ' ,strtotime($card_status[0]->time_submit) );
  if($card_status[0]->time_return)
    $card_status[0]->time_return=date ( 'M d, Y h:i A ' ,strtotime($card_status[0]->time_return) );
  if($card_status[0]->time_register)
    $card_status[0]->time_register=date ( 'M d, Y h:i A ' ,strtotime($card_status[0]->time_register) );
  if($card_status[0]->time_approve)
    $card_status[0]->time_approve=date ( 'M d, Y h:i A ' ,strtotime($card_status[0]->time_approve) );
  //dd($card_status);
  return $card_status;


  

}
public function checkMachine(Request $request)
{
  $cnsmr_id=Session::get('consumerid_admin');
  $flag=DB::table('consumer.consumerdetails')
  ->where('consumerid','=',$cnsmr_id)
  ->select('machine_flag')
  ->first();
  
 if($flag->machine_flag==2)
  {

    return 2;

  }
  else if($flag->machine_flag==1 )
  {

    return 1;
  }
  
}
public function checkSuboffice(Request $request)
{
  $cnsmr_id=Session::get('consumerid_admin');
  $flag=DB::table('consumer.consumerdetails')
  ->where('consumerid','=',$cnsmr_id)
  ->select('sub_flag')
  ->first();
  
                 //print_r($flag);exit;
  if($flag->sub_flag==2)
  {

    return 2;

  }
  else if($flag->sub_flag==1)
  {

    return 1;
  }
  
}

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function statistics()
    {
  //dd("test");
      if(Session::get('user_id_admin'))
      {
        return view('admin.pages.admin_statistics');
      }
      else
      {
        return view('errors.403')->with('page_title','Error');
      }
    }
    public function getStatistics()
    {


      $data=DB::table('administration.officedetails')
      ->where('officecode', '<', 61)
      ->where('officecode', '!=', 54)
      ->select('officecode', 'officename')
      ->get();

      $count=count($data);
  // dd($totalcount);

      for($i = 0;$i<$count;$i++)
      {
        $totalcount[$i]=DB::table('consumer.consumerdetails')
        ->where('regionid', '=', $data[$i]->officecode)
        ->where('active_flag', '=', 0 )   
        ->select()
        ->get()->count();
      }

    // dd($totalcount);
      for($i = 0;$i<$count;$i++)
      {
        $registeredusers[$i]=DB::table('administration.users')
        ->where('administration.users.officecode', '=', $data[$i]->officecode)
        ->where('administration.users.usertype', '=', 5)
        ->leftjoin('consumer.consumerdetails','administration.users.username','consumer.consumerdetails.cardno')
        ->where('consumer.consumerdetails.active_flag','=',0)
        ->select()
        ->get()->count();
      }

    // dd($registeredusers);

      for($i = 0;$i<$count;$i++)
      {
        $profilesubmitted[$i]=DB::table('consumer.consumerdetails')
        ->where('regionid', '=', $data[$i]->officecode)
        ->where('final_submit', '=', 1)
        ->where('active_flag', '=', 0 )   
      // ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')

        ->select()
        ->get()->count();
      }

  // SELECT  officecode, officename  FROM administration.officedetails WHERE officecode < '61'  and officecode!=54
  // dd($profilesubmitted);
      for($i = 0;$i<$count;$i++)
      {
        $approved[$i]=DB::table('consumer.consumerdetails')
        ->where('regionid', '=', $data[$i]->officecode)
        ->where('approve_flag', '=', 1)
        ->where('active_flag', '=', 0 )   
      // ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')

        ->select()
        ->get()->count();
      }
  // dd($approved);

      for($i = 0;$i<$count;$i++)
      {
        $returned[$i]=DB::table('consumer.consumerdetails')
        ->where('regionid', '=', $data[$i]->officecode)
        ->where('approve_flag', '=', 0)
        ->where('active_flag', '=', 0 )   
      // ->leftjoin('administration.users','consumer.consumerdetails.cardno','administration.users.username')

        ->select()
        ->get()->count();
      }
//opening_stock
      for ($i=0; $i <$count ; $i++) { 
        $open_stock[$i]=DB::table('consumer.consumerdetails')
        ->join('consumer.openingstock_status','consumer.openingstock_status.entry_user','=','consumer.consumerdetails.consumerid')
        ->where('consumer.consumerdetails.regionid', $data[$i]->officecode ) 
        ->where('consumer.consumerdetails.active_flag','=',0)

        ->where('consumer.openingstock_status.status_flag', 1 )
        ->select('consumer.consumerdetails.officename')
        ->get()->count();

      }
//forecasting
      for ($i=0; $i <$count ; $i++) { 
        $forecast[$i]=DB::table('consumer.consumerdetails')
        ->join('consumer.forecasting_status','consumer.forecasting_status.entry_user','=','consumer.consumerdetails.consumerid')
        ->where('consumer.consumerdetails.active_flag','=',0)

        ->where('consumer.consumerdetails.regionid', $data[$i]->officecode )
        ->where('consumer.forecasting_status.status_flag', 1)   
        

        ->select('consumer.consumerdetails.officename')
        ->get()->count();


        $temp=DB::table('consumer.forecasting_status')
        ->where('consumer.forecasting_status.status_flag', 1)  
        ->where('consumer.forecasting_status.approve_flag', 1) 
        ->select('entry_user')->get();

        $tempArr=array();
        for ($q=0; $q < count($temp); $q++) { 
          $tempArr[$q]=$temp[$q]->entry_user;
        }
  // dd($tempArr);

        $dfApr[$i]=DB::table('consumer.consumerdetails')
        ->where('consumer.consumerdetails.active_flag','=',0)

        ->where('consumer.consumerdetails.regionid', $data[$i]->officecode )
        ->whereIn('consumerid',$tempArr)

        ->select()
        ->get()->count();



      }
 // dd($dfApr);
      $result=json_decode($data, true);
      $j=0;
      $ofc_cnt=0;
      $reg_cnt=0;
      $prof_cnt=0;
      $apr_cnt=0;
      $ret_cnt=0;
      $for_cnt=0;
      $opn_cnt=0;
      $forapr_cnt=0;
      foreach ($result as $value) {



        $val[$j]['officename']=$value['officename'];
        $val[$j]['totaloffices']=$totalcount[$j];
        $ofc_cnt=$ofc_cnt+$totalcount[$j];
        $val[$j]['totalregistered']=$registeredusers[$j];
        $reg_cnt=$reg_cnt+$registeredusers[$j];
        $val[$j]['totalprofilesubmitted']=$profilesubmitted[$j] + $approved[$j] + $returned[$j];
        $prof_cnt=$prof_cnt+$val[$j]['totalprofilesubmitted'];
        $val[$j]['totalapproved']=$approved[$j];
        $apr_cnt=$apr_cnt+$val[$j]['totalapproved'];

        $val[$j]['totalreturned']=$returned[$j];
        $ret_cnt=$ret_cnt+$val[$j]['totalreturned'];

       $val[$j]['forecast_approve']=$dfApr[$j];
        $forapr_cnt=$forapr_cnt+$val[$j]['forecast_approve'];

        if($totalcount[$j]!=0){
          $val[$j]['regpercentage']=round(($registeredusers[$j]*100)/$totalcount[$j], 2);
          $val[$j]['profilesubmittedpercentage']=round((($profilesubmitted[$j] + $approved[$j] + $returned[$j]) * 100)/$totalcount[$j], 2);
            // $val[$j]['off_id']=$value['officecode'];
          $val[$j]['open_stock']=$open_stock[$j];
          $val[$j]['open_stock_percent']=round(($open_stock[$j]*100)/$totalcount[$j], 2);
          $val[$j]['forecast']=$forecast[$j];
          $val[$j]['forecast_percent']=round(($forecast[$j]*100)/$totalcount[$j], 2);
        }
        else
        {

         $val[$j]['regpercentage']=0;
         $val[$j]['profilesubmittedpercentage']=0;
           // $val[$j]['off_id']=$value['officecode'];

         $val[$j]['open_stock']=0;
         $val[$j]['open_stock_percent']=0;

         $val[$j]['forecast']=0;
         $val[$j]['forecast_percent']=0;
       }
        $opn_cnt=$opn_cnt+$val[$j]['open_stock'];
        $for_cnt=$for_cnt+$val[$j]['forecast'];
       $j++;


     }

$k=$j;


  $val[$k]['officename']='TOTAL';

  $val[$k]['totaloffices']=$ofc_cnt;
  $val[$k]['totalregistered']=$reg_cnt;

  $val[$k]['totalprofilesubmitted']=$prof_cnt;
  $val[$k]['totalapproved']=$apr_cnt;
  $val[$k]['totalreturned']=$ret_cnt;
  $val[$k]['forecast_approve']=$forapr_cnt;


  $val[$k]['regpercentage']='';
  $val[$k]['profilesubmittedpercentage']='';

  $val[$k]['open_stock']=$opn_cnt;
  $val[$k]['open_stock_percent']='';
  $val[$k]['forecast']=$for_cnt;
  $val[$k]['forecast_percent']='';


 //dd($val);
     return datatables($val)->toJson();
     

   }


   public function create()
   {
        //
   }
   public function checkingemail(Request $request)
   {

    if ($request->ajax())
    {
      $cnsmr_id=Session::get('consumerid_admin');
      $token = $request->get('_token');

        // $email=$request->email;
      $email=$request->email;
        //$username=strtoupper($request->username);
      $data=array('emailmsg'=>'',
    );
      $em = ConsumerDetailsModel::where('email', '=', $email)->where('consumerid', '!=', $cnsmr_id)
      ->select('cardno')
      ->first();


      if($em)
      {
       $data=array(
                // 'emailmsg'=>'email',

        'emailmsg'=>'email');
     }
     else 
     {
       $data=array(

        'emailmsg'=>'');
     }


     echo json_encode($data);


   }

 }
 public function finalApproval(Request $request)
 {

  if ($request->ajax())
  {

      // dd(true);
    $id=Session::get('consumerid_admin');
    $token = $request->get('_token');
    $flag=$request->val;
    $final_messages=$request->final_messages;
    $remarks=$request->remarks;
    $data=array();
    if($flag==0)
    {
      $final_submit=2;
      $data = [
        "approve_flag" => $flag,
        "final_messages" => $final_messages,
        "final_submit" => $final_submit,
        "remarks_final" => $remarks,
        "time_return"=>Carbon::now()];

      }
      else
      {
        $final_submit=2;
        $data = [
          "approve_flag" => $flag,
          "final_messages" => $final_messages,
          "final_submit" => $final_submit,
          "remarks_final" => $remarks,
          "time_approve"=>Carbon::now()
        ];
      }
      //$flag=0;
      
      // dd($data);
      DB::beginTransaction();
      $id_update=ConsumerDetailsModel::find($id);
      $if_update = $id_update->update($data);
      //dd($id_update['mobile']);
      if($flag==1)
        send_sms1($id_update['mobile'],'The office details you have submitted are verified and approved by the stationery officer. Login to the TERMS for further instructions.');
      else
      {
        send_sms1($id_update['mobile'],'The office details you have submitted and verified and returned for corrections. Kindly contact stationery officer for more details. ');
      }
     // dd($id_update);
      if($if_update)
      {
       $dat = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Success', 'value'=>$flag   );
       DB::commit();
     }
     else
     {

      $dat = array( 'status'   =>  true , 'message'  => 'valid', 'error'  =>  'Error'  );
      DB::rollback();
    }


       //}

           //echo json_encode($status);
    echo json_encode($dat);

  }

}
public function subofficeGrid(Request $request)
{
    //print_r("dfsf");exit;


  if ($request->ajax())
  {

    $cnsmr_id=Session::get('consumerid_admin');


    $data3=DB::table('consumer.consumer_suboffice')
    ->where('cnsmr_id','=',$cnsmr_id)
    ->select('consumer.consumer_suboffice.suboffice_name','consumer.consumer_suboffice.no_offices','consumer.consumer_suboffice.items_flag','consumer.consumer_suboffice.slno')
    ->get();
    $result = json_decode($data3, true);

    foreach($result as &$value)
    {
     if($value['items_flag'] === 1)
     {
      $value['items_flag'] = 'Yes';

    }
    else
    {
      $value['items_flag'] = 'No';
    }
  }

//print_r($result);exit;


  return datatables($result)->toJson();

}
}
public function staffDetails(Request $request){
        //dd(true) ;

  if ($request->ajax())
  {
//dd(true);
     // $username=$request->username;
   $cnsmr_id=Session::get('consumerid_admin');
     //dd($cnsmr_id);
   $data1=DB::table('consumer.consumerdetailssub')
   ->where('consumerid', '=', $cnsmr_id)
   ->leftjoin('consumer.designation','consumer.consumerdetailssub.design','consumer.designation.desigcode')
   ->leftjoin('consumer.designation_type','consumer.consumerdetailssub.desig_type_id','consumer.designation_type.desig_type_id')
   ->leftjoin('consumer.working_nature','consumer.consumerdetailssub.working_nature_id','consumer.working_nature.worknature_id')
   ->select('consumer.designation.designame','consumer.designation_type.desigtype_description','consumer.working_nature.worknat_description','consumer.consumerdetailssub.nopost','consumer.consumerdetailssub.consumerid','consumer.consumerdetailssub.slno','consumer.consumerdetailssub.office_head')
   ->get();



   return datatables($data1)->toJson();

 }
}

public function machineDetails(Request $request){
        // return true;

  if ($request->ajax())
  {

   $cnsmr_id=Session::get('consumerid_admin');
   $data1=DB::table('consumer.consumermachinedetails')
   ->where('consumerid', '=', $cnsmr_id)
   ->leftjoin('consumer.machine_list','consumer.machine_list.id','consumer.consumermachinedetails.machineid')

   ->leftjoin('consumer.maintenance_mode','consumer.maintenance_mode.mode_id','consumer.consumermachinedetails.maintenance_mode')
   ->select('consumer.machine_list.machine_name','consumer.consumermachinedetails.make','consumer.maintenance_mode.mode_description',
    'consumer.consumermachinedetails.model','consumer.consumermachinedetails.year_of_purchase','consumer.consumermachinedetails.slno')
   ->get();


//dd($data1);
   return datatables($data1)->toJson();

 }
}
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }
    public function showOffice(Request $request,$id)
    {
        //
       // dd($id);

      Session::put('consumerid_admin', $id);
      $card=DB::table('consumer.consumerdetails')->where('consumerid','=',$id)->where('active_flag', '=', 0 )   
      ->select('cardno','officename')->first();
      $offc_name=$card->officename;
      
      $uid=DB::table('administration.users')->where('username','=', $card->cardno)
      ->select('usersid')->first();
     // dd($uid->usersid);
      if(!(is_null($uid)))
      {
        Session::put('userid_admin', $uid->usersid);
      }
      $towns = TownModel::orderBy('townname','asc')->pluck('townname','towncode')->all();

      $cardtype = CardtypeModel::orderBy('cardtype_descrptn','asc')->pluck('cardtype_descrptn','cardtype_id')->all();
      $eoffice = EofficeModel::orderBy('eoffice_status','asc')->pluck('eoffice_status','status_id')->all();
      $desig = DesignationModel::orderBy('designame','asc')->where('consumeroffice_id','=',$id)->pluck('designame','desigcode')->all();

      $officedetail = OfficedetailModel::orderBy('officename','asc')->pluck('officename','officecode')->all();
      /*****************Machine*********************/
      $papertype_id = PapertypeModel::orderBy('paper_description','asc')->pluck('paper_description','papertype_id')->all();

      $maintenance_id = MaintenancemodeModel::orderBy('mode_description','asc')->pluck('mode_description','mode_id')->all();

      $type_id=Machine_listModel::orderBy('machine_name','asc')                   
      ->pluck('machine_name','id')
      ->all();
      $supplyoffice=ConsumerDetailsModel::where('consumerid','=', $id)->select('district','departid')->first();

      $supply=ConsumerDetailsModel::orderBy('officename','asc') ->where('consumerid','!=', $id)->where('district','=', $supplyoffice->district)->where('departid','=', $supplyoffice->departid)->pluck('officename','consumerid')->all();

                   // staff details
      $worknature = WorkingnatureModel::orderBy('worknature_id','asc')->pluck('worknat_description','worknature_id')->all();
      $designationtype = DesignationtypeModel::orderBy('desig_type_id','asc')->pluck('desigtype_description','desig_type_id')->all();
      if ($request->ajax())
      {



     //$username=$request->username;

        $user=ConsumerDetailsModel::where('consumerid', '=', $id)
        ->where('consumer.consumerdetails.active_flag', '=', 0 )        ->leftjoin('administration.users','administration.users.username','consumer.consumerdetails.cardno')
        ->leftjoin('administration.town','administration.town.towncode','consumer.consumerdetails.district')
        ->leftjoin('consumer.designation','consumer.designation.desigcode','consumer.consumerdetails.officehead')
        ->leftjoin('consumer.consumer_cardtype','consumer.consumer_cardtype.cardtype_id','consumer.consumerdetails.cardtype')
        ->leftjoin('administration.officedetails','administration.officedetails.officecode','consumer.consumerdetails.regionid')
        ->leftjoin('consumer.consumeroffice_status','consumer.consumeroffice_status.status_id','consumer.consumerdetails.eoffice_status')
        ->leftjoin('consumer.departments','consumer.departments.departid','consumer.consumerdetails.departid')
        ->select('consumer.consumerdetails.cardno','consumer.consumerdetails.officename','consumer.consumerdetails.consumerid','consumer.consumerdetails.officehead','consumer.consumerdetails.address',
          'consumer.consumerdetails.mobile','consumer.consumerdetails.pincode','consumer.consumerdetails.officehead','consumer.consumerdetails.email','consumer.consumerdetails.cardtype', 'consumer.designation.designame','administration.town.townname',
          'administration.town.towncode','consumer.consumer_cardtype.cardtype_id','consumer.consumer_cardtype.cardtype_descrptn'
          ,'consumer.consumeroffice_status.status_id','consumer.consumeroffice_status.eoffice_status','consumer.designation.desigcode',
          'administration.officedetails.officecode','consumer.consumerdetails.longitude','consumer.consumerdetails.latitude','consumer.departments.departname','consumer.departments.departid','consumer.consumerdetails.tapals','consumer.consumerdetails.files','consumer.consumerdetails.phone','administration.officedetails.officename as office','consumer.consumerdetails.final_messages','consumer.consumerdetails.final_submit','consumer.consumerdetails.approve_flag','consumer.consumerdetails.supply_mode','consumer.consumerdetails.supply_office','administration.users.preferred_office','consumer.consumerdetails.ddo_code')
        ->get();
//dd($user);
      //print_r($user);exit;      
        return $user;


      }
      if(Session::get('user_id_admin'))
      {
        return view('admin.pages.adminOffice',compact('towns','cardtype','eoffice','desig','officedetail','papertype_id','maintenance_id','type_id','worknature','designationtype','supply','offc_name'))->with('page_title','Admin Dashboard');;
      }
      else
      {
        return view('errors.403')->with('page_title','Error');
      }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {


    }
    public function Suboffice_details(Request $request)
    {
     if ($request->ajax())
     {
      $slno=$request->slno;
      $cnsmr_id=Session::get('consumerid_admin');
     //dd($cnsmr_id);
      $data=DB::table('consumer.consumer_suboffice')
      ->where('cnsmr_id', '=', $cnsmr_id)
      ->where('slno', '=', $slno)
      ->select('consumer.consumer_suboffice.suboffice_name','consumer.consumer_suboffice.no_offices','consumer.consumer_suboffice.items_flag','consumer.consumer_suboffice.slno')
      ->get();


      return $data;
    }
  }
  public function staffDetailsSub(Request $request){

    if ($request->ajax())
    {
      $slno=$request->slno;
      $cnsmr_id=Session::get('consumerid_admin');
     //dd($cnsmr_id);
      $data=DB::table('consumer.consumerdetailssub')
      ->where('consumerid', '=', $cnsmr_id)
      ->where('slno', '=', $slno)
      ->leftjoin('consumer.designation','consumer.consumerdetailssub.design','consumer.designation.desigcode')
      ->leftjoin('consumer.designation_type','consumer.consumerdetailssub.desig_type_id','consumer.designation_type.desig_type_id')
      ->leftjoin('consumer.working_nature','consumer.consumerdetailssub.working_nature_id','consumer.working_nature.worknature_id')
      ->select('consumer.designation.designame','consumer.designation_type.desigtype_description','consumer.working_nature.worknat_description','consumer.consumerdetailssub.nopost','consumer.consumerdetailssub.consumerid','consumer.consumerdetailssub.slno','consumer.designation.desigcode','consumer.consumerdetailssub.desig_type_id','consumer.consumerdetailssub.working_nature_id','consumer.consumerdetailssub.office_head')
      ->get();
      return $data;
    }


  }
  public function machineDetailsSub(Request $request){

    if ($request->ajax())
    {
      $slno=$request->slno;
      $cnsmr_id=Session::get('consumerid_admin');

      $data=DB::table('consumer.consumermachinedetails')
      ->where('consumerid', '=', $cnsmr_id)
      ->where('slno', '=', $slno)

      ->select('machineid','make','maintenance_mode','model','year_of_purchase','slno','papertype_id','amc_pro','toner_no')
      ->get();
      return $data;
    }


  }
  public function delete_machine(Request $request)
  {

   if ($request->ajax())
   {
    $slno=$request->slno;
    $cnsmr_id=Session::get('consumerid_admin');
    DB::beginTransaction();
    $del= DB::table('consumer.consumermachinedetails')->where('consumerid', '=', $cnsmr_id)->where('slno', '=', $slno)->delete();
    if($del)
    {
     $dat = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Machine details deleted successfully!!!'   );

     DB::commit();
   }
   else
   {
    $dat = array( 'status'   =>  true , 'message'  => 'valid', 'error'  =>  'Error'  );
    DB::rollback();

  }




  echo json_encode($dat);
}

}
public function updateMachine(Request $request){
        // return true;

  if ($request->ajax())
  {
   $slno=$request->slno;
   $cnsmr_id=Session::get('consumerid_admin');
   $token=$request->_token;
   $data = [

    "machineid" => $request->type,
    "make" =>trim(ucfirst(strtolower($request->make))),
    "year_of_purchase" => $request->year,
    "maintenance_mode" =>$request->maintenance,
    "papertype_id" => $request->paper_type,
    "model" =>trim(strtoupper($request->model)),
    "amc_pro" =>$request->amc,
    "toner_no" =>trim(ucfirst(strtolower($request->tonern)))

  ];

  DB::beginTransaction();

  $if_update = DB::table('consumer.consumermachinedetails')
  ->where('consumerid', '=', $cnsmr_id)
  ->where('slno', '=', $slno)->update($data);
  if($if_update)
  {
   $dat = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Machine Details Updated Successfully!!!'   );
   DB::commit();

 }
 else
 {
  $dat = array( 'status'   =>  true , 'message'  => 'valid', 'error'  =>  'Error'  );
  DB::rollback();

}




echo json_encode($dat);

}
}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
     $id =Session::get('consumerid_admin');
     $uid=Session::get('userid_admin');
     
     //dd($uid);
     $consumer_office=$request->consumer_office;
     $address=$request->address;
     $latitude=$request->latitude;
     $preffered_stationery=$request->preffered_stationery;
     $longitude=$request->longitude;
     $pincode=$request->pincode;
     $mob_number=$request->mob_number;

     $email_id=$request->email_id;
     $office_status=$request->office_status;
     $tapals=$request->ctapals;
     $files=$request->cfiles;
     $phone=$request->phone;
     $supply_mode=$request->supply_mode;
     $supplyoffice=$request->supplyoffice;
     $ddo=$request->ddo;

     $data1=[
      'preferred_office'=>$preffered_stationery

    ];

    DB::beginTransaction();

    $if_update1 = DB::table('administration.users')
    ->where('usersid', '=', $uid)
    ->update($data1);

    $data = [
      "officename" => $consumer_office,

      "address" => $address,

      
      "latitude" => $latitude,
      "longitude" => $longitude,

      "pincode" => $pincode,
      "phone" => $mob_number,
      "email" => $email_id,
      "eoffice_status" => $office_status,
      "tapals" => $tapals,
      "files" => $files,
      "phone" => $phone,
      "supply_mode" => $supply_mode,
      "supply_office" => $supplyoffice,
      "ddo_code" => $ddo

    ];


    $profile_update=ConsumerDetailsModel::find($id);
     //print_r($profile_update);exit;
    $if_update = $profile_update->update($data);

      //print_r($if_update);

    if($if_update)
    {
     $dat = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Profile updated successfully!!!'   );
     $status=1;
     DB::commit();
   }
   else
   {
    $dat = array( 'status'   =>  true , 'message'  => 'valid', 'error'  =>  'Error'  );
    $status=0;
    DB::rollback();

  }


       //}

  echo json_encode($dat);


}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {

    }
    public function subofficeEdit(Request $request)
    {
      if ($request->ajax())
      {
        $slno=$request->slno;
        $cnsmr_id=Session::get('consumerid_admin');
        $token=$request->_token;



        $data=[
          'suboffice_name'=>$request->sub_office,
          'no_offices'=>$request->number_office,
          'items_flag'=>$request->radio_check

        ];
        

        DB::beginTransaction();
        $if_update = DB::table('consumer.consumer_suboffice')
        ->where('cnsmr_id', '=', $cnsmr_id)
        ->where('slno', '=', $slno)->update($data);
        if($if_update)
        {
         $dat = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Sub office Details Updated Successfully!!!'   );
         DB::commit();

       }
       else
       {
        $dat = array( 'status'   =>  true , 'message'  => 'valid', 'error'  =>  'Error'  );
        DB::rollback();

      }




      echo json_encode($dat);
    }
  }
  public function delete_suboffice(Request $request)
  {
    $cnsmr_id=Session::get('consumerid_admin');
//print_r($id);exit;
    $slno=$request->slno;
    DB::beginTransaction();
    $del= DB::table('consumer.consumer_suboffice')->where('cnsmr_id', '=', $cnsmr_id)->where('slno', '=', $slno)->delete();
    $if_exist=DB::table('consumer.consumer_suboffice')->where('cnsmr_id', '=', $cnsmr_id)->select('cnsmr_id')->first();
    if(is_null($if_exist))
      $count=0;
    else
      $count=1;

    if($del)
    {
     $dat = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Sub office details deleted successfully!!!','exist'=>$count );
     DB::commit();

   }
   else
   {
    $dat = array( 'status'   =>  true , 'message'  => 'valid', 'error'  =>  'Error','exist'=>$count);
    DB::rollback();

  }




  echo json_encode($dat);

}
public function update_staff(Request $request)
{
  if ($request->ajax())
  {
    $slno=$request->slno;
    $cnsmr_id=Session::get('consumerid_admin');
    $token=$request->_token;
    $desig=$request->designation;
    $officehead=$request->officehead;



    $data1 = array(
     "designame" =>  trim(ucfirst(strtolower($desig))));
    DB::beginTransaction();
    $des_exist=DB::table('consumer.designation')
    ->where('designame','=',trim(ucfirst(strtolower($desig))))
    ->select('desigcode')
    ->first();

    if(is_null($des_exist))
    {
      $if_save_desig=DesignationModel::create($data1);
      $desigcode=$if_save_desig->desigcode;
    }
    else

    {
      $desigcode=$des_exist->desigcode;
    }
    if($officehead==1)
    {
      $officeflag=DB::table('consumer.consumerdetailssub')
      ->where('consumerid', '=', $cnsmr_id)
      ->where('office_head', '=', 1)
      ->select('slno')
      ->first();
      if(is_null($officeflag))
      {
        $oh=1;
      }
      else
      {
        $datas=array("office_head" =>  0);
        $if_up=DB::table('consumer.consumerdetailssub')->where('consumerid', '=', $cnsmr_id)->where('slno', '=', $officeflag->slno)
        ->update($datas);
      }

    }
    $data=[
      'design'=>$desigcode,
      'working_nature_id'=>$request->working_nature,
      'desig_type_id'=>$request->designation_type,
      'nopost'=>$request->number_of_post,
      'office_head'=>$officehead

    ];

    $if_update = DB::table('consumer.consumerdetailssub')
    ->where('consumerid', '=', $cnsmr_id)
    ->where('slno', '=', $slno)->update($data);
    if($if_update)
    {
     $dat = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Staff Details Updated Successfully!!!'   );
     DB::commit();

   }
   else
   {
    $dat = array( 'status'   =>  true , 'message'  => 'valid', 'error'  =>  'Error'  );
    DB::rollback();

  }




  echo json_encode($dat);
}
}
public function delete_staff(Request $request)
{
  $slno=$request->slno;
  $cnsmr_id=Session::get('consumerid_admin');
  DB::beginTransaction();
  $del= DB::table('consumer.consumerdetailssub')->where('consumerid', '=', $cnsmr_id)->where('slno', '=', $slno)->delete();
  if($del)
  {
   $dat = array( 'status'   =>  true , 'message'  => 'valid','success'      => 'Staff details deleted successfully!!!'   );
   DB::commit();

 }
 else
 {
  $dat = array( 'status'   =>  true , 'message'  => 'valid', 'error'  =>  'Error'  );
  DB::rollback();

}




echo json_encode($dat);
}
public function getGrid(Request $request)
{

}
}
function post_to_url($url, $data)
{
  $fields = '';
  foreach($data as $key => $value) {
   $fields .= $key . '=' . $value . '&';
 }
 rtrim($fields, '&');
 $post = curl_init();
 curl_setopt($post, CURLOPT_URL, $url);
 curl_setopt($post, CURLOPT_POST, count($data));
 curl_setopt($post, CURLOPT_POSTFIELDS, $fields);
 curl_setopt($post, CURLOPT_RETURNTRANSFER, 1);
 $result = curl_exec($post);
 curl_close($post);
}

function send_sms1($mobile_no,$content)
{
    //$mobile_no="9895844133";
    //$content="TEST SMS nnn";
  $data = array(
       "username" => "controller",          // type your assigned username here(for example:"username" => "CDACMUMBAI")

       "password" => "Styit@54321",         //type your password

       "senderid" =>"CSSTRY",        //type your senderID

       "smsservicetype" =>"singlemsg",     //*Note*  for single sms enter  îsinglemsgî , for bulk enter ìbulkmsgî

       "mobileno" =>"$mobile_no",        //enter the mobile number 

       "bulkmobno" => "", //enter mobile numbers separated by commas for bulk sms otherwise leave it blank                                        

       "content"  => "$content"      //type the message.

     );
    //   post_to_url("http://msdgweb.mgov.gov.in/esms/sendsmsrequest", $data);
  post_to_url("https://msdgweb.mgov.gov.in/esms/sendsmsrequest",$data);
}