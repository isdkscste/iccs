<?php
namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use PDF;

use DB;
use Storage;
class AdminPDFController extends Controller

{

   
  public function __construct()
    {
      $this->middleware('auth');
    }
    public function generatePDF($code)

    {

        //$userid=\Auth::user()->id;
        // dd($code);
        $data = DB::table("application_form")->where('id',$code)->first();
       
        $pdf = PDF::loadView('scientist.myPDF', compact('data'));
       // $reff_path='/public/uploads/iccs/'.$data->ref_no./;
        Storage::put('/public/uploads/iccs/'.$data->ref_no.'/Application_'.$data->ref_no.'.pdf', $pdf->output());
        return $pdf->download('application_'.$data->ref_no.'.pdf');


    }

}