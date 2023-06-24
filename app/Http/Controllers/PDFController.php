<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;

use DB;

class PDFController extends Controller

{

   
  public function __construct()
    {
      $this->middleware('auth');
    }
    public function generatePDF($code)

    {

        $userid=\Auth::user()->id;
        // dd($code);
        $data = DB::table("application_form")->where('user_id',$userid)->where('post_code',$code)->first();
      
        $pdf = PDF::loadView('scientist.myPDF', compact('data'));
        Storage::put('/public/uploads/iccs/'.$data->ref_no.'/Application_'.$data->ref_no.'.pdf', $pdf->output());

        return $pdf->download('application_'.$data->ref_no.'.pdf');

    }

}